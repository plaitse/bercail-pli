<?php

namespace App\Models\Logicimmo;

use Illuminate\Database\Eloquent\Model;
use Goutte\Client;
use App\Http\Controllers\Tools\ZipController;

class LogicimmoModel extends Model
{

    private $client;
    private $ZipController

    public function __construct()
    {
        $this->client = new Client();
        $this->ZipController = new ZipController();
    }

    public function getLogicimmoResults($inputs) {

        // $client = new Client();
        // $resultsLogicimmo = $this->logicimmo->getLogicimmo($inputs);

        $url = $this->urlBuilder($inputs);
        // dd($url);



     //    $crawler = $this->client->request('GET', 'http://www.logic-immo.com/vente-immobilier-paris-9e-75009,23609_2/options/groupprptypesids=1,2,6,7,12,15/pricemin=450000/pricemax=950000/areamin=30');
     //    $crawler->filter('.offer-block a.offer-link')->each(function ($node) {
     //    dump($node->text());
     //    });
     //    dd($crawler);

    	// return $crawler;
    }
    public function urlBuilder($inputs) {
        $url = 'http://www.logic-immo.com/';
        $url = $this->paramType($inputs['transaction'], $url);
        // $url = $this->paramZip($inputs['localisation'], $url);

        // http://www.logic-immo.com/vente-immobilier-paris-9e-75009,23609_2/options/groupprptypesids=1,2,6,7,12,15/pricemin=450000/pricemax=950000/areamin=30
       
        return $url;
    }

    public function paramType($type, $url) {
        if($type == 'sell'){
            $url .= 'vente-immobilier-';
        }       
        elseif($type == 'rent'){
            $url .= 'location-immobilier-';
        }
        return $url;
    }

    public function paramZip ($zip, $url) {
        // dd($zip);
        $zipLogicImmoParams = $this->ZipController->idToLogicImmo($zip);
        // dd($zipLogicImmoParams);
        // $getZipInfosFromLogicImmo = file_get_contents("http://www.logic-immo.com/asset/t9/getLocalityT9.php/?site=fr&lang=fr&json=75009");
        $getZipInfosFromLogicImmo = json_decode($getZipInfosFromLogicImmo);
        // dd($getZipInfosFromLogicImmo[0]->children[0]);
    }
}
