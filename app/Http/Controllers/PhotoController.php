<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function showPhotos(Album $album) {
        $photos = Photo::where('album_id', $album->id)->orderBy('row_number')->get();
        return view('album', ['album' => $album, 'photos' => $photos]);
    }

    public function addPhotos(Album $album, Request $request) {
        // $request->validate([
        //     'upload.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size as per your requirement
        // ]);
        $album_id = $album->id;
        $columnCounts = [];
        for ($i = 1; $i <= 3; $i++) { // Assuming you have 3 columns
            $columnCounts[$i] = Photo::where('album_id', $album_id)
                ->where('column_number', $i)
                ->count();
        }

        if ($request->hasFile('upload')) {
            foreach ($request->file('upload') as $image) {
                // Find the lowest column
                $lowestColumn = array_search(min($columnCounts), $columnCounts);

                // Calculate the new row number for the new photo
                $newRowNumber = $columnCounts[$lowestColumn] + 1;
                // Add the new photo to the lowest column
                $photo = new Photo;
                $photo->album_id = $album_id;
                $photo->column_number = $lowestColumn;
                $photo->row_number = $newRowNumber;
                $photo->description = $request->description;
                $photo->size_kb = round($image->getSize() / 1024);
                $photo->path = $image->store('photos', 'public'); // adjust directory as needed
                // Set additional attributes here if needed
                $photo->save();

                // Update the count of photos in the lowest column
                $columnCounts[$lowestColumn]++;
            }
        }
    

        return redirect('/fritkot/' . $album_id);
    }

    public function lowestColumn($album_id) {
        $columnCounts = [
            1 => Photo::where('album_id', $album_id)->where('column_number', 1)->count(),
            2 => Photo::where('album_id', $album_id)->where('column_number', 2)->count(),
            3 => Photo::where('album_id', $album_id)->where('column_number', 3)->count(),
        ];
        $lowestColumn = array_search(min($columnCounts), $columnCounts);
        return $lowestColumn;
    }

    public function rowNumber($album_id, $lowestColumn) {
        return Photo::where('album_id', $album_id)->where('column_number', $lowestColumn)->count();
    }

    public function deletePhoto(Photo $photo) {
        $albumId = Album::where('id', $photo->album_id)->first()->id;
        
        
        $photo->delete();

        Storage::disk('public')->delete($photo->path);

        return redirect('/fritkot/' . $albumId);
    }

    public function savePhotoOrder(Album $album, Request $request) {
        $columnRows = [
            1 => $request->column1_row,
            2 => $request->column2_row,
            3 => $request->column3_row,
        ];
        foreach ($columnRows as $columnValue => $column) {
            if ($column) {
                foreach ($column as $row => $photoId) {
                    $photo = Photo::findOrFail($photoId);
                    $photo->column_number = $columnValue;
                    $photo->row_number = $row + 1;
                    $photo->save();
                }
            }
        }
        return redirect('/fritkot/' . $album->id);
    }

    public function editPhoto(Photo $photo, Request $request) {
        $photo->description = $request->description;
        $photo->save();

        return redirect('/fritkot/' . $photo->album_id);
    }
}
