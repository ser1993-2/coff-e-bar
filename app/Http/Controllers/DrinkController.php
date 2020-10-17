<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\DrinkRecipe;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    public static  function getAllDrinks()
    {
        $result = Drink::getAll();
        return response()->json($result);
    }

    public static  function getDrink(Request $request, $id)
    {
        $result = DrinkRecipe::getRecipeForDrink($id);
        return response()->json($result);
    }
}
