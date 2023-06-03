<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Kamar;
use App\Models\Pelanggan;
use App\Models\Room;
use App\Models\Subscriber;
use App\Models\Transaction;

class AdminHomeController extends Controller
{
    public function index()
    {
        $total_completed_orders = Transaction::where('status','Completed')->count();
        $total_pending_orders = Transaction::where('status','Pending')->count();
        $total_active_customers = Pelanggan::where('status',1)->count();
        $total_pending_customers = Pelanggan::where('status',0)->count();
        $total_rooms = Kamar::count();
        $total_broker = Broker::count();

        $orders = Transaction::orderBy('id','desc')->skip(0)->take(5)->get();

        return view('admin.home', compact('total_completed_orders','total_pending_orders','total_active_customers','total_pending_customers','total_rooms','total_broker','orders'));
    }
}
