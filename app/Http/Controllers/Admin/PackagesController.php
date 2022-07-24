<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Package;
use App\Models\PackageItem;
use App\Models\ProfessionRequirement;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    //
    public function index()
    {
        //
        $packages = Package::all();
        $items = Item::all();
        return view('admin.packages.index', compact('packages','items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('admin.packages.create');
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
        $package = request()->validate([
            'name' => ['required', 'min:3'],
            'price' => ['required'],
            'duration' => ['required'],
            'description' => ['nullable'],
        ]);
        $package['duration_days'] =  $package['duration'] * 30;

        //now save data in the table
        $plan = Package::create($package);

        $items = request('items');
        if ($items) {
            foreach ($items as $item) {
                $plan_items['package_id'] = $plan->id;
                $plan_items['item_id'] = $item;
                PackageItem::create($plan_items);
            }
        }
        return back()->with('message','Plan added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
        return view('admin.packages.show', compact('package'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Package $package)
    {
        //
        $update_package = request()->validate([
            'name' => ['required', 'min:3'],
            'price' => ['required'],
            'duration' => ['required'],
            'description' => ['nullable'],
        ]);
        $update_package['duration'] =  $update_package['duration'] * 30;

        $package->update($update_package);

        return back()->with('message', 'package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
        $name = $package->name;
        $package->delete();

        return redirect('/admin/packages')->with('message', $name.' deleted successfully');
    }
}
