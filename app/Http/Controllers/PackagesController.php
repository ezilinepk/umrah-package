<?php

namespace App\Http\Controllers;

use App\Models\HotelPackage;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        return view('packag.index');
    }

    public function create()
    {
        return view('packag.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'package_name' => 'required|string|max:255',

        ]);


        HotelPackage::create([
            'package_name' => $request->package_name,

        ]);

        return redirect()->back()->with('success', 'Hotel package created successfully.');
    }
}
