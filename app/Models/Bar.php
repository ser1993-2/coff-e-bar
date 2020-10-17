<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;

    public static function getAll()
    {
        return Bar::get();
    }

    public static function getBarById($id)
    {
        return Bar::where('id', $id)
            ->first();
    }
}
