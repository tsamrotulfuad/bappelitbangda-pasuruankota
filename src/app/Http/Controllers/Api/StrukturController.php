<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index()  {
        $data = \App\Models\Struktur::all();
        return response()->json($data);
    }
}
