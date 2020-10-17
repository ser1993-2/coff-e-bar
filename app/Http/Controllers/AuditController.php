<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\StorageConsumable;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public static  function storeAudit(Request $request)
    {
        StorageConsumable::updateConsumable($request);

        $result = Audit::storeAudit($request);
        return response()->json($result);
    }

    public static  function getAllAudits()
    {
        $result = Audit::getAll();
        return response()->json($result);
    }
}
