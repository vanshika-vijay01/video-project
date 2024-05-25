@extends('layouts.app')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 p-0">
                <div class="bg-light" style="height: 100vh;">
                    <div class="p-3">
                        <h5 class="card-title">Sidebar</h5>
                        <!-- Add your sidebar content here -->
                        <ul class="list-group">
                            <li class="list-group-item"><a href="#">Dashboard</a></li>
                            <li class="list-group-item"><a href="{{ route('category.index') }}">Categories</a></li>
                            <li class="list-group-item"><a href="{{ route('video.index') }}">Videos</a></li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>Welcome to video management app</h1>
                            <p>This is the content of your home page.</p>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('logout')}}" class="btn btn-primary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
