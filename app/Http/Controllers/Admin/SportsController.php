<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sports;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class sportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Sport::all();
        return view('admin.sports.index', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sports.create');
    }

    /**
     * Store a newly created resource in storage.
     */public function store(Request $request)
{

   
    $validatedData = $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
        $sports = new Sport;         
        $sports->name = $request->name;         
                
        if($request->hasfile('image'))        
        {             
            $file= $request->file('image');             
            $extension = $file->getClientOriginalExtension();             
            $filename = time().".".$extension;             
            $file->move('uploads/thumbnails/', $filename);             
            $sports->image = $filename;
        }         
    

        $sports->save();

    return redirect()->route('admin.sports.index')->with('success', 'Sports created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sports = Sport::findOrFail($id);
        return view('admin.sports.show', compact('sports'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sport = Sport::findOrFail($id);
        return view('admin.sports.edit', compact('sport'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $sport = Sport::findOrFail($id);
        $sport->name = $request->name;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/thumbnails/', $filename);
            $sport->image = $filename;
        }
    
        $sport->save();
    
        return redirect()->route('admin.sports.index')->with('success', 'Sports updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sports = Sport::findOrFail($id);

        // Delete the associated file
        Storage::delete('public/files/' . $sports->file);

        $sports->delete();

        return redirect()->route('admin.sports.index')->with('success', 'sports deleted successfully.');
    }
}
