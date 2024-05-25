<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::get();
        return view('Category.index', compact('category'));
    }

    public function create(){
        return view('Category.create');
    }

    public function store(Request $request){

        $data=$request->validate([
            'name'=>'required|string|unique:categories',
            'description' => 'required',
        ]);

        Category::create($data);
        return redirect()->route('category.index')->with('success', 'Category Inserted Successfully.');
    }

    public function edit(Request $request, $id){
        $category=Category::find($id);
        if($category){
            return view('Category.create', compact('category'));
        }
    }


    public function update(Request $request, $id){

        $data=$request->validate([
            'name'=>'required|string|unique:categories',
            'description' => 'required',
        ]);


        $category=Category::find($id);
        if($category){
            $category->name=isset($data['name'])?$data['name']:$category->name;
            $category->description=isset($data['description'])?$data['description']:$category->description;
            $category->save();
        }

        return redirect()->route('category.index')->with('success','Category Updated Successfully.');
    }

    public function destroy(Request $request, $id){
        $category=Category::find($id);
        if($category){
            $category->delete();
        }

        return redirect()->route('category.index')->with('success','Category Deleted Successfully.');
    }



}
