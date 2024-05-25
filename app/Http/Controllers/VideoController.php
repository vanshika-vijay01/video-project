<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Video;
use App\models\Category;

class VideoController extends Controller
{
    public function index(){
        $video=Video::all();
        return view('Video.index', compact('video'));
    }

    public function create(Request $request){
        $category = Category::all();
        return view('Video.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $videoPath = $request->file('thumbnail')->store('public/videos');

        $videoPath = str_replace('public/', '', $videoPath);

        $video = new Video();
        $video->name = $request['name'];
        $video->description = $request['description'];
        $video->category_id = $request['category_id'];
        $video->thumbnail = $videoPath;

        $video->save();
    
        return redirect()->route('video.index')->with('success', 'Video uploaded successfully.');
    }

    public function edit(Request $request, $id){
        $video=Video::find($id);
        $category = Category::all();
        if($video){
            return view('Video.create', compact('category','video'));
        }
    
    }
    

    public function update(Request $request, $id){

        $data=$request->validate([
            'name'=>'required|string|unique:categories',
            'description' => 'required',
            'thumbnail' => 'required',
            'category_id'=>'required',
        ]);


        $video=Video::find($id);
        if($video){
            $video->name=isset($data['name'])?$data['name']:$video->name;
            $video->description=isset($data['description'])?$data['description']:$video->description;
            if($request->hasFile('thumbnail')){
                $oldThumbnailPath = public_path('storage/') . $video->thumbnail;
                if(file_exists($oldThumbnailPath)){
                    @unlink($oldThumbnailPath);
                }

                $path= $request->file('thumbnail')->store('videos', 'public');
                $video->thumbnail=$path;
                $video->save();
            }

            $video->category_id=isset($data['category_id'])?$data['category_id']:$video->category_id;
            $video->save();
        }

        return redirect()->route('video.index')->with('success','Video Updated Successfully.');
    }

    public function destroy(Request $request, $id){
        $video=Video::find($id);
        if($video){
            $video->delete();
        }

        return redirect()->route('video.index')->with('success','  Video Deleted Successfully.');
    }
}
