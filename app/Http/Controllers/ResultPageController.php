<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ExploreImmoModel;
use App\Models\Seloger\SelogerModel;
use App\Models\Logicimmo\LogicimmoModel;



class ResultPageController
{

	// private $explore;
	private $seloger;
	private $logicimmo;

	public function __construct()
	{
		// $this->explore = new ExploreImmoModel();
		$this->seloger = new SelogerModel();
		$this->logicimmo = new LogicimmoModel();
	}

    public function getResults (Request $request) {

		$inputs = $request->all();
		// dd($inputs);

    	// $resultsLogicimmo = $this->logicimmo->getLogicimmoResults($inputs);




    	$route = $request->path();

		// $this->explore->getExploreImmoInfo($inputs);


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
