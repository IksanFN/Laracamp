<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Discount as AdminDiscount;
use App\Http\Requests\Admin\DiscountUpdate;
use App\Models\Discount;
use Illuminate\Http\Request;
use Alert;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::latest()->paginate(10);
        return view('admin.discount', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-discount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminDiscount $request)
    {
        // Condition store to database
        if (Discount::create($request->all())) {
            return redirect()->route('admin.discount.index')->with('Success', 'Created Successfully');
        } else {
            return redirect()->route('admin.discount.index')->with('Error', 'Created Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return view('admin.edit-discount', ['discount' => $discount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountUpdate $request, Discount $discount)
    {
        if ($discount->update($request->all())) {
            Alert::success('Success', 'Discount has been updated');
            return redirect()->route('admin.discount.index');
        } else {
            Alert::error('Error', 'Discount updated failed');
            return redirect()->route('admin.discount.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Discount $discount)
    {
        $delete = Discount::findOrFail($discount->id)->first();

        if ($delete->delete()) {
            return redirect()->route('admin.discount.index')->with(['Success' => "Data Discount berhasil di hapus!"]);
        } else {
            return redirect()->route('admin.discount.index')->with(['Success' => "Data Discount berhasil di hapus!"]);
        }
    }
}
