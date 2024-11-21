<?php

namespace App\Http\Controllers;

use App\Models\HotelPackage;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        $packages = HotelPackage::get();
        // dd($packages);
        return view('packag.index' , compact('packages'));
    }

    public function create()
    {
        return view('packag.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'package_name' => 'required|string|max:255',
        ]);

        $package = HotelPackage::create([
            'package_name' => $request->package_name,
        ]);

        return redirect()->route('hotel.index')->with('success', 'Hotels added successfully.');

    }

}
