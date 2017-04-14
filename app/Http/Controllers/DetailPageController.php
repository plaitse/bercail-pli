<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Seloger\SelogerModel;

class DetailPageController
{

	private $seloger;

	public function __construct() {
		$this->seloger = new SelogerModel();
	}

    public function getDetail (Request $request) {
    	$inputs = $request->all();
    	$results = $this->seloger->getSelogerDetail($inputs);
    	dd($results);   	
    	return view('pages.detail-page', compact('results'));
	}
}