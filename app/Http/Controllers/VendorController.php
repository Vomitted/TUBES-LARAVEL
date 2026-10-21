<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::orderBy('id', 'desc')->get();
        return view('vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'                    => 'required|string|max:50',
            'name'                    => 'required|string|max:150',
            'office_address'          => 'required|string',
            'email'                   => 'required|email|max:100',
            'phone'                   => 'required|string|max:30',
            'tax_id'                  => 'required|string|max:50',
            'business_license_number' => 'required|string|max:50',
            'status'                  => 'required|in:active,inactive,suspend',
            'pic_name'                => 'required|string|max:100',
            'pic_position'            => 'required|string|max:100',
            'pic_email'               => 'required|email|max:100',
            'pic_phone'               => 'required|string|max:30',
        ]);

        Vendor::create($validated);

        return redirect()->route('vendors.index')->with('success', 'Vendor berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $validated = $request->validate([
            'code'                    => 'required|string|max:50',
            'name'                    => 'required|string|max:150',
            'office_address'          => 'required|string',
            'email'                   => 'required|email|max:100',
            'phone'                   => 'required|string|max:30',
            'tax_id'                  => 'required|string|max:50',
            'business_license_number' => 'required|string|max:50',
            'status'                  => 'required|in:active,inactive,suspend',
            'pic_name'                => 'required|string|max:100',
            'pic_position'            => 'required|string|max:100',
            'pic_email'               => 'required|email|max:100',
            'pic_phone'               => 'required|string|max:30',
        ]);

        $vendor->update($validated);

        return redirect()->route('vendors.index')->with('success', 'Data vendor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return redirect()->route('vendors.index')->with('success', 'Vendor berhasil dihapus.');
    }
}
