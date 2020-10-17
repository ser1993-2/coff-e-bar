<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageConsumable extends Model
{
    use HasFactory;

    protected $table = 'storage_consumables';

    public static function getConsumableByStorageId($id)
    {
        return StorageConsumable::join('consumables','consumables.id', 'storage_consumables.consumables_id')
            ->select('storage_consumables.id', 'consumables.name', 'storage_consumables.value', 'consumables.description',
                'storage_consumables.consumables_id')
            ->where('storage_consumables.storage_id', $id)
            ->get();
    }

    public static function updateConsumable($request)
    {
        $storageConsumables = StorageConsumable::getConsumableByStorageId($request->storage_id);
        $drinkRecipe = DrinkRecipe::getRecipeForDrink($request->drink_id);

        foreach ($storageConsumables as $storageConsumable) {
            foreach ($drinkRecipe as $recipeItem) {
                if ($storageConsumable->consumables_id === $recipeItem->consumables_id) {

                    $newValue = (int) $storageConsumable->value - (int) $recipeItem->value;

                    StorageConsumable::where('id', $storageConsumable->id)
                        ->update([
                        'value' => $newValue
                    ]);
                }
            }
        }
    }
}
