<?php

namespace App\Http\Controllers;

use App\Models\Vodic;
use Illuminate\Http\Request;

class VodicController extends Controller
{
    //
    function getProracunVodic($proracunplanid, $vodicSekcija)
    {
        return Vodic::where('proracunplanid', $proracunplanid)->where('vodicsekcija', $vodicSekcija)->get();
    }
}
