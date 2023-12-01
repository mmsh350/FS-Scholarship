<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function fetchSchools(Request $request)
    {

            $id = $request->input('getId');
             
            $results = School::where('Schl_category', $id)
                            ->orderby("id","asc")
                            ->select(['id','Schl_name'])->get();
                            
            return response()->json($results);
    }
}
