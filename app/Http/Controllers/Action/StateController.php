<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
class StateController extends Controller
{
    public function fetchState()
    {   //Fetch States from DB
        $tblStates = State::orderby("id","asc")->select(['id', 'stateName'])->get();
        return response()->json($tblStates);
    }
}
