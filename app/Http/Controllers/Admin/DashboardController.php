<?php

namespace App\Http\Controllers\Admin;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $now = Carbon::now();
        // $pembayaran_bulan_ini = Checkout::whereYear('created_at', $now->year)
        //                         ->whereMonth('created_at', $now->month)
        //                         ->count('id');
        $checkouts = Checkout::with('Camp')->get();
        return view('admin.dashboard', [
            // 'pembayaran_bulan_ini' => $pembayaran_bulan_ini,
            'checkouts' => $checkouts,
        ]);
    }
}
