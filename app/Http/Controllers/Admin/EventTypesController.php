<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypesController extends Controller
{
    public function index()
    {
        //
        $event_types = EventType::all();
        return view('admin.event_types.index', compact('event_types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('admin.event_types.create');
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

        $event_type = request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]);

        //now save data in the table
        EventType::create($event_type);

        return back()->with('message','EventType added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(EventType $event_type)
    {
        //
        return view('admin.event_types.show', compact('event_type'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EventType $event_type)
    {
        //
        return view('admin.event_types.edit', compact('event_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventType $event_type)
    {
        //
        $event_type->update(request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]));

        return back()->with('message', 'event_type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventType $event_type)
    {
        //
        $name = $event_type->name;
        $event_type->delete();

        return redirect('/admin/event_types')->with('message', $name.' deleted successfully');
    }
}
