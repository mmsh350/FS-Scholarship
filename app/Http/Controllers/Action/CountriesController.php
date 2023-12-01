<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;

class CountriesController extends Controller
{
    public function fetchCountry()
    {   //Fetch Countries from DB
        $tblCountries = Countries::orderby("id","asc")->select(['id', 'CountryName'])->get();
        return response()->json($tblCountries);
    }
}
