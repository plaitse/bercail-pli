<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ExploreImmoModel;
use App\Models\Seloger\SelogerModel;
use App\Models\Logicimmo\LogicimmoModel;
use App\Http\Controllers\Tools\SortController;



class ResultPageController
{

	private $seloger;
	private $logicimmo;
	private $sort;

	public function __construct()
	{
		$this->seloger = new SelogerModel();
		$this->logicimmo = new LogicimmoModel();
		$this->sort = new SortController();
	}

    public function getResults (Request $request) {

		$inputs = $request->all();
    	$route = $request->path();

		if ($inputs) {
    		$results = $this->seloger->getSelogerInfo($inputs);
    		$resultsLogicimmo = $this->logicimmo->getLogicimmoResults($inputs);
        	$results->annonces->annonce = array_merge_recursive($results->annonces->annonce, $resultsLogicimmo);
        	$results->annonces->annonce = $this->sort->index($results->annonces->annonce);
        	
	        if($route == "results"){
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
