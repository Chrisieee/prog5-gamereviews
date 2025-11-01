<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Auth;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function toggle($id)
    {
        $genre = Genre::find($id);

        if ($genre->active === 1) {
            $genre->active = 0;
        } else if ($genre->active === 0) {
            $genre->active = 1;
        }

        $genre->save();
        return redirect()->route('admin.genres');
    }
}
