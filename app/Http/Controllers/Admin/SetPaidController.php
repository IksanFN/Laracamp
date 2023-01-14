<?php

namespace App\Http\Controllers\Admin;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Checkout\Paid;
use Illuminate\Support\Facades\Mail;

class SetPaidController extends Controller
{
    public function setPaid(Request $request, Checkout $checkout)
    {
        $checkout->is_paid = true;
        $checkout->save();

        // Sending email
        Mail::to($checkout->User->email)->send(new Paid($checkout));

        return redirect()->route('admin.dashboard')->with(['success' => "Checkout with ID {$checkout->id} has been updated!"]);
    }
}
