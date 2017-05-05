<?php

namespace App\Models\Logicimmo;

use Illuminate\Database\Eloquent\Model;
use Goutte\Client;
use App\Http\Controllers\Tools\ZipController;

class LogicimmoModel extends Model
{

    private $client;
    private $ZipController;

    public function __construct()
    {
        $this->client = new Client();
        $this->ZipController = new ZipController();
    }

    public function getLogicimmoResults($inputs) {

        $url = $this->urlBuilder($inputs);
        // dd($url);

        $crawler = $this->client->request('GET', $url);

        $nbResultats = $crawler->filter('#nbResultats')->attr('value');

        $nbPage = (int)ceil(($nbResultats / 9) + 1);

        for ($i = 1; $i <= $nbPage; $i++) { 
            $url_array = explode('/', $url);
            $url_array[6] = 'page='.$i;
            $url = implode('/', $url_array);
            $crawler = $this->client->request('GET', $url);
            $offer_url[] = $crawler->filter('.offer-details-first-left > p > a')->each(function ($node) {
                return $node->attr('href');
            });
        }
        // dd($offer_url);
        $data = [];
        $i = 0;
        foreach ($offer_url as $key_offer_url => $value_offer_url) {
            foreach ($value_offer_url as $key_value_offer_url => $value_value_offer_url) {
                if (strstr($value_value_offer_url, 'http://www.logic-immo.com/detail-vente')) {
                    // echo  $value_value_offer_url.'<br>';              
                    $crawler = $this->client->request('GET', $value_value_offer_url);
                    $data[$i]['origin'] = "li";
                    $data[$i]['uuid'] = uniqid('uuid_', false);
                    if($crawler->filter('.main-price')->count() > 0) {
                        $data[$i]['prix'] = str_replace('€', '', str_replace(' ', '', $crawler->filter('.main-price')->text()));
                    }
                    if($crawler->filter('#offer_pictures_main')->count() > 0) {
                        $data[$i]['firstThumb'] = $crawler->filter('#offer_pictures_main')->attr('src');
                    }
                    if($crawler->filter('h1')->count() > 0) {
                        $data[$i]['libelle'] = $crawler->filter('h1')->text();
                    }
                    if($crawler->filter('.offer-rooms-number')->count() > 0) {
                        $data[$i]['nbPiece'] = $crawler->filter('.offer-rooms-number')->text();
                    }
                    if($crawler->filter('.offer-area-number')->count() > 0) {
                        $data[$i]['surface'] = $crawler->filter('.offer-area-number')->text();
                    }
                    if($crawler->filter('.offer-locality')->count() > 0) {
                        $location = $crawler->filter('.offer-locality')->text();
                        $data[$i]['ville'] = preg_replace('/\s+/', ' ',$location);
                        $pattern = '/([0-9]{5})/';
                        preg_match($pattern, $location, $matches);
                        $data[$i]['cp'] = $matches[1];
                        $q_google = str_replace('|', '-', str_replace(' ', '%20', $data[$i]['ville']));
                        $q_google = str_replace('...', '', $q_google);
                        $location_data_google_map_api = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".$q_google);
                        $location_data_google_map_api_object = json_decode($location_data_google_map_api);
                        if (isset($location_data_google_map_api_object->results[0])) {
                            $data[$i]['latitude'] = $location_data_google_map_api_object->results[0]->geometry->location->lat;
                            $data[$i]['longitude'] = $location_data_google_map_api_object->results[0]->geometry->location->lng;
                        }
                        // TODO : check why some localisation dont work
                        // else{
                        //     // dd($q_google);
                        //     $test = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=PARIS%209E%20(75009)%20-%20Clichy%20-%20Trinité/Lafayette%20-%20Richer");
                        //     dd($test);
                        //     dd($location_data_google_map_api_object);
                        //     dd($i);
                        // }
                    }
                    if($crawler->filter('.offer-description-text meta')->count() > 0) {
                        $data[$i]['descriptif'] = $crawler->filter('.offer-description-text meta')->attr('content');
                    }
                    $data[$i]['permaLien'] = $value_value_offer_url;
                    $data[$i] = (object)$data[$i];
                    $i++;
                }
            }
        }

        // dd($data);

    	return $data;
    }
    public function urlBuilder($inputs) {
        $url = 'http://www.logic-immo.com/';
        $url = $this->paramProject($inputs['transaction'], $url);
        $url = $this->paramZip($inputs['localisation'], $url);
        $url .= '/options/';
        $url = $this->paramType($inputs['type'], $url);
        $url = $this->paramBudgetMax($inputs['budgetMax'], $url);
        if(isset($inputs['surface-min'])){
            $url = $this->paramAreaMin($inputs['surface-min'], $url);
        }
        if(isset($inputs['surface-max'])){
            $url = $this->paramAreaMax($inputs['surface-max'], $url);
        }
        return $url;
    }

    public function paramProject($type, $url) {
        if($type == 'sell'){
            $url .= 'vente-immobilier-';
        }       
        elseif($type == 'rent'){
            $url .= 'location-immobilier-';
        }
        return $url;
    }

    public function paramZip($zip, $url) {
        $zipLogicImmoParams = $this->ZipController->idToLogicImmo($zip);
        $lct_id_array = [];
        $lct_level_array = [];

        foreach ($zipLogicImmoParams as $key_zipLogicImmoParams => $value_zipLogicImmoParams) {
            $lct_id_array[] = $value_zipLogicImmoParams[0]->lct_id;
            $lct_level_array[] = $value_zipLogicImmoParams[0]->lct_level;
            $lct_name = str_replace(' ', '-', $value_zipLogicImmoParams[0]->lct_name);
            $url .= $lct_name.'-'.$value_zipLogicImmoParams[0]->Code_postal.',';
        }

        $len = count($lct_id_array);

        foreach ($lct_id_array as $key_lct_id_array => $value_lct_id_array) {
            $url .= $value_lct_id_array.'_'.$lct_level_array[$key_lct_id_array];
            if ($key_lct_id_array < $len - 1) {
                $url .= ',';
            }
        }

        return $url;
    }

    public function paramType($type, $url) {
        // dd($type);
        $url .= 'groupprptypesids=';
        $len = count($type);

        foreach ($type as $key_type => $value_type) {

            if($value_type == "appartement") {
                $url .= '1';
            }
            elseif($value_type == "maison") {
                $url .= '2';
            }

            if($key_type < $len - 1) {
               $url .= ','; 
            }
        }
        return $url.'/page=1';
    }

    public function paramBudgetMax($budgetMax, $url) {
        $url .= '/pricemax='.$budgetMax;
        return $url;
    }

    public function paramAreaMin($surfMin, $url) {
        $url .= '/areamin='.$surfMin;
        return $url;  
    }

    public function paramAreaMax($surfMax, $url) {
        $url .= '/areamax='.$surfMax;
        return $url;  
    }
}
