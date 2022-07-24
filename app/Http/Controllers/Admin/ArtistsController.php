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

            $image_file = request()->file('image');

            //get file original name
            $image_name = $image_file->getClientOriginalName();

            //create a unique file name using the time variable plus the name
            $image_name = time() . $image_name;

            //upload the file to a directory in Public folder
            $image = $image_file->move('artists', $image_name);

            $artist['image'] = $image;

        }

        Artist::create($artist);
        return back()->with('message', 'Artist added successfully');

    }
}
