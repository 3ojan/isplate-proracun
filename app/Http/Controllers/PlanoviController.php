<?php

namespace App\Http\Controllers;

use App\Models\Planovi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlanoviController extends Controller
{
    //
    function getProracunPlanovi($rkpid)
    {
        return Planovi::where('rkpid', $rkpid)->get();
    }
}
