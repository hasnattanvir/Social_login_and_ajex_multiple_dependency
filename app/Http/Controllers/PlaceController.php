<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Country;
use App\Models\City;
class PlaceController extends Controller
{

    public function addplaces(){
        $regions = Region::all();
        return view('frontend.layouts.master', compact('regions'));
    }


    public function getCountries($id){

        $html = '';
        $countries = Country::where('region_id', $id)->get();
        //tow way pass data use json or html foreach
        // return response()->json($Country);
        foreach($countries as $country){
            $html .= '<option value="'.$country->id.'">'.$country->country_name.'</option>';
        }
        return response()->json($html);
    }


    public function getCities($id){

        $html = '';
        $cities = City::where('country_id', $id)->get();
        //tow way pass data use json or html foreach
        // return response()->json($Country);
        foreach($cities as $citi){
            $html .= '<option value="'.$citi->id.'">'.$citi->city_name.'</option>';
        }
        return response()->json($html);
    }
}
