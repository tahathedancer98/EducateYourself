<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdateImageRequest;
use App\Http\Requests\FormationUpdateRequest;
use App\Models\Categorie;
use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function index(){
        $current_user = auth()->user();
        if(auth()->user()->is_admin != null){
            $formations = Formation::all();
        }else{
            $formations = Formation::where('user_id',$current_user->id)->get();
        }
        //dd($formations);
        return view('formations.list', compact('formations'));
    }
    public function indexVisiteurs(){
        $formations = Formation::orderBy('updated_at','DESC')->get();
        return view('visiteurs.list', compact('formations'));
    }
    public function detailsFormationVisiteurs($id){
        $formation = Formation::find($id);
        $categories = $formation->categories;
        $chapitres = $formation->chapitres;
        return view('visiteurs.details', compact(['formation','categories','chapitres']));
    }
    public function details($id){
        $formation = Formation::find($id);
        $categories = Categorie::all();
        $chapitres = Chapitre::all();
        return view('formations.details', compact(['formation','categories','chapitres']));
    }
    public function add(){
        $categories = Categorie::all();
        $chapitres = Chapitre::all();
        return view('formations.add',compact('categories','chapitres'));
    }
    public function store(FormationStoreRequest $request){
        $params = $request->validated();
        $file = Storage::put('public',$params['image']);
        $params['image'] = substr($file,7);
        $params['user_id'] = auth()->user()->id;
        $formation = Formation::create($params);

        if(!empty($params['checkboxCategories'])){
            $formation->categories()->attach($params['checkboxCategories']);
        }

        if(!empty($params['checkboxChapitres'])){
            $formation->chapitres()->attach($params['checkboxChapitres']);
        }

        return redirect()->route('formationList');
    }
    public function update(FormationUpdateRequest $request, $id){
        $params = $request->validated();
        $formation = Formation::find($id);
        $formation->update($params);

        $formation->categories()->detach();
        if(!empty($params['checkboxCategories'])){
            $formation->categories()->attach($params['checkboxCategories']);
        }

        $formation->chapitres()->detach();
        if(!empty($params['checkboxChapitres'])){
            $formation->chapitres()->attach($params['checkboxChapitres']);
        }
        return redirect()->route('formationDetails', $id);
    }
    public function updateImage(FormationUpdateImageRequest $request, $id){
        $params = $request->validated();
        $formation = Formation::find($id);
        if(Storage::exists("public/$formation->image")){
            Storage::delete("public/$formation->image");
        }
        $file = Storage::put('public',$params['image']);
        $params['image'] = substr($file,7);
        $formation->image = $params['image'];
        $formation->save();
        return back();
    }
    public function delete($id){
        $formation = Formation::find($id);
        $formation->delete();

        return redirect()->route('formationList');
    }

    public function recherche(){
        return view('visiteurs.recherche');
    }
    public function rechercheNom(Request $request){
        $recherche = "Recherche par Nom";
        $formations = Formation::where('nom','=',$request->nom)->get();
        return view('visiteurs.list', compact(['formations','recherche']));
        //return view('visiteurs.details', compact(['formation','categories','chapitres']));
    }
    public function rechercheType(Request $request){
        $recherche = "Recherche par Type";
        $formations = Formation::where('type','=',$request->type)->get();
        return view('visiteurs.list', compact(['formations','recherche']));
    }
    public function rechercheCategorie(Request $request){
        $recherche = "Recherche par Catégorie";
        $formations = Categorie::find(1)->formations()->get();
        return view('visiteurs.list', compact(['formations','recherche']));
    }
}
