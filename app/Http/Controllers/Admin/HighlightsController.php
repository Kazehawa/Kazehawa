<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Highlight;
use Illuminate\Http\Request;

class HighlightsController extends Controller
{
    // ...

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
     public function index()
        {
            // Retrieve highlights from the database
            $highlights = Highlight::all();
            
            // Return a view with the highlights data
            return view('admin.highlights.index', compact('highlights'));
        }
        
        // Other methods of the controller...
        public function create()
        {

            
            
            // Return a view with the highlights data
            return view('admin.highlights.create');
            
        }

        public function store(Request $request)
        {
            $highlights = new Highlight;
            $highlights->title = $request->title;
            $highlights->description = $request->description;
        
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/thumbnails/', $filename);
                $highlights->thumbnail = $filename;
            }
        
            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/highlights/', $filename);
                $highlights->video = $filename;
            }
        
            $highlights->save();
        
            return redirect()->route('admin.highlights.index')->with('success', 'Highlight created successfully.');
        }
        
        

    /**
     * Update the specified resource in storage.
     */
    public function edit($id)
{
    $highlight = Highlight::findOrFail($id);
    return view('admin.highlights.edit', compact('highlight'));
}

public function update(Request $request, $id)
{
    $highlight = Highlight::findOrFail($id);
    $highlight->title = $request->title;
    $highlight->description = $request->description;

    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/thumbnails/', $filename);
        $highlight->thumbnail = $filename;
    }

    if ($request->hasFile('video')) {
        $file = $request->file('video');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/highlights/', $filename);
        $highlight->video = $filename;
    }

    $highlight->save();

    return redirect()->route('admin.highlights.index')->with('success', 'Highlight updated successfully.');
}

    // ...


    public function destroy(string $id)
{
    // Find the highlight by ID
    $highlight = Highlight::findOrFail($id);

    // Delete the associated video file
    Storage::delete('public/files/' . $highlight->file);

    // Delete the highlight from the database
    $highlight->delete();

    return redirect()->route('admin.highlights.index')->with('success', 'Highlight deleted successfully.');
}

}
