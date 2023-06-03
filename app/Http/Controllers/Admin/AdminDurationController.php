<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Duration;
use Illuminate\Http\Request;

class AdminDurationController extends Controller
{
    public function index()
    {
        $durations = Duration::get();
        return view('admin.duration_view', compact('durations'));
    }

    public function add()
    {
        return view('admin.duration_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'duration' => 'required',
        ]);

        $obj = new Duration();
        $obj->duration = $request->duration;
        $obj->save();

        return redirect()->back()->with('success', 'Duration is added successfully.');

    }

    public function edit($id)
    {
        $duration_data = Duration::where('id',$id)->first();

        return view('admin.duration_edit', compact('duration_data'));
    }

    public function update(Request $request,$id)
    {
        $obj = Duration::where('id',$id)->first();

        $request->validate([
            'duration' => 'required',
        ]);

        $obj->duration = $request->duration;
        $obj->update();

        return redirect()->back()->with('success', 'Duration is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Duration::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Duration is deleted successfully.');
    }
}
