<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
require '../vendor/seloger-php/src/SeLoger/Request.php';
require '../vendor/seloger-php/src/SeLoger/Search.php';

class SelogerController extends Controller
{
    public function getSelogerInfo ($inputs) {

		$search = new \Seloger\Search();

		// Apply custom options
		$search->type($inputs["transaction"]);
		$search->order('date_desc');
		$search->property($inputs["type"]);
		$search->zipcode($inputs['localisation']);
		$search->price(0, $inputs["budgetMax"]);
		// $search->page(2);

		// Additionnal
		// $search->si('elevator', TRUE);

		// Get results
		$results = $search->run();
		// dd($results);
		//echo '<pre>' . print_r($results->annonces->annonce[0]->firstThumb, TRUE) . '<pre>';

    	return $results;
    }
}
