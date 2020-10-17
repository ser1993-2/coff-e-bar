<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    protected $table = 'consumables';

    public static function getAll()
    {
        return Consumable::get();
    }

    public static function getConsumableById($id)
    {
        return Consumable::where('id', $id)
            ->first();
    }

    public static function getConsumableByStorageId($id)
    {
        return Consumable::where('storage_id', $id)
            ->get();
    }
}
