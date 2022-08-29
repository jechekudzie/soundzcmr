<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StreamingPlatform;
use Illuminate\Http\Request;

class StreamingPlatformController extends Controller
{
    public function index()
    {
        //
        $streaming_platforms = StreamingPlatform::all();
        return view('admin.streaming_platforms.index', compact('streaming_platforms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.streaming_platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $streaming_platform = request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]);

        //now save data in the table
        StreamingPlatform::create($streaming_platform);

        return back()->with('message','Streaming Platform added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(StreamingPlatform $streaming_platform)
    {
        //
        return view('admin.streaming_platforms.show', compact('streaming_platform'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StreamingPlatform $streaming_platform)
    {
        //
        return view('admin.streaming_platforms.edit', compact('streaming_platform'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StreamingPlatform $streaming_platform)
    {
        //
        $streaming_platform->update(request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]));

        return back()->with('message', 'Streaming platform updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StreamingPlatform $streaming_platform)
    {
        //
        $name = $streaming_platform->name;
        $streaming_platform->delete();

        return redirect('/admin/streaming_platforms')->with('message', $name.' deleted successfully');
    }
}
