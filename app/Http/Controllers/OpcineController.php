<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opcine;
use Illuminate\Support\Facades\Log; // or Opcine, based on the correct model name

class OpcineController extends Controller
{
    public function index()
    {
        $opcine = Opcine::all();  // Fetch all records from the Opcine table
        return response()->json($opcine);
    }
    public function getOpcinaById($id)
    {
        $opcine = Opcine::where('id', $id)->first();  // Fetch searched record from the Opcine table
        return response()->json($opcine);
    }
    public function getOpcinaByName($name)
    {
        // Log::info('Showing user profile for user: ' . $name);
        $opcine = Opcine::where('url', 'like', '%' . $name . '%')
            ->first();  // Fetch searched record from the Opcine table
        return response()->json($opcine);
    }
}
