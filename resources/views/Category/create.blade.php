@extends('layouts.app')

    <div class="container mt-3">
        <div class="card m-3">
            <h1>Category Form</h1>
            <form method="post" action="@if(isset($category)) {{ route('category.update',['id'=>$category->id])}}  @else{{route('category.store')}} @endif">
                @csrf

                <div class="form-group m-2">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" id=""placeholder="Name" value="{{ old('name', $category->name ?? '') }}">
                
                </div>
                <div class="form-group m-2">
                    <label for="">Description</label>
                    <textarea type="text" name="description" class="form-control" id="" placeholder="Description">{{old('description', $category->description ?? '')}}</textarea>
                    
                </div>
                
                <button type="submit" class="btn btn-primary m-2">Submit</button>
            </form>
        </div>
    </div>
