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
        // dd($inputs);
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
        // dd($url);
        // http://www.logic-immo.com/vente-immobilier-paris-9e-75009,23609_2/options/groupprptypesids=1,2,6,7,12,15/pricemin=450000/pricemax=950000/areamin=30
       
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

    // http://www.logic-immo.com/vente-immobilier-paris-8e-75008,paris-7e-75007,23607_2,23606_2/options/groupprptypesids=1,2,6,7,12,15/pricemin=450000/pricemax=950000/areamin=30

    // http://www.logic-immo.com/vente-immobilier-paris-8e-75008,paris-7e-75007,23607_2,23606_2/options/groupprptypesids=1,2,6,7,12,15/searchoptions=1/pricemin=450000/pricemax=950000/areamin=30/nbbedrooms=2,3/advancedcriteria=14,3,24,13,16,10

    //http://www.logic-immo.com/vente-immobilier-paris-8e-75008,paris-7e-75007,23607_2,23606_2/options/groupprptypesids=1,2,15,12,6,7/pricemin=500/pricemax=2000000/areamin=34/areamax=500/nbrooms=2,3,4/nbbedrooms=1,2,3

    public function paramZip($zip, $url) {
        // dd($zip);
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
        return $url;
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
