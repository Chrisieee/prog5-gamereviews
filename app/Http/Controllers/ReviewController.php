<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReviewController extends Controller
{
    //laat de index pagina en stuurt alle reviews mee
    public function index()
    {
        $reviews = Review::all()->where('active', '=', '1');
        //$reviews = Review::all()->with('user')->with('game');
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
            'game_id' => 'required',
            'text' => 'required',
        ]);

        if ($request->file('image') != null) {
            $reviewImage = $request->file('image')->storePublicly('storage', 'public');
        } else {
            $reviewImage = null;
        }

        $review = new Review();
        $review->title = $request->input('title');
        $review->rating = $request->input('rating');
        $review->game_id = $request->input('game_id');
        $review->text = $request->input('text');
        $review->image = $reviewImage;
        $review->user_id = $request->input('user_id');

        $review->save();

        return redirect()->route('reviews.index');
    }

    public function active($id)
    {
        $review = Review::find($id);
        $review->active = 1;
        $review->save();
        return redirect()->route('admin.reviews');
    }

    public function deactivate($id)
    {
        $review = Review::find($id);
        $review->active = 0;
        $review->save();
        return redirect()->route('admin.reviews');
    }

    //laat de detailpagina zien en stuurt de specified review mee
    public function show(string $id)
    {
        $review = Review::find($id);
        return view('reviews.details', compact('review'));
    }

    //laat de edit pagina zien
    public function edit(string $id)
    {
        $review = Review::find($id);
        $games = Game::all();
        return view('reviews.edit', ['review' => $review, 'games' => $games]);
    }

    //update de data in de database
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'rating' => 'required',
            'game_id' => 'required',
            'text' => 'required',
        ]);

        $review = Review::find($id);
        $review->title = $request->input('title');
        $review->rating = $request->input('rating');
        $review->game_id = $request->input('game_id');
        $review->text = $request->input('text');
        if ($request->file('image') != null) {
            $reviewImage = $request->file('image')->storePublicly('storage', 'public');
            $review->image = $reviewImage;
        }

        $review->save();

        return redirect()->route('reviews.index');
    }

    public function delete(string $id)
    {
        $review = Review::find($id);
        return view('reviews.delete', compact('review'));
    }

    //verwijderen uit database
    public function destroy(string $id)
    {
        $review = Review::find($id);
        $review->delete();

        return redirect()->route('reviews.index');
    }
}
