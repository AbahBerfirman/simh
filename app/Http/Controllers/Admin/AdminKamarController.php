<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\KotaApartement;

class AdminKamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::with(['kamarAlamat', 'kamarAlamat.alamatKota', 'kamarAlamat.alamatApartement', 'durations'])->get();

        return view('admin.kamar_view', compact('kamars'));
    }

    public function add()
    {
        $all_alamats = Alamat::with(['alamatKota', 'alamatApartement'])->get();

        return view('admin.kamar_add', compact('all_alamats'));
    }

    public function store(Request $request)
    {
        $alamats = '';
        $i=0;
        if(isset($request->arr_alamats)) {
            foreach($request->arr_alamats as $item) {
                if($i==0) {
                    $alamats .= $item;
                } else {
                    $alamats .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'no_kamar' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $obj = new Kamar();
        $obj->no_kamar = $request->no_kamar;
        $obj->alamat_id = $alamats;
        $obj->description = $request->description;
        $obj->status = $request->status;
        $obj->save();

        return redirect()->back()->with('success', 'Kamar is added successfully.');

    }

    public function edit($id)
    {
        $all_alamats = Alamat::with(['alamatKota', 'alamatApartement'])->get();
        $kamar_data = Kamar::where('id',$id)->first();

        $existing_alamats = array();
        if($kamar_data->alamat_id != '') {
            $existing_alamats = explode(',',$kamar_data->alamat_id);
        }

        return view('admin.kamar_edit', compact('kamar_data', 'all_alamats','existing_alamats'));
    }

    public function update(Request $request,$id)
    {
        $obj = Kamar::where('id',$id)->first();

        $alamats = '';
        $i=0;
        if(isset($request->arr_alamats)) {
            foreach($request->arr_alamats as $item) {
                if($i==0) {
                    $alamats .= $item;
                } else {
                    $alamats .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'no_kamar' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $obj->no_kamar = $request->no_kamar;
        $obj->alamat_id = $alamats;
        $obj->description = $request->description;
        $obj->status = $request->status;
        $obj->update();

        return redirect()->back()->with('success', 'Kamar is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Kamar::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Kamar is deleted successfully.');
    }

    public function change_status($id)
    {
        $kamar_data = Kamar::where('id',$id)->first();
        if($kamar_data->status == 'AVAILABLE') {
            $kamar_data->status = 'UNAVAILABLE';
        } elseif ($kamar_data->status == 'UNAVAILABLE') {
            $kamar_data->status = 'MAINTENANCE';
        } elseif ($kamar_data->status == 'MAINTENANCE') {
            $kamar_data->status = 'AVAILABLE';
        } else {
            $kamar_data->status == 'AVAILABLE';
        }

        $kamar_data->update();
        return redirect()->back()->with('success', 'Status is changed successfully.');
    }
}
