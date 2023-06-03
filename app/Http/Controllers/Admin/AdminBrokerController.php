<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Broker;

class AdminBrokerController extends Controller
{
    public function index()
    {
        $brokers = Broker::get();
        return view('admin.broker_view', compact('brokers'));
    }

    public function add()
    {
        return view('admin.broker_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'komisi' => 'required',
            'status' => 'required',
        ]);

        $obj = new Broker();
        $obj->name = $request->name;
        $obj->komisi = $request->komisi;
        $obj->status = $request->status;
        $obj->save();

        return redirect()->back()->with('success', 'Broker is added successfully.');

    }

    public function edit($id)
    {
        $broker_data = Broker::where('id',$id)->first();

        return view('admin.broker_edit', compact('broker_data'));
    }

    public function update(Request $request,$id)
    {
        $obj = Broker::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
            'komisi' => 'required',
            'status' => 'required',
        ]);

        $obj->name = $request->name;
        $obj->komisi = $request->komisi;
        $obj->status = $request->status;
        $obj->update();

        return redirect()->back()->with('success', 'Broker is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Broker::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Broker is deleted successfully.');
    }
}
