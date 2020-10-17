<?php

namespace App\Http\Controllers;

use App\Models\StorageConsumable;
use Illuminate\Http\Request;

class StorageConsumableController extends Controller
{
    public static  function getConsumableForStorage(Request $request, $id)
    {
        $result = StorageConsumable::getConsumableByStorageId($id);
        return response()->json($result);
    }
}
