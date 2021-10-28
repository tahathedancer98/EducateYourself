<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdateRequest;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function index(){
        $formations = Formation::orderBy('updated_at','DESC')->get();
        return view('formations.list', compact('formations'));
    }

    public function details($id){
        $formation = Formation::find($id);
        return view('formations.details', compact('formation'));
    }
    public function detainsNom(Request $request, $nom){
        $params = $request->all();
        $formation = Formation::where('nom',$nom);
        dd($formation);
        return view();
    }
    public function add(){
        return view('formations.add');
    }
    public function store(FormationStoreRequest $request){
        $params = $request->validated();
        $file = Storage::put('public',$params['image']);
        $params['image'] = substr($file,7);
        $params['user_id'] = auth()->user()->id;
        Formation::create($params);

        return redirect()->route('formationList');
    }
    public function update(FormationStoreRequest $request, $id){
        $params = $request->validated();
        $formation = Formation::find($id);
        $formation->update($params);

        return redirect()->route('formationList');
    }
    public function updateImage(FormationUpdateRequest $request, $id){
        $params = $request->validated();
        $formation = Formation::find($id);
        if(Storage::exists("public/$formation->image")){
            Storage::delete("public/$formation->image");
        }
        $file = Storage::put('public',$params['image']);
        $params['image'] = substr($file,7);
        $formation->image = $params['image'];
        $formation->save();
        return redirect()->route('formationList');
    }
    public function delete($id){
        $formation = Formation::find($id);
        $formation->delete();

        return redirect()->route('formationList');
    }
}
