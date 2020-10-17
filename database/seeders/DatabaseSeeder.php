<?php

namespace Database\Seeders;

use App\Models\Bar;
use App\Models\Consumable;
use App\Models\Drink;
use App\Models\DrinkRecipe;
use App\Models\Storage;
use App\Models\StorageConsumable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $bars = [
            ['name' => 'Бар на алее Героев'],
            ['name' => 'Бар в парке им.Горького'],
            ['name' => 'Бар по ул.Жукова'],
            ['name' => 'Бар на набережной'],
            ['name' => 'Бар в ТЦ Молл'],
        ];

        Bar::insert($bars);

        //--------------------------------------------------
        $drinks = [
            ['name' => 'Капучино'],
            ['name' => 'Экспрессо'],
            ['name' => 'Кофе с молоком'],
            ['name' => 'Кофе без сахара'],
            ['name' => 'Американо'],
        ];

        Drink::insert($drinks);

        //--------------------------------------------------
        $storages = [
            ['name' => 'Склад - Бар на алее Героев', 'bars_id' => 1],
            ['name' => 'Склад - Бар в парке им.Горького', 'bars_id' => 2],
            ['name' => 'Склад - Бар по ул.Жукова', 'bars_id' => 3],
            ['name' => 'Склад - Бар на набережной', 'bars_id' => 4],
            ['name' => 'Склад - Бар в ТЦ Молл', 'bars_id' => 5],
            ['name' => 'Центральный склад', 'bars_id' => 0],
        ];

        Storage::insert($storages);

        //--------------------------------------------------
        $storageConsumable = [
            ['consumables_id' => 1, 'storage_id' => 1, 'value' => 5000 ],
            ['consumables_id' => 2, 'storage_id' => 1, 'value' => 2540 ],
            ['consumables_id' => 3, 'storage_id' => 1, 'value' => 53 ],
            ['consumables_id' => 4, 'storage_id' => 1, 'value' => 3670 ],
            ['consumables_id' => 5, 'storage_id' => 1, 'value' => 950 ],
            ['consumables_id' => 1, 'storage_id' => 2, 'value' => 2540 ],
            ['consumables_id' => 2, 'storage_id' => 2, 'value' => 3670 ],
        ];

        StorageConsumable::insert($storageConsumable);

        //--------------------------------------------------
        $consumables = [
            ['name' => 'сахар', 'description' => 'гр'],
            ['name' => 'кофе', 'description' => 'гр'],
            ['name' => 'стаканчик', 'description' => 'шт'],
            ['name' => 'молоко',  'description' => 'мл'],
            ['name' => 'какао',  'description' => 'мл'],
        ];

        Consumable::insert($consumables);

        //--------------------------------------------------
        $drinkRecipe = [
            ['consumables_id' => 1, 'drink_id' => 1, 'value' => 50],
            ['consumables_id' => 2, 'drink_id' => 1, 'value' => 30],
            ['consumables_id' => 3, 'drink_id' => 1, 'value' => 1],
            ['consumables_id' => 4, 'drink_id' => 1, 'value' => 10],
            ['consumables_id' => 1, 'drink_id' => 2, 'value' => 90],
            ['consumables_id' => 2, 'drink_id' => 2, 'value' => 90],
            ['consumables_id' => 3, 'drink_id' => 2, 'value' => 1],
            ['consumables_id' => 1, 'drink_id' => 3, 'value' => 9999],
            ['consumables_id' => 2, 'drink_id' => 3, 'value' => 45],
            ['consumables_id' => 3, 'drink_id' => 3, 'value' => 1],
        ];

        DrinkRecipe::insert($drinkRecipe);
    }
}
