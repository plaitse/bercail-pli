<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp;

class ExploreImmoModel extends Model
{	
    private $params = [];

    const BASE_URL = 'http://www.explorimmo.com/resultat/annonces.html?transaction=vente&location=Paris&priceMax=300000&type=appartement%2Cchambre&areaMin=40';
    // const BASE_URL = 'http://www.explorimmo.com/rest/locations';
    const URL_API = 'http://ws.seloger.com';
    const USERAGENT = 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36';

    const cities = 'rest/locations\?q=(?P<city>.*)';
    const search = 'resultat/annonces.html\?(?P<query>.*)';
    const housing_html = 'annonce-(?P<_id>.*).html';

    public function getExploreImmoInfo ($inputs) {

	   	// return dd($inputs);
	   	return static::run();
	   	// return static::GetContent();
	   	// return static::GuzzleContent();
	}

    public function run(){
        // Prepare Url
        // $query = http_build_query($this->params);
        // $url = self::URL_API . '/' . $this->type . '.xml?' . $query;
        $url = self::BASE_URL;
        // dd($url);

        $curl = curl_init();

        // Prepare options
        $options = [
            CURLOPT_URL            => $url,
            CURLOPT_USERAGENT      => self::USERAGENT,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 5,
            CURLOPT_RETURNTRANSFER => true
        ];
        curl_setopt_array($curl, $options);

        // exec
        $response = curl_exec($curl);
        $headers = curl_getinfo($curl);
        // return dd($response);

        if(curl_errno($curl))
            throw new \Exception('[Explore Immo] ' . curl_error($curl));

        // Throw when not OK
        if ($headers['http_code'] !== 200)
            throw new \Exception("[Explore Immo] failed to request " . $url . ". returning " . $headers['http_code']);

        curl_close($curl);

        // Get xml return stdClass
        // $xml = new \SimpleXMLElement($response);
        // $json = json_encode($xml);
        // return json_decode($json);
        return dd($response);
    }

    public function GetContent(){
    	$wtf = file_get_contents('http://www.explorimmo.com/resultat/annonces.html?transaction=vente&location=Paris&priceMax=300000&type=appartement%2Cchambre&areaMin=40');
    	dd($wtf);
    	return $wtf;

    }

    public function GuzzleContent(){
    	$client = new GuzzleHttp\Client();
		$res = $client->get('http://www.explorimmo.com/resultat/annonces.html?transaction=vente&location=Paris&priceMax=300000&type=appartement%2Cchambre&areaMin=40');
		echo $res->getStatusCode(); // 200
    }

}
