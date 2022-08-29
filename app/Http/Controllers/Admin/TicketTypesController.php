<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypesController extends Controller
{

    public function index()
    {
        //
        $ticket_types = TicketType::all();
        return view('admin.ticket_types.index', compact('ticket_types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('admin.ticket_types.create');
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

        $ticket = request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]);

        //now save data in the table
        TicketType::create($ticket);

        return back()->with('message','Ticket added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(TicketType $ticket_type)
    {
        //
        return view('admin.ticket_types.show', compact('ticket_type'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketType $ticket_type)
    {
        //
        return view('admin.ticket_types.edit', compact('ticket_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketType $ticket_type)
    {
        //
        $ticket_type->update(request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]));

        return back()->with('message', 'ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketType $ticket_type)
    {
        //
        $name = $ticket_type->name;
        $ticket_type->delete();

        return redirect('/admin/ticket_types')->with('message', $name.' deleted successfully');
    }

}
