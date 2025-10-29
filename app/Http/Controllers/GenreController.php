<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Auth;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function active($id)
    {
        $genre = Genre::find($id);

        $genre->active = 1;
        $genre->save();
        return redirect()->route('admin.genres');
    }

    public function deactivate($id)
    {
        $genre = Genre::find($id);

        $genre->active = 0;
        $genre->save();
        return redirect()->route('admin.genres');
    }
}
