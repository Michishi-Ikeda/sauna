<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauna;

class SaunaController extends Controller
{
    
    public function index(Sauna $sauna)
    {
        return view('saunas/index')->with(['saunas' => $sauna->getPaginateByLimit()]);
    }
}
