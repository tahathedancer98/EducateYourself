<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    public function details($id){
        $chapitre = Chapitre::find($id);
        return view();
    }
}
