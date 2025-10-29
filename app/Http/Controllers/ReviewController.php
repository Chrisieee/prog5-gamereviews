<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use App\Models\Genre;
use App\Models\Comment;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    //laat de index pagina en stuurt alle reviews mee
    public function index(Request $request)
    {
        $query = Review::with(['user', 'game'])->where('active', '=', '1');

        if ($request->filled('genre')) {
            $genres = $request->input('genre');
            $query->whereHas('game.genres', function ($q) use ($genres) {
                $q->whereIn('genres.name', $genres);
            });
        }

        if ($request->filled('name')) {
            $query->whereHas('game', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('name') . '%');
            })->orWhere('text', 'like', '%' . $request->input('name') . '%')->get();
        }

        $reviews = $query->get();
        $genres = Genre::all();
        return view('reviews.index', ['reviews' => $reviews, 'genres' => $genres]);
    }

    //laat een leeg formulier zien
    public function create()
    {
        if (Auth::user()->cannot('review-make')) {
            return redirect()->route('home');
        }

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

        if (Auth::user()->cannot('activate', $review)) {
            return redirect()->route('home');
        }

        $review->active = 1;
        $review->save();
        return redirect()->route('admin.reviews');
    }

    public function deactivate($id)
    {
        $review = Review::find($id);

        if (Auth::user()->cannot('activate', $review)) {
            return redirect()->route('home');
        }

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

        if (Auth::user()->cannot('edit-review', $review)) {
            return redirect()->route('reviews.index');
        }

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
        $review->user_id = $request->input('user_id');

        $review->save();

        return redirect()->route('reviews.index');
    }

    public function delete(string $id)
    {
        $review = Review::find($id);

        if (Auth::user()->cannot('delete-review', $review)) {
            return redirect()->route('reviews.index');
        }

        return view('reviews.delete', compact('review'));
    }

    //verwijderen uit database
    public function destroy(string $id)
    {
        $review = Review::find($id);

        if (Auth::user()->cannot('delete-review', $review)) {
            return redirect()->route('reviews.index');
        }

        $review->delete();

        return redirect()->route('reviews.index');
    }
}
