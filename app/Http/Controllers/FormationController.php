<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index(){
        $formations = Formation::orderBy('updated_at','DESC')->get();
        return view('formations.list', compact('formations'));
    }
}
