<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ExploreImmoModel;
use App\SelogerModel;

class ResultPageController
{

	private $explore;
	private $seloger;

	public function __construct()
	{
		$this->explore = new ExploreImmoModel();
		$this->seloger = new SelogerModel();
	}

    public function getResults (Request $request) {
    	$route = $request->path();
		$inputs = $request->all();

		// $this->explore->getExploreImmoInfo($inputs);

		// dd($inputs);

		if ($inputs) {
    		$results = $this->seloger->getSelogerInfo($inputs);
	        if($route == "results"){
	        	// dd($results);
	        	// dd($inputs);
				return view('pages.result-page', compact('results'), compact('inputs'));
	        }
	        elseif($route == "api/results"){
				return json_encode(compact('results'));
	        }
        }
        else{
        	return "Pas de bras, pas de chocolat ! mouahahahahahah :D";
        }


	}
}
