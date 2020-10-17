<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use Illuminate\Http\Request;

class BarController extends Controller
{
    public static  function getAllBars()
    {
        $result = Bar::getAll();
        return response()->json($result);
    }

    public static  function getBar(Request $request, $id)
    {
        $result = Bar::getBarById($id);
        return response()->json($result);
    }
}
