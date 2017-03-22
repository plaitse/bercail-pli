<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
require '../vendor/seloger-php/src/SeLoger/Request.php';
require '../vendor/seloger-php/src/SeLoger/Search.php';

class SelogerModel extends Model
{
    public function getSelogerInfo($inputs) {
    	// dd($inputs);

		$search = new \Seloger\Search();

		// Apply custom options
		$search->type($inputs["transaction"]);
		$search->order('date_desc');
		$search->property($inputs["type"]);

		if(isset($inputs["room"])){
			$search->room($inputs["room"]);
		}
		if(isset($inputs["surface-min"]) && isset($inputs["surface-max"])){
			$search->surface($inputs["surface-min"], $inputs["surface-max"]);
		}

		$search->zipcode($inputs['localisation']);
		$search->price(0, $inputs["budgetMax"]);
		// $search->page(2);

		// Additionnal
		// $search->si('elevator', TRUE);

		// Get results
		// dd($search);
		$results = $search->run();
		// dd($results);
		//echo '<pre>' . print_r($results->annonces->annonce[0]->firstThumb, TRUE) . '<pre>';

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
