<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    //
    public function index()
    {
        //
        $items = Item::all();
        return view('admin.items.index', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('admin.items.create');
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
        $item = request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]);

        //now save data in the table
        Item::create($item);

        return back()->with('message','Item added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        return view('admin.items.show', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Item $item)
    {
        //
        $item->update(request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]));

        return back()->with('message', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $name = $item->name;
        $item->delete();

        return redirect('/admin/items')->with('message', $name.' deleted successfully');
    }
}
