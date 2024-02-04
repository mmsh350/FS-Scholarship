<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\State;
class StateController extends Controller
{
    public function fetchState()
    {   //Fetch States from DB
        $tblStates = State::orderby("id","asc")->select(['id', 'stateName'])->get();
        return response()->json($tblStates);
    }
    public function fetchStateCount()
    {   //Fetch States from DB
        $tblStatesItems = State::orderby("id","asc")->select('id')->get();
        $getcount =  $tblStatesItems->count();
        $stateArray=array();
        for ($i = 1; $i <= $getcount; $i++) {
            $getCountOnApplication = Application::where('location_id',$i)->count('location_id');
            $stateArray[$i]=  $getCountOnApplication ;
        }
        return response()->json( $stateArray);
    }
}
