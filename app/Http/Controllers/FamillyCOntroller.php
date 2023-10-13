<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamillyCOntroller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return response()->json(Family::with('descendants')->whereNull('parent_id')->get());
        $familyTree = Family::with('descendants')->whereNull('parent_id')->get()->map(function ($family){
             $family->depth = 0;
            $family->loadChildrenWithDepth();
            return $family;
        });


        return response()->json(Family::find(4)->depth());
    }
}
