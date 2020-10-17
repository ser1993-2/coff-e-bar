<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public static  function getAllStorages()
    {

        $result = Storage::getAll();
        return response()->json($result);
    }

    public static  function getStorage(Request $request, $id)
    {
        $result = Storage::getStorageById($id);
        return response()->json($result);
    }

    public static  function getStorageByBarId(Request $request, $id)
    {
        $result = Storage::getStorageByBarId($id);
        return response()->json($result);
    }
}
