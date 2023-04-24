<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index(){
        return view('category.index')->with('categories',Category::all());
    }


    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        Category::create($request->all());
        session()->flash('success','Categoria Criada com Sucesso!');
        return redirect(route('category.index'));
    }

    public function destroy(Category $category){
        $category->delete();
        session()->flash('success','Categoria Apagada com Sucesso!');
        return redirect(route('category.index'));
    }

    public function edit(Category $category){
        return view('category.edit')->with('category', $category);
    }

    public function update(Category $category, Request $request){
        $category->update($request->all());
        session()->flash('success','Categoria Editada com Sucesso!');
        return redirect(route('category.index'));
    }

    public function trash(){
        return view('category.trash')->with('categories',Category::onlyTrashed()->get());
    }

    public function restore($category_id){
        $category = Category::onlyTrashed()->where('id', $category_id)->first();
        $category->restore();
        session()->flash('success','Categoria restaurada com Sucesso!');
        return redirect(route('category.index'));
    }

}
