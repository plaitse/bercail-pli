<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ResultPageController extends SelogerController
{
    public function getResults (Request $request) {
		$inputs = $request->all();
		if ($inputs) {
    		$results = static::getSelogerInfo($inputs);
        }
		return view('pages.result-page', compact('results'));
	}
}
