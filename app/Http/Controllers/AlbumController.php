<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function createAlbum(Request $request) {
        Album::create([
            'name' => $request->name,
            'description' => null,
            'order_number' => Album::count() + 1, // Assuming a specific order number
            'visible' => true // or false, depending on the visibility
        ]);

        return redirect('/fritkot');
    }

    public function showAlbums() {
        $albums = Album::orderBy('order_number')->get();

        return view('fritkot', ['albums' => $albums]);
    }

    public function saveAlbumOrder(Request $request) {
        if (Album::count() < 1) {
            return redirect('/fritkot');
        }

        $albumOrder = $request->input('album_order');

        // Loop through the received album order array
        foreach ($albumOrder as $order => $albumId) {
            $album = Album::find($albumId);
    
            // Update the order number of the album incrementally
            $album->order_number = $order + 1; // Incremental order number
            $album->save();
        }

        return redirect('/fritkot');
    }

    public function deleteAlbum(Album $album) {

        $photos = Photo::where('album_id', $album->id)->get();

        foreach ($photos as $photo) {
            $photo->delete();

            Storage::disk('public')->delete($photo->path);
        }

        $album->delete();
        return redirect('/fritkot');
    }

    public function hideAlbum(Album $album) {
        if ($album->visible) {
            $album->visible = false;
        } else{
            $album->visible = true; 
        }

        $album->save();

        return redirect('/fritkot');
    }

    public function editAlbum(Album $album, Request $request) {
        $album->name = $request->name;
        $album->description = $request->description;
        $album->save();

        return redirect('/fritkot/' . $album->id);
    }
}
