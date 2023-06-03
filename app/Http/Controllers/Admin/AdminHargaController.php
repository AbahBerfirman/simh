<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Duration;
use App\Models\Kamar;
use App\Models\KamarDuration;
use Illuminate\Http\Request;

class AdminHargaController extends Controller
{
    public function index()
    {
        $hargas = KamarDuration::with(['hargaKamar.kamarAlamat.alamatKota', 'hargaKamar.kamarAlamat.alamatApartement', 'hargaDuration'])->get();

        return view('admin.harga_view', compact('hargas'));
    }

    public function add()
    {
        $all_kamars = Kamar::with(['kamarAlamat', 'kamarAlamat.alamatKota', 'kamarAlamat.alamatApartement', 'durations'])->get();
        $all_durations = Duration::get();

        return view('admin.harga_add',compact('all_kamars', 'all_durations'));
    }

    public function store(Request $request)
    {
        $kamars = '';
        $i=0;
        if(isset($request->arr_kamars)) {
            foreach($request->arr_kamars as $item) {
                if($i==0) {
                    $kamars .= $item;
                } else {
                    $kamars .= ','.$item;
                }
                $i++;
            }
        }

        $durations = '';
        $i=0;
        if(isset($request->arr_durations)) {
            foreach($request->arr_durations as $item) {
                if($i==0) {
                    $durations .= $item;
                } else {
                    $durations .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'harga' => 'required',
        ]);

        $obj = new KamarDuration();
        $obj->kamar_id = $kamars;
        $obj->duration_id = $durations;
        $obj->harga = $request->harga;
        $obj->save();

        return redirect()->back()->with('success', 'Harga is added successfully.');

    }

    public function edit($id)
    {
        $all_kamars = Kamar::with(['kamarAlamat', 'kamarAlamat.alamatKota', 'kamarAlamat.alamatApartement', 'durations'])->get();
        $all_durations = Duration::get();

        $harga_data = KamarDuration::where('id',$id)->first();

        $existing_kamars = array();
        if($harga_data->kamar_id != '') {
            $existing_kamars = explode(',',$harga_data->kamar_id);
        }

        $existing_durations = array();
        if($harga_data->duration_id != '') {
            $existing_durations = explode(',',$harga_data->duration_id);
        }

        return view('admin.harga_edit', compact('harga_data','all_kamars','all_durations','existing_kamars','existing_durations'));
    }

    public function update(Request $request,$id)
    {
        $obj = KamarDuration::where('id',$id)->first();

        $kamars = '';
        $i=0;
        if(isset($request->arr_kamars)) {
            foreach($request->arr_kamars as $item) {
                if($i==0) {
                    $kamars .= $item;
                } else {
                    $kamars .= ','.$item;
                }
                $i++;
            }
        }

        $durations = '';
        $i=0;
        if(isset($request->arr_durations)) {
            foreach($request->arr_durations as $item) {
                if($i==0) {
                    $durations .= $item;
                } else {
                    $durations .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'harga' => 'required',
        ]);

        $obj->kamar_id = $kamars;
        $obj->duration_id = $durations;
        $obj->harga = $request->harga;
        $obj->update();

        return redirect()->back()->with('success', 'Harga is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = KamarDuration::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Harga is deleted successfully.');
    }
}
