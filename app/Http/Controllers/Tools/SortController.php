<?php

namespace App\Http\Controllers\Tools;
use Illuminate\Http\Request;

class SortController extends \App\Http\Controllers\Controller
{
    public function index($results){
        // dd($results);
        $final_tab = [];
        $already_scan_tab = [];
        $i = 0;
        foreach ($results as $key_results => $value_results) {
            if (!in_array($key_results, $already_scan_tab)){
                $already_scan_tab[] = $key_results;
                $final_tab[$i][] = $value_results;
                if (isset($value_results->surface, $value_results->nbPiece, $value_results->cp)){                
                    foreach ($results as $key_results_second => $value_results_second){
                        if (isset($value_results_second->surface, $value_results_second->nbPiece, $value_results_second->cp)){ 
                            if (!in_array($key_results_second, $already_scan_tab) &&
                                $value_results->surface == $value_results_second->surface &&
                                $value_results->nbPiece == $value_results_second->nbPiece &&
                                $value_results->cp == $value_results_second->cp)
                            {
                                $final_tab[$i][] = $value_results_second;
                                $already_scan_tab[] = $key_results_second;
                            }
                        }
                    }
                }
                $i++;
            }
        }

        foreach ($final_tab as $key_final_tab => $value_final_tab) {
            $prix = [];
            foreach ($value_final_tab as $key => $row) {
                $prix[$key]  = (int)$row->prix;
            }
            array_multisort($prix, SORT_ASC, SORT_NUMERIC, $value_final_tab);
            $final_tab[$key_final_tab] = $value_final_tab;
        }
        
        return ($final_tab);
    }
}
