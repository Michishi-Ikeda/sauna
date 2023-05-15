<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauna;

class SaunaController extends Controller
{
    
    public function saunaindex(Sauna $sauna)
    {
        return view('saunas/index')->with(['saunas' => $sauna->getPaginateByLimit()]);
    }
    
    public function getByCategory(int $limit_count = 5)
    {
     return $this->posts()->with('sauna')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
