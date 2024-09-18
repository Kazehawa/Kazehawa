<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $news = News::all();
        return view('admin.news.create',compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

        $news = new News;         
        $news->title = $request->title;         
        $news->description = $request->description;         
        if($request->hasfile('image'))        
     {             
        $file= $request->file('image');             
        $extension = $file->getClientOriginalExtension();             
        $filename = time().".".$extension;             
        $file->move('uploads/thumbnails/', $filename);             
        $news->image = $filename;
    }         
    
     $news->save();

    return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->description = $request->description;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/thumbnails/', $filename);
            $news->image = $filename;
        }
    
        $news->save();
    
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        // Delete the associated file
        Storage::delete('public/files/' . $news->file);

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }
}
