<?php

namespace App\Http\Controllers;

use App\Models\DrinkRecipe;
use Illuminate\Http\Request;

class DrinkRecipeController extends Controller
{
    public static  function getRecipeForDrink(Request $request, $id)
    {
        $result = DrinkRecipe::getRecipeForDrink($id);
        return response()->json($result);
    }
}
