<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\Kota;
use App\Models\Room;
use App\Models\RoomPhoto;

class AdminKotaController extends Controller
{
    public function index()
    {
        $kotas = Kota::get();
        return view('admin.kota_view', compact('kotas'));
    }

    public function add()
    {
        $all_amenities = Amenity::get();
        return view('admin.kota_add',compact('all_amenities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new Kota();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Kota is added successfully.');

    }

    public function edit($id)
    {
        $kota_data = Kota::where('id',$id)->first();

        return view('admin.kota_edit', compact('kota_data'));
    }

    public function update(Request $request,$id)
    {
        $obj = Kota::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
        ]);

        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success', 'Kota is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Kota::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Kota is deleted successfully.');
    }
}
