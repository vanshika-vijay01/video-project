@extends('layouts.app')
    <div class="container">
        <h1>Login Form</h1>
        <div class="card m-3">
        <form method="post" id="loginForm" action="{{route('login')}}">
            @csrf
            <div class="m-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="m-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            
            <button type="submit" class="btn btn-primary m-3">Submit</button>
            </form>
        </div>
    </div>

