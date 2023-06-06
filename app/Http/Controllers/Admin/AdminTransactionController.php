<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Broker;
use App\Models\Duration;
use App\Models\Kamar;
use App\Models\KamarDuration;
use App\Models\Pelanggan;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class AdminTransactionController extends Controller
{
    public function detail($id)
    {
        $alamat = Auth::guard('admin')->user()->alamat_id;
        $all_kamars = Kamar::
        with([
            'kamarAlamat',
            'kamarAlamat.alamatKota',
            'kamarAlamat.alamatApartement',
            'durations'
        ])
        ->where('id',$id)->first()
        ->get();

        return view('admin.transaction_view', compact('all_kamars', 'alamat'));
    }

    public function index()
    {

        $customers = Pelanggan::get();
        return view('admin.transaction_detail', compact('customers'));
    }

    public function add($id)
    {
        // $alamat = Auth::guard('admin')->user()->alamat_id;
        $all_durations = Duration::get();
        $all_customers = Pelanggan::get();
        $all_brokers = Broker::get();
        $all_kamars = Kamar::
        with([
            'kamarAlamat',
            'kamarAlamat.alamatKota',
            'kamarAlamat.alamatApartement',
            'durations'
        ])->where('id',$id)->first();

        return view('admin.transaction_add',compact('all_kamars', 'all_durations', 'all_customers', 'all_brokers'));
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

        $customers = '';
        $i=0;
        if(isset($request->arr_customers)) {
            foreach($request->arr_customers as $item) {
                if($i==0) {
                    $customers .= $item;
                } else {
                    $customers .= ','.$item;
                }
                $i++;
            }
        }

        $brokers = '';
        $i=0;
        if(isset($request->arr_brokers)) {
            foreach($request->arr_brokers as $item) {
                if($i==0) {
                    $brokers .= $item;
                } else {
                    $brokers .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'transaction_date' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'paid_amount' => 'required',
        ]);

        $obj = new Transaction();
        $obj->kamar_id = $kamars;
        $obj->duration_id = $durations;
        $obj->pelanggan_id = $customers;
        $obj->broker_id = $brokers;
        $obj->transaction_date = $request->transaction_date;
        $obj->checkin_date = $request->checkin_date;
        $obj->checkout_date = $request->checkout_date;
        $obj->paid_amount = $request->paid_amount;
        $obj->save();

        return redirect()->back()->with('success', 'Transaction is added successfully.');

    }

    public function edit($id)
    {
        $all_kamars = Kamar::with(['kamarAlamat', 'kamarAlamat.alamatKota', 'kamarAlamat.alamatApartement', 'durations'])->get();
        $all_durations = Duration::get();
        $all_customers = Pelanggan::get();
        $all_brokers = Broker::get();
        $transaction_data = Transaction::where('id',$id)->first();

        $existing_kamars = array();
        if($transaction_data->kamar_id != '') {
            $existing_kamars = explode(',',$transaction_data->kamar_id);
        }

        $existing_durations = array();
        if($transaction_data->duration_id != '') {
            $existing_durations = explode(',',$transaction_data->duration_id);
        }

        $existing_customers = array();
        if($transaction_data->customer_id != '') {
            $existing_customers = explode(',',$transaction_data->customer_id);
        }

        $existing_brokers = array();
        if($transaction_data->broker_id != '') {
            $existing_brokers = explode(',',$transaction_data->broker_id);
        }

        return view('admin.transaction_edit', compact('transaction_data', 'all_kamars', 'all_durations', 'all_customers', 'all_brokers','existing_kamars','existing_durations','existing_customers','existing_brokers'));
    }

    public function update(Request $request,$id)
    {
        $obj = Transaction::where('id',$id)->first();

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

        $customers = '';
        $i=0;
        if(isset($request->arr_customers)) {
            foreach($request->arr_customers as $item) {
                if($i==0) {
                    $customers .= $item;
                } else {
                    $customers .= ','.$item;
                }
                $i++;
            }
        }

        $brokers = '';
        $i=0;
        if(isset($request->arr_brokers)) {
            foreach($request->arr_brokers as $item) {
                if($i==0) {
                    $brokers .= $item;
                } else {
                    $brokers .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'transaction_date' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'paid_amount' => 'required',
        ]);

        $obj->kamar_id = $kamars;
        $obj->duration_id = $durations;
        $obj->customer_id = $customers;
        $obj->broker_id = $brokers;
        $obj->transaction_date = $request->transaction_date;
        $obj->checkin_date = $request->checkin_date;
        $obj->checkout_date = $request->checkout_date;
        $obj->paid_amount = $request->paid_amount;
        $obj->update();

        return redirect()->back()->with('success', 'Transaction is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Transaction::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Transaction is deleted successfully.');
    }
}
