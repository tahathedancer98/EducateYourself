<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieStoreRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('categories.list', compact('categories'));
    }
    public function add(){
        return view('categories.add');
    }

    public function store(CategorieStoreRequest $request){
        $params = $request->validated();
        Categorie::create($params);

        $categories = Categorie::all();
        return view('categories.list', compact('categories'));
    }
    public function update(CategorieStoreRequest $request, $id){
        $params = $request->validated();

        $category = Categorie::find($id);
        $category->update($params);

        $categories = Categorie::all();
        return view('categories.list', compact('categories'));
    }
    public function delete($id){
        $category = Categorie::find($id);
        $category->delete();

        $categories = Categorie::all();
        return view('categories.list', compact('categories'));
    }
}
