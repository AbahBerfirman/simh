<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Apartement;
use App\Models\Kota;
use Illuminate\Http\Request;

class AdminAlamatController extends Controller
{
    public function index()
    {
        $alamats = Alamat::with(['alamatKota', 'alamatApartement'])->get();

        return view('admin.alamat_view', compact('alamats'));
    }

    public function add()
    {
        $all_kotas = Kota::get();
        $all_apartements = Apartement::get();

        return view('admin.alamat_add',compact('all_kotas', 'all_apartements'));
    }

    public function store(Request $request)
    {
        $kotas = '';
        $i=0;
        if(isset($request->arr_kotas)) {
            foreach($request->arr_kotas as $item) {
                if($i==0) {
                    $kotas .= $item;
                } else {
                    $kotas .= ','.$item;
                }
                $i++;
            }
        }

        $apartements = '';
        $i=0;
        if(isset($request->arr_apartements)) {
            foreach($request->arr_apartements as $item) {
                if($i==0) {
                    $apartements .= $item;
                } else {
                    $apartements .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'alamat' => 'required',
        ]);

        $obj = new Alamat();
        $obj->kota_id = $kotas;
        $obj->apartement_id = $apartements;
        $obj->alamat = $request->alamat;
        $obj->save();

        return redirect()->back()->with('success', 'Alamat is added successfully.');

    }

    public function edit($id)
    {
        $all_kotas = Kota::get();
        $all_apartements = Apartement::get();

        $alamat_data = Alamat::where('id',$id)->first();

        $existing_kotas = array();
        if($alamat_data->kota_id != '') {
            $existing_kotas = explode(',',$alamat_data->kota_id);
        }

        $existing_apartements = array();
        if($alamat_data->apartement_id != '') {
            $existing_apartements = explode(',',$alamat_data->apartement_id);
        }

        return view('admin.alamat_edit', compact('alamat_data','all_kotas','all_apartements','existing_kotas','existing_apartements'));
    }

    public function update(Request $request,$id)
    {
        $obj = Alamat::where('id',$id)->first();

        $kotas = '';
        $i=0;
        if(isset($request->arr_kotas)) {
            foreach($request->arr_kotas as $item) {
                if($i==0) {
                    $kotas .= $item;
                } else {
                    $kotas .= ','.$item;
                }
                $i++;
            }
        }

        $apartements = '';
        $i=0;
        if(isset($request->arr_apartements)) {
            foreach($request->arr_apartements as $item) {
                if($i==0) {
                    $apartements .= $item;
                } else {
                    $apartements .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'alamat' => 'required',
        ]);

        $obj->kota_id = $kotas;
        $obj->apartement_id = $apartements;
        $obj->alamat = $request->alamat;
        $obj->update();

        return redirect()->back()->with('success', 'Alamat is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Alamat::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Alamat is deleted successfully.');
    }
}
