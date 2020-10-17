<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $table = 'storages';

    public static function getAll()
    {
        return Storage::get();
    }

    public static function getStorageById($id)
    {
        return Storage::where('id', $id)
            ->first();
    }

    public static function getStorageByBarId($id)
    {
        return Storage::where('bars_id', $id)
            ->first();
    }
}
