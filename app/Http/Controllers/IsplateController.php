<?php

namespace App\Http\Controllers;

use App\Models\Opcine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IsplateController extends Controller
{
    //
    public function index()
    {
        $isplate = DB::table('isplate')->get();
        return response()->json($isplate);
    }

    // public function queryEntries($name, $queryParam)
    // {
    //     $opcina =  Opcine::where('url', $name)->get();

    //     if (!$opcina) {
    //         return response()->json(['error' => 'User not found'], 404);
    //     }

    //     $entriesQuery = $this->getAllEntriesFromOpcina($opcina, $queryParam);
    //     $results = $entriesQuery
    //         ->where(function ($query) use ($queryParam) {
    //             $query->orWhere('isplate.naziv', 'LIKE', "%$queryParam%")
    //                 ->orWhere('isplate.adresa', 'LIKE', "%$queryParam%")
    //                 ->orWhere('isplate.mjesto', 'LIKE', "%$queryParam%");
    //         })
    //         ->get();

    //     return response()->json($results);
    // }
    public function showEntries($name)
    {
        $opcina =  Opcine::where('url', $name)->get();

        $year = request('year');
        $keyWord = request('keyword');

        $entriesQuery = $this->getAllEntriesFromOpcina($opcina, $year);

        if (!$year) {
            return response()->json(['error' => 'Unesite godinu za pretraživanje'], 400);
        }
        if (!$opcina) {
            return response()->json(['error' => 'Opcina not found'], 404);
        }
        if ($keyWord) {
            $entriesQuery = $this->searchEntries($entriesQuery, $keyWord);
        }

        $entries = $entriesQuery->get();

        return response()->json($entries);
    }

    private function searchEntries($entries, $keyWord)
    {
        $results = $entries->where(function ($query) use ($keyWord) {
            $query
                ->orWhere('isplate.opis', 'LIKE', "%$keyWord%")
                ->orWhere('isplate.primatelj', 'LIKE', "%$keyWord%")
                ->orWhere('isplate.vrstarashoda', 'LIKE', "%$keyWord%")
                ->orWhere('isplate.oib', 'LIKE', "%$keyWord%")
                ->orWhere('isplate.mjesto', 'LIKE', "%$keyWord%");
        });
        return $results;
    }

    private function getAllEntriesFromOpcina($opcina, $year)
    {
        $results = DB::table('isplate')
            ->join('opcine', 'opcine.rkpid', '=', 'isplate.rkpid')
            ->where('opcine.rkpid', '=', $opcina[0]->rkpid)
            ->where('isplate.datum', 'LIKE', "%$year%")
            ->select(
                'isplate.*',
                DB::raw(
                    "DATE_FORMAT(isplate.datum, '%m/%Y') as foramtedDate"
                ),
            );

        return $results;
    }
}
