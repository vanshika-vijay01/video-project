@extends('layouts.app')
    <div class="container mt-3">
        <h1>Video Form</h1>
        <div class="card m-3">
            <form action="@if(isset($video)) {{ route('video.update', $video->id) }} @else{{ route('video.store') }} @endif" 
            method="post" enctype="multipart/form-data">
                @csrf
                
                
                <div class="form-group m-2">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ old('name', $video->name ?? '') }}">
                    
                </div>
                <div class="form-group m-2">
                    <label for="">Description</label>
                    <textarea type="text" class="form-control" name="description" id="description" placeholder="description">{{ old('description', $video->description ?? '') }} </textarea>
                   
                </div>

                <div class="form-group m-2">
                    <label for="">Thumbnail</label>
                    <input type="file" class="form-control" value="{{ old('thumbnail', $video->thumbnail ?? '') }}" name="thumbnail" id="thumbnail" placeholder="thumbnail">
                    
                </div>

                <div class="form-group m-2">
                    <label for="">Category</label>
                    <select class="form-select form-control" name="category_id" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach($category as $data)
                            <option value="{{$data->id}}" @if(isset($video)) {{ $data->id == $video->category_id ? 'selected' : '' }} @endif>{{ $data->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
                
                <button type="submit" class="btn btn-primary m-2">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
