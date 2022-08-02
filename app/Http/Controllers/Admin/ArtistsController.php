<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    //

    public function index()
    {

        $artists = Artist::all();
        return view('admin.artists.index', compact('artists'));

    }

    public function store()
    {
        $artist = request()->validate([
            'name' => 'required',
            'contact' => 'nullable',
            'record' => 'nullable',
            'bio' => 'nullable',
        ]);

        if (request()->hasfile('image')) {

            $file = request()->file('image');

            //get file original name
            $name = $file->getClientOriginalName();

            //create a unique file name using the time variable plus the name
            $file_name = time() . $name;

            //upload the file to a directory in Public folder
            $path = $file->move('artists_images', $file_name);

            $artist['image'] = $path;
        }

        Artist::create($artist);
        return back()->with('message', 'Artist added successfully');

    }
}
