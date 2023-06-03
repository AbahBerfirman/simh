<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Alamat;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {

        $users = Admin::with('adminRole')->get();
        return view('admin.user_view', compact('users'));
    }

    public function add()
    {
        $all_roles = UserRole::get();
        $all_alamats = Alamat::with(['alamatKota', 'alamatApartement'])->get();

        return view('admin.user_add', compact('all_roles', 'all_alamats'));
    }

    public function store(Request $request)
    {
        $roles = '';
        $i=0;
        if(isset($request->arr_roles)) {
            foreach($request->arr_roles as $item) {
                if($i==0) {
                    $roles .= $item;
                } else {
                    $roles .= ','.$item;
                }
                $i++;
            }
        }

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
            'nik' => 'required|unique:admins',
            'name' => 'required',
            'email' => 'required|email:dns|unique:admins',
            'password' => 'required',
        ]);

        $obj = new Admin();
        $obj->user_role_id = $roles;
        $obj->alamat_id = $alamats;
        $obj->nik = $request->nik;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->save();

        return redirect()->back()->with('success', 'User is added successfully.');

    }


    public function edit($id)
    {
        $all_roles = UserRole::get();
        $all_alamats = Alamat::with(['alamatKota', 'alamatApartement'])->get();
        $user_data = Admin::where('id',$id)->first();

        // $existing_roles = array();
        // if($user_data->user_role_id != '') {
        //     $existing_roles = explode(',',$user_data->user_role_id);
        // }

        // $existing_alamats = array();
        // if($user_data->alamat_id != '') {
        //     $existing_alamats = explode(',',$user_data->alamat_id);
        // }

        return view('admin.user_edit', compact('user_data', 'all_roles', 'all_alamats'));
    }

    public function update(Request $request,$id)
    {
        $obj = Admin::where('id',$id)->first();


        $roles = '';
        $i=0;
        if(isset($request->arr_roles)) {
            foreach($request->arr_roles as $item) {
                if($i==0) {
                    $roles .= $item;
                } else {
                    $roles .= ','.$item;
                }
                $i++;
            }
        }

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
            'nik' => 'required|unique:admins',
            'name' => 'required',
            'email' => 'required|email:dns|unique:admins',
            'password' => 'required',
        ]);

        $obj->user_role_id = $roles;
        $obj->alamat_id = $alamats;
        $obj->nik = $request->nik;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->update();

        return redirect()->back()->with('success', 'User is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Admin::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'User is deleted successfully.');
    }
}
