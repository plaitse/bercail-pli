<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ExploreImmoModel;
use App\Models\Seloger\SelogerModel;
use App\Models\Logicimmo\LogicimmoModel;
use App\Http\Controllers\Tools\SortController;



class ResultPageController
{

	// private $explore;
	private $seloger;
	private $logicimmo;
	private $sort;

	public function __construct()
	{
		// $this->explore = new ExploreImmoModel();
		$this->seloger = new SelogerModel();
		$this->logicimmo = new LogicimmoModel();
		$this->sort = new SortController();
	}

    public function getResults (Request $request) {

		$inputs = $request->all();
		// dd($inputs);





    	$route = $request->path();

		// $this->explore->getExploreImmoInfo($inputs);


		if ($inputs) {
    		$results = $this->seloger->getSelogerInfo($inputs);
    		$resultsLogicimmo = $this->logicimmo->getLogicimmoResults($inputs);
    		// dd($results);
        	$results->annonces->annonce = array_merge_recursive($results->annonces->annonce, $resultsLogicimmo);
        	// dd($results->annonces->annonce);

        	$results->annonces->annonce = $this->sort->index($results->annonces->annonce);
        	// dd($results);
	        if($route == "results"){
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
