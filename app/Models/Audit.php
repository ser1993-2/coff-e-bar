<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;

    public static function storeAudit($request)
    {
        return Audit::insert([
            'bars_id' => $request->bars_id,
            'drink_id' => $request->drink_id,
        ]);
    }

    public static function getAll()
    {
        return Audit::join('bars', 'bars.id', 'audits.bars_id')
            ->join('drinks', 'drinks.id', 'audits.drink_id')
            ->select('audits.id', 'drinks.name as drink_name', 'bars.name as bar_name')
            ->get();
    }
}
