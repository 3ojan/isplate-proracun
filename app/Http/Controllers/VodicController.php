<?php

namespace App\Http\Controllers;

use App\Models\Vodic;
use App\Models\VodicAktivnost;
use App\Models\VodicPodaci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VodicController extends Controller
{
    //
    function getProracunVodic($proracunplanid, $vodicSekcija)
    {
        return Vodic::where('proracunplanid', $proracunplanid)->where('vodicsekcija', $vodicSekcija)->get();
    }

    function getProracunVodicPodaci($rkpid, $proracunplanid, $vodicSekcija)
    {
        return VodicPodaci::where('rkpid', $rkpid)->where('proracunplanid', $proracunplanid)->where('vodicsekcija', $vodicSekcija)->get();
    }

    function getProracunVodicAktinostList($rkpid, $proracunplanid)
    {
        return VodicAktivnost::where('rkpid', $rkpid)->where('proracunplanid', $proracunplanid)->get();
    }
}
