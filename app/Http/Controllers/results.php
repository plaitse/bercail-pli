<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class results extends seloger
{
    public function results (Request $request) {
		$inputs = $request->all();
		if ($inputs) {
    		$results = static::selogerAction($inputs);
        }

		return view('pages.results', compact('results'));
	}
}
