<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function show($slug = null) {
        $album = Album::where('slug', $slug)->where('visible', true)->first();

        $pages = Album::where('visible', true)->get();
        if (!$album) {
            $album = Album::where('visible', true)->orderBy('order_number')->first();
        }

        if ($album) {
            $photos = Photo::where('album_id', $album->id)->get();
        } else {
            return view ('home');
        }

        return view ('home', ['album' => $album, 'pages' => $pages, 'photos' => $photos]);
    }
}
