<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('admin.services.index', compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('admin.services.create');
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
        $service = request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]);

        if (request()->hasfile('cover_image') || request()->hasfile('banner_image')) {

            $cover_image_file = request()->file('cover_image');
            $banner_image_file = request()->file('banner_image');

            //get file original name
            $cover_image_name = $cover_image_file->getClientOriginalName();
            $banner_image_name = $banner_image_file->getClientOriginalName();

            //create a unique file name using the time variable plus the name
            $cover_image_name = time() . $cover_image_name;
            $banner_image_name = time() . $banner_image_name;


            //upload the file to a directory in Public folder
            $cover_image = $cover_image_file->move('images/services/covers', $cover_image_name);
            $banner_image = $banner_image_file->move('images/services/banners', $banner_image_name);

            $service['cover_image'] = $cover_image;
            $service['banner_image'] = $banner_image;
        }

        //now save data in the table
        Service::create($service);

        return back()->with('message','Service added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        return view('admin.services.show', compact('service'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service)
    {
        //
        $service->update(request()->validate([
            'name' => ['required', 'min:5'],
            'description' => ['nullable'],
        ]));

        return back()->with('message', 'service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $name = $service->name;
        $service->delete();

        return redirect('/admin/services')->with('message', $name.' deleted successfully');
    }
}
