<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Band;
use App\Models\Song;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('Albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bands = Band::all(); // Get all bands
        return view('albums.create', compact('bands')); // Pass bands to the view
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Custom error messages
    $messages = [
        'name.required' => "Name is required",
        'name.max' => "Name is too long",
        'year.required' => "Year is required",
        'year.max' => "Year is too long",
        'times_sold.required' => "Times sold is required",
        'times_sold.max' => "Times sold is too much",
        'band_id.required' => "Band is required",
        'band_id.exists' => "Selected band does not exist"
    ];

    // Validate the request data with custom messages
    $validatedData = $request->validate([
        'name' => 'required|string|max:20',
        'year' => 'required|integer|max:21555|min:1901',
        'times_sold' => 'required|integer|max:500000',
        'band_id' => 'required|exists:bands,id', // Validate that the band exists
    ], $messages);

    // Create a new Album object
    $album = new Album();
    $album->name = $request->input('name');
    $album->year = $request->input('year');
    $album->times_sold = $request->input('times_sold');
    $album->band_id = $request->input('band_id'); // Assign the band_id
    $album->save();

    // Redirect back to the albums index
    return redirect('/albums')->with('success', 'Album created successfully.');
}



public function show($id)
{
    $album = Album::with('songs', 'band')->findOrFail($id);
    return view('Albums.show', compact('album'));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $bands = Band::all();
        return view('Albums.edit', ['album' => $album, 'bands' => $bands]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Custom error messages
    $messages = [
        'name.required' => "Name is required",
        'name.max' => "Name is too long",
        'year.required' => "Year is required",
        'year.max' => "Year is too long",
        'times_sold.required' => "Times sold is required",
        'times_sold.max' => "Times sold is too much",
        'band_id.required' => "Band is required",
        'band_id.exists' => "Selected band does not exist"
    ];

    // Validate the request data, including band_id
    $validatedData = $request->validate([
        'name' => 'required|string|max:20',
        'year' => 'required|integer|max:2025',
        'times_sold' => 'required|integer|max:500000',
        'band_id' => 'required|exists:bands,id' // Validate that the band exists
    ], $messages);

    // Find the album and update its details
    $album = Album::findOrFail($id);
    $album->name = $request->input('name');
    $album->year = $request->input('year');
    $album->times_sold = $request->input('times_sold');
    $album->band_id = $request->input('band_id'); // Assign the band_id
    $album->save();

    // Redirect back to the albums index
    return redirect('/albums')->with('success', 'Album updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Attempt to find the album by its ID
        $album = Album::findOrFail($id);

        // Attempt to delete the album
        $album->delete();

        // Redirect with a success message
        return redirect('/albums')->with('success', 'Album deleted successfully.');
    }
}
