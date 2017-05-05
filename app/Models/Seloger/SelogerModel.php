<?php

namespace App\Models\Seloger;

use Illuminate\Database\Eloquent\Model;
require '../vendor/seloger-php/src/SeLoger/Request.php';
require '../vendor/seloger-php/src/SeLoger/Search.php';
use App\Http\Controllers\Tools\ZipController;

class SelogerModel extends Model
{
    public function getSelogerInfo($inputs) {

		$search = new \Seloger\Search();
		$ZipController = new ZipController();
		$search->type($inputs["transaction"]);
		$search->order('date_desc');
		$search->property($inputs["type"]);

		if(isset($inputs["room"])) {
			$search->room($inputs["room"]);
		}
		if(isset($inputs["surface-min"]) && isset($inputs["surface-max"])){
			$search->surface($inputs["surface-min"], $inputs["surface-max"]);
		}		
		if(isset($inputs["tri"])) {
			$search->order($inputs["tri"]);
		}

		$search->zipcode($ZipController->idToSelogerInsee($inputs['localisation']));
		$search->price(0, $inputs["budgetMax"]);
		$results = $search->run();

		foreach ($results->annonces->annonce as $key => $value) {
			$results->annonces->annonce[$key]->origin = "sl";
			$results->annonces->annonce[$key]->uuid = uniqid('uuid_', false);
			if ((int)$value->latitude  == 0 || (int)$value->longitude == 0){
				unset($results->annonces->annonce[$key]->latitude);
				unset($results->annonces->annonce[$key]->longitude);
			}
		}

    	return $results;
    }

    public function getSelogerDetail($inputs) {
    	$request = new \Seloger\Request();
    	$request->type = 'annonceDetail';
		$request->setParams('idAnnonce', $inputs['SelogerId']);
		$results = $request->run();
		return $results;
    }

}
