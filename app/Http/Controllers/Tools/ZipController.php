<?php

namespace App\Http\Controllers\Tools;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class ZipController extends \App\Http\Controllers\Controller
{
    public function searchZip (Request $request) {
    	$inputs = $request->all();
    	$postCodes = \DB::table('zip')
    		->where('Code_postal', 'like', $inputs['q'].'%')
    		->orWhere('NOM_COM', 'like', $inputs['q'].'%')
    		->get();

    	$return = collect([]);
    	foreach($postCodes as $postCode) {
    		$return->push([
    			'id'=> $postCode->id, 
    			'text'=> $postCode->Code_postal.'-'.$postCode->NOM_COM
    		]);
    	}

    	return $return->toJson();
    }

    public function idToSelogerInsee ($id) {
    	if (count($id) == 1){		
	    	$zip = \DB::table('zip')
	    		->select('INSEE_COM')
	    		->where('id', $id)
	    		->get();
	    	$zipSelogerInsee = substr_replace($zip[0]->INSEE_COM, '0', 2, 0);
    	}
    	elseif (count($id) > 1) {
    		foreach($id as $key => $value) {
		    	$zip = \DB::table('zip')
	    			->select('INSEE_COM')
		    		->where('id', $value)
		    		->get();
	    		if (!isset($zipSelogerInsee)) {
		    		$zipSelogerInsee = substr_replace($zip[0]->INSEE_COM, '0', 2, 0);
	    		}
	    		else {
	    			$zipSelogerInsee.= ','.substr_replace($zip[0]->INSEE_COM, '0', 2, 0);
	    		}
    		}
    	}
    	return $zipSelogerInsee;
    }

    public function idToLogicImmo ($id) {
    	$zip = array();
		foreach($id as $key => $value) {
	    	$zip[] = \DB::table('zip')
    			->select('Code_postal', 'NOM_COM', 'lct_name', 'lct_id', 'lct_level')
	    		->where('id', $value)
	    		->get();
		}
    	return $zip;
    }
}
