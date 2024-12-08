<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

use App\Models\Stream;
use App\Models\ServicesModel;
use App\Models\Contact;
use App\Models\Review;

class AniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServicesModel::all(); // Correct the model name here
        $streams = Stream::all();
        $contacts = Contact::all();
        $reviews = Review::all();

        // Return the view and pass the services data
        return view('anistream.index', compact('services', 'streams', 'contacts', 'reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);
    
        // Resize the image
        $image = $request->file('picture');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('storage/reviews/' . $imageName);
        
        // Resize to 640x460px
        $img = Image::make($image)->resize(640, 460);
        $img->save($imagePath);
    
        // Store review data in the database
        Review::create([
            'name' => $validated['name'],
            'picture' => 'reviews/' . $imageName, // Save the path to the image
            'description' => $validated['description'],
        ]);
    
        return redirect()->route('reviews.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
