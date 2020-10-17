<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    public static function getAll()
    {
        return Drink::get();
    }

    public static function getDrinkById($id)
    {
        return Drink::where('id', $id)
            ->first();
    }
}
