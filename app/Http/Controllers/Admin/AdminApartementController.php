<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartement;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPhoto;

class AdminApartementController extends Controller
{
    public function index()
    {
        $apartements = Apartement::get();
        return view('admin.apartement_view', compact('apartements'));
    }

    public function add()
    {
        return view('admin.apartement_add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'featured_photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
        ]);

        $ext = $request->file('featured_photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('featured_photo')->move(public_path('uploads/'),$final_name);

        $obj = new Apartement();
        $obj->featured_photo = $final_name;
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Apartement is added successfully.');

    }

    public function edit($id)
    {
        $apartement_data = Apartement::where('id',$id)->first();

        return view('admin.apartement_edit', compact('apartement_data'));
    }

    public function update(Request $request,$id)
    {
        $obj = Apartement::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
        ]);

        if($request->hasFile('featured_photo')) {
            $request->validate([
                'featured_photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            unlink(public_path('uploads/'.$obj->featured_photo));
            $ext = $request->file('featured_photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('featured_photo')->move(public_path('uploads/'),$final_name);
            $obj->featured_photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success', 'Apartement is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Room::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->featured_photo));
        $single_data->delete();

        $room_photo_data = RoomPhoto::where('room_id',$id)->get();
        foreach($room_photo_data as $item) {
            unlink(public_path('uploads/'.$item->photo));
            $item->delete();
        }

        return redirect()->back()->with('success', 'Room is deleted successfully.');
    }

    public function gallery($id)
    {
        $room_data = Room::where('id',$id)->first();
        $room_photos = RoomPhoto::where('room_id',$id)->get();
        return view('admin.room_gallery', compact('room_data','room_photos'));
    }

    public function gallery_store(Request $request,$id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj = new RoomPhoto();
        $obj->photo = $final_name;
        $obj->room_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'Photo is added successfully.');
    }

    public function gallery_delete($id)
    {
        $single_data = RoomPhoto::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();

        return redirect()->back()->with('success', 'Photo is deleted successfully.');
    }
}
