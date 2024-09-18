<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use App\Models\LiveBroadcast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LiveBroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $lives = LiveBroadcast::all();
        return view('admin.lives.index', compact('lives'));

       
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.lives.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lives = new LiveBroadcast;         
        $lives->title = $request->title;         
        $lives->description = $request->description;         
        if($request->hasfile('thumbnail'))        
         {             
            $file= $request->file('thumbnail');             
            $extension = $file->getClientOriginalExtension();             
            $filename = time().".".$extension;             
            $file->move('uploads/thumbnails/', $filename);             
            $lives->thumbnail = $filename;
        }         
            if($request->hasfile('video'))  
         {             
            $file= $request->file('video');                            
            $extension = $file->getClientOriginalExtension();                          
            $filename = time().".".$extension;             
            $file->move('uploads/highlights/', $filename);             
            $lives->video = $filename;
         }

         $lives->save();
    
        return redirect()->route('admin.lives.index')->with('success', 'Live broadcast created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lives = LiveBroadcast::findOrFail($id);
        return view('admin.lives.show', compact('lives'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $live = LiveBroadcast::findOrFail($id);
        return view('admin.lives.edit', compact('live'));
    }
    
    public function update(Request $request, $id)
    {
        $live = LiveBroadcast::findOrFail($id);
        $live->title = $request->title;
        $live->description = $request->description;
    
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/thumbnails/', $filename);
            $live->thumbnail = $filename;
        }
    
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/highlights/', $filename);
            $live->video = $filename;
        }
    
        $live->save();
    
        return redirect()->route('admin.lives.index')->with('success', 'Live broadcast updated successfully.');
    }






    public function destroy($id)
{
    $liveBroadcast = LiveBroadcast::findOrFail($id);
    
    // Delete the thumbnail file
    $thumbnailPath = public_path('uploads/thumbnails/' . $liveBroadcast->thumbnail);
    if (file_exists($thumbnailPath)) {
        unlink($thumbnailPath);
    }
    
    // Delete the video file
    $videoPath = public_path('uploads/highlights/' . $liveBroadcast->video);
    if (file_exists($videoPath)) {
        unlink($videoPath);
    }

    $liveBroadcast->delete();

    return redirect()->route('admin.lives.index')->with('success', 'Live broadcast deleted successfully.');
}

}    
