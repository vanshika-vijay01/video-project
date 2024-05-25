@extends('layouts.app')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="bg-light" style="height:100vh">
                    <div class="p-3">
                        <div class="card-title">
                            <h5 class="card-title"></h5>
                            <div class="list-group">
                                <li class="list-group-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="list-group-item"><a href="{{route('category.index')}}">Category</a></li>
                                <li class="list-group-item"><a href="{{route('video.index')}}">Video</a></li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="container mt-3">

                    <div class="card">
                        <div class="row m-3">
                            <div class="col-md-9">
                                <h1>Video </h1>
                            </div>
                            <div class="col-md-3 mt-2">
                                <a href="{{ route('video.create') }}" class="btn btn-primary">Add</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($video as $index=>$data)
                               
                                    <tr>
                                        <th scope="row">{{ $index+1 }}</th>
                                        <td scope="row">{{ $data->name}}</td>
                                        <td scope="row">{{ $data->description }}</td>
                                        <td scope="row">
                                            <video width="200" height="100" controls>
                                                <source src="{{ asset('storage/' . $data->thumbnail) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                        <td scope="row">{{ $data->category->name }}</td>
                                        <td> 
                                            <a href="{{ route('video.edit',['id'=> $data->id])}}" class="btn btn-secondary">Edit</a>
                                            <a href="{{ route('video.delete',['id'=> $data->id])}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
   
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>