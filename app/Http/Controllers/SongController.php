<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Band;
use App\Models\Album;

class SongController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', ['songs' => $songs]);

    }

    /**
     * Show the form for creating a new resource.
     */

     public function create(Request $request)
     {
         $albums = Album::all();
         $songsFromAPI = []; // Maakt een lege array aan om nummers van de API op te slaan

         if ($request->query->has('title')) { // Controleert of er een 'title' parameter is meegegeven in de URL
             $api_key = 'cd248ca454b52256c8c33bb93a3d4912'; // Zet de API-sleutel voor toegang tot de Last.fm API

             $title = $request->query('title'); // Haalt de waarde van de 'title' parameter op uit de URL-query

             // Stelt een GET-verzoek op naar de Last.fm API om te zoeken op de ingevoerde titel, met de titel en API-sleutel als parameters
             $response = Http::get(
                 'http://ws.audioscrobbler.com/2.0/?method=track.search&track=' // Het API-adres voor het zoeken naar een nummer
                 . $title . '&api_key=' . $api_key . '&format=json' // Voegt de titel, API-sleutel en JSON-formaat toe aan de URL
             )->json(); // Verstuurt het verzoek en decodeert de JSON-antwoorden als een PHP array

             $songsFromAPI = $response["results"]["trackmatches"]["track"]; // Haalt de lijst met gevonden nummers op uit de API-respons
         }

         // Geeft de albums en songsFromAPI door naar de view
         return view('songs.create', compact('albums', 'songsFromAPI'));
     }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Custom error messages
    $messages = [
        'title.required' => "Title is required",
        'title.max' => "Title too long",
        'singer.required' => "Singer is required",
        'singer.max' => "Singer's name is too long",
        'album_id.required' => "Album is required",
        'album_id.exists' => "Selected album does not exist",
    ];

    // Validate the request data with custom messages
    $validatedData = $request->validate([
        'title' => 'required|string|max:20',
        'singer' => 'required|string|max:20',
        'album_id' => 'required|exists:albums,id' // Validate the album ID
    ], $messages);

    // Create a new Song object
    $song = new Song();
    $song->title = $request->input('title');
    $song->singer = $request->input('singer');
    $song->save();

    // Attach the song to the specified album in the pivot table
    $song->albums()->attach($request->input('album_id')); // Creates a new entry in album_song

    // Redirect back to the homepage or any other relevant page
    return redirect('/songs')->with('success', 'Song created successfully.');
}






    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $song = Song::findOrFail($id);
        $album = album::findOrFail(id: $id);
        return view('songs.show',['song' => $song, 'album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        $album = album::all();
        return view('/songs.edit', ['song' => $song, 'album' => $album]);
    }

    public function update(Request $request, $id)
{
    // Custom error messages
    $messages = [
        'title.required' => "Title is required",
        'title.max' => "Title is too long",
        'singer.required' => "Singer is required",
        'singer.max' => "Singer's name is too long",
        'album_id.required' => "Album is required",
        'album_id.exists' => "Selected album does not exist",
    ];

    // Validate the request data with custom messages
    $validatedData = $request->validate([
        'title' => 'required|string|max:20',
        'singer' => 'required|string|max:20',
        'album_id' => 'required|exists:albums,id' // Validate the album ID
    ], $messages);

    // Find the song and update its details
    $song = Song::findOrFail($id);
    $song->title = $request->input('title');
    $song->singer = $request->input('singer');
    $song->save();

    // Sync the song with the specified album in the pivot table
    $song->albums()->sync([$request->input('album_id')]); // Updates the album association

    // Redirect back to the edit page or any other relevant page
    return redirect('/songs')->with('success', 'Song updated successfully.');
}


    public function delete(string $id)
    {
        // Attempt to find the song by its ID
        $song = Song::find($id);

        // Check if the song exists
        if (!$song) {
            return redirect('/songs')->with('error', 'Song not found.');
        }

        // Attempt to delete the song
        $song->delete();

        // Redirect with a success message
        return redirect('/songs')->with('success', 'Song deleted successfully.');
    }
}
// Een @csrf is nodig om Cross-Site Request Forgery-aanvallen te voorkomen door het genereren van een CSRF-token voor elk formulier.

 //Een @method is nodig om specifieke HTTP-verzoekmethoden, zoals DELETE of PUT, te gebruiken in plaats van de standaard POST-methode in HTML-formulieren.

// Als je een @csrf vergeet, krijg je een "TokenMismatchException", omdat Laravel verwacht dat er een CSRF-token wordt verzonden met het formulier om de authenticiteit te controleren.

// Als je een @method vergeet, krijg je een "MethodNotAllowedHttpException", omdat Laravel standaard alleen POST-verzoeken accepteert voor formulieren, tenzij expliciet aangegeven met de @method-directive.
