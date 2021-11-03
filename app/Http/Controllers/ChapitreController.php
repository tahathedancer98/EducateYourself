<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapitreStoreRequest;
use App\Models\Chapitre;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    public function index(){
        $chapitres = Chapitre::all();
        return view('chapitres.list', compact('chapitres'));
    }
    public function details($id){
        $chapitre = Chapitre::find($id);

        return view('chapitres.details', compact('chapitre'));
    }
    public function add(){
        return view('chapitres.add');
    }

    public function store(ChapitreStoreRequest $request){
        $params = $request->validated();
        Chapitre::create($params);

        $chapitres = Chapitre::all();
        return view('chapitres.list', compact('chapitres'));
    }
    public function update(ChapitreStoreRequest $request, $id){
        $params = $request->validated();

        $chapitre = Chapitre::find($id);
        $chapitre->update($params);

        $chapitres = Chapitre::all();
        return view('chapitres.list', compact('chapitres'));
    }
    public function delete($id){
        $chapitre = Chapitre::find($id);
        $chapitre->delete();

        $chapitres = Chapitre::all();
        return view('chapitres.list', compact('chapitres'));
    }
}
