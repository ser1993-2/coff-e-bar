<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkRecipe extends Model
{
    use HasFactory;

    protected $table = 'drink_recipes';

    public static function getRecipeForDrink($id)
    {
        return DrinkRecipe::where('drink_id', $id)
            ->join('consumables', 'consumables.id', 'drink_recipes.consumables_id')
            ->select('drink_recipes.id', 'consumables.name', 'consumables.description', 'drink_recipes.value','drink_recipes.consumables_id')
            ->get();
    }
}
