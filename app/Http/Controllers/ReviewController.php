<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //laat de index pagina en stuurt alle reviews mee
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    //laat een leeg formulier zien
    public function create()
    {
        $games = Game::all();
        return view('reviews.create', compact('games'));
    }

    //de info naar database te zetten
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'rating' => 'required',
            'text' => 'required',
        ]);

        $review = new Review();
        $review->title = $request->input('title');
        $review->rating = $request->input('rating');
        $review->game_id = $request->input('game_id');
        $review->text = $request->input('text');
        $review->user_id = $request->input('user_id');

        $review->save();

        return redirect()->route('reviews.index');
    }

    //laat de detailpagina zien en stuurt de specified review mee
    public function show(string $id)
    {
        $review = Review::find($id);
        return view('reviews.details', compact('review'));
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
