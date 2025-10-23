<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\User;
use App\Models\Game;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function reviews()
    {
        $reviews = Review::all();
        return view('admin.reviews', compact('reviews'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function games()
    {
        $games = Game::all();
        return view('admin.games', compact('games'));
    }
}
