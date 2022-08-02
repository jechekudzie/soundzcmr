<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventParticipantsController extends Controller
{
    //

    public function index(Event $event)
    {
        return view('admin.event_participants.index', compact('event'));
    }

    public function store(Event $event)
    {

        $participant = request()->validate([
            'name' => 'required',
            'participant_id' => 'nullable',
        ]);

        $path = '';

        if (request()->hasfile('image')) {

            $file = request()->file('image');

            //get file original name
            $name = $file->getClientOriginalName();

            //create a unique file name using the time variable plus the name
            $file_name = time() . $name;

            //upload the file to a directory in Public folder
            $path = $file->move('participants', $file_name);

            $participant['image'] = $path;
        }
        //dd($path);

        $event->add_event_participants($participant);

        return back()->with('message', 'Contestant added successfully');

    }

    public function add_contestants(Episode $episode)
    {

    }
}
