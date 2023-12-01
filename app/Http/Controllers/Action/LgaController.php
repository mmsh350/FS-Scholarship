<?php

namespace App\Http\Controllers\action;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lga;
class LgaController extends Controller
{
    public function fetchLgas(Request $request)
    {

            $id = $request->input('getId');
             
            $lgas = Lga::where('stateId', $id)
                            ->orderby("id","asc")
                            ->select(['id','lgaName'])->get();
                            
            return response()->json($lgas);
    }
}
