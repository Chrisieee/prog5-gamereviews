<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Game;

class GameController extends Controller
{
    public function create()
    {
        $genres = Genre::all();
        return view('games.create', compact('genres'));
    }

    //de info naar database te zetten
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'release_date' => 'required|date',
            'genre_id' => 'required|array',
            'genre_id.*' => 'exists:genres,id',
            'description' => 'required',
        ]);

        $game = new Game();
        $game->name = $request->input('name');
        $game->release_date = $request->input('release_date');
//        dd($request['genre_id']);
        $game->description = $request->input('description');

        $game->save();
        $game->genres()->sync($request->genre_id);

        return redirect()->route('reviews.create');
    }

    //laat de detailpagina zien en stuurt de specified review mee
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
