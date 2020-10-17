<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    public static  function getAllConsumables()
    {
        $result = Consumable::getAll();
        return response()->json($result);
    }

    public static  function getConsumable(Request $request, $id)
    {
        $result = Consumable::getConsumableById($id);
        return response()->json($result);
    }

    public static  function getConsumableByStorageId(Request $request, $id)
    {
        $result = Consumable::getConsumableByStorageId($id);
        return response()->json($result);
    }
}
