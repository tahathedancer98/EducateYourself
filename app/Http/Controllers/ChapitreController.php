<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapitreStoreRequest;
use App\Models\Chapitre;
use App\Models\Formation;
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
    public function detailsChapitreVisiteur($id_formation,$id_chapitre){
        $formation = Formation::find($id_formation);
        $chapitres = $formation->chapitres;
        if($id_chapitre === '0'){
            $chapitre = Chapitre::first();
        }else if(count($chapitres) < $id_chapitre){
            return back()
                ->with('alert', "Bravo, vous avez terminé la formation !");
        }else{
            $chapitre = Chapitre::find($id_chapitre);
        }
        return view('visiteurs.chapitres.details', compact(['formation','chapitre']));
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
