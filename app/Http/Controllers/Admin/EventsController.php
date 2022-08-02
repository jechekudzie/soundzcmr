<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventType;
use App\Models\TicketType;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //
    public function index()
    {
        //
        $events = Event::paginate(2);;
        $event_types = EventType::all();
        $ticket_types = TicketType::all();

        return view('admin.events.index', compact('events', 'event_types', 'ticket_types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('admin.events.create');
        return view('admin.elements');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $event = request()->validate([
            'title' => ['required'],
            'event_type_id' => ['required'],
            'ticket_type_id' => ['required'],
            'date' => ['required'],
            'location' => ['required'],
            'description' => ['nullable'],
            'artist' => ['nullable'],
        ]);

        if (request()->hasfile('image')) {

            $image_file = request()->file('image');


            //get file original name
            $image_name = $image_file->getClientOriginalName();


            //create a unique file name using the time variable plus the name
            $image_name = time() . $image_name;


            //upload the file to a directory in Public folder
            $image = $image_file->move('images/events/covers', $image_name);

            $event['image'] = $image;

        }

        //now save data in the table
       $event =  Event::create($event);

        return redirect('/admin/'.$event->id.'/episodes')->with('message', 'Event added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
        //
        return view('admin.events.show', compact('event'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Event $event)
    {
        //
        $event->update(request()->validate([
            'title' => ['required'],
            'event_type_id' => ['nullable'],
            'ticket_type_id' => ['nullable'],
            'date' => ['nullable'],
            'location' => ['nullable'],
            'description' => ['nullable'],
            'artist' => ['nullable'],
        ]));

        return back()->with('message', 'service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $name = $event->name;
        $event->delete();

        return redirect('/admin/events')->with('message', $name . ' deleted successfully');
    }

    public function home()
    {
        $events = Event::all();

        return view('welcome', compact('events'));
    }

}
