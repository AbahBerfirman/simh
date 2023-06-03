<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Pelanggan;

class AdminCustomersController extends Controller
{
    public function index()
    {
        $customers = Pelanggan::get();
        return view('admin.pelanggan_view', compact('customers'));
    }

    public function add()
    {
        return view('admin.pelanggan_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'jenis_identitas' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $obj = new Pelanggan();
        $obj->id = $request->id;
        $obj->name = $request->name;
        $obj->jenis_identitas = $request->jenis_identitas;
        $obj->phone = $request->phone;
        $obj->email = $request->email;
        $obj->save();

        return redirect()->back()->with('success', 'Customer is added successfully.');

    }

    public function edit($id)
    {
        $customer_data = Pelanggan::where('id',$id)->first();

        return view('admin.pelanggan_edit', compact('customer_data'));
    }

    public function update(Request $request,$id)
    {
        $obj = Pelanggan::where('id',$id)->first();

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'jenis_identitas' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $obj->id = $request->id;
        $obj->name = $request->name;
        $obj->jenis_identitas = $request->jenis_identitas;
        $obj->phone = $request->phone;
        $obj->email = $request->email;
        $obj->update();

        return redirect()->back()->with('success', 'Customer is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Pelanggan::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Customer is deleted successfully.');
    }
}
