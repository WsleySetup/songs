<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Album;
use App\Models\Song;
class BandsController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bands = band::all();

        return view('bands.index', ['bands' => $bands]);

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        return view('Bands.create');

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
        'genre.required' => "genre is required",
        'genre.max' => "genre is too long",
        'founded.required' => "founding year is required",
        'founded.max' => "founding year is too long",
        'active_till.required' => "active until is required",
        'active_till.max' => "active until is too long",
    ];

    // Validate the request data with custom messages
    $validatedData = $request->validate([
        'name' => 'required|string|max:20',
        'genre' => 'required|string|max:20',
        'founded' => 'required|integer|max:2050',
        'active_till' => 'required|integer|max:2050'
    ], $messages);

    // Create a new Song object
    $band = new Band();
    $band->name = $request->input('name');
    $band->genre = $request->input('genre');
    $band->founded = $request->input('founded');
    $band->active_till = $request->input('active_till');
    $band->save();

    // Redirect back to the homepage or any other relevant page
    return redirect('/bands')->with('success', 'band created successfully.');
}





    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bands = band::findOrFail($id);
        $album = album::all();
        return view('bands.show',['bands' => $bands, 'album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bands = band::findOrFail($id);
        $album = album::all();
        return view('bands.edit', ['band' => $bands, 'album' => $album]);
    }

    public function update(Request $request, $id)
{
    // Custom error messages
    $messages = [
        'name.required' => "Name is required",
        'name.max' => "Name is too long",
        'genre.required' => "Genre is required",
        'genre.max' => "Genre is too long",
        'founded.required' => "Founding year is required",
        'founded.integer' => "Founding year must be a number",
        'founded.max' => "Founding year cannot exceed 2050",
        'active_till.required' => "Active until is required",
        'active_till.integer' => "Active until must be a number",
        'active_till.max' => "Active until cannot exceed 2050",
    ];

    // Validate the request data with custom messages
    $validatedData = $request->validate([
        'name' => 'required|string|max:20',
        'genre' => 'required|string|max:20',
        'founded' => 'required|integer|max:2050',
        'active_till' => 'required|integer|max:2050'
    ], $messages);

    // Find the band and update its details
    $band = Band::findOrFail($id);
    $band->name = $request->input('name');
    $band->genre = $request->input('genre');
    $band->founded = $request->input('founded');
    $band->active_till = $request->input('active_till');
    $band->save();

    // Redirect to the bands index with a success message
    return redirect()->route('bands.index')->with('success', 'Band updated successfully.');
}


    public function delete(string $id)
    {
        // Attempt to find the song by its ID
        $band = band::find($id);

        // Check if the song exists
        if (!$band) {
            return redirect('/bands')->with('error', 'band not found.');
        }

        // Attempt to delete the song
        $band->delete();

        // Redirect with a success message
        return redirect('/bands')->with('success', 'band deleted successfully.');
    }
}
// Een @csrf is nodig om Cross-Site Request Forgery-aanvallen te voorkomen door het genereren van een CSRF-token voor elk formulier.

 //Een @method is nodig om specifieke HTTP-verzoekmethoden, zoals DELETE of PUT, te gebruiken in plaats van de standaard POST-methode in HTML-formulieren.

// Als je een @csrf vergeet, krijg je een "TokenMismatchException", omdat Laravel verwacht dat er een CSRF-token wordt verzonden met het formulier om de authenticiteit te controleren.

// Als je een @method vergeet, krijg je een "MethodNotAllowedHttpException", omdat Laravel standaard alleen POST-verzoeken accepteert voor formulieren, tenzij expliciet aangegeven met de @method-directive.
