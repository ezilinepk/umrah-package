<?php

namespace App\Http\Controllers\transport;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::get();
        return view('transport.index' , compact('transports'));
    }

    public function create()
    {
        return view('transport.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'transport_type' => 'required|string|max:255',
            'price_airport_makkah' => 'nullable|numeric|min:0',
            'price_makkah_madina' => 'nullable|numeric|min:0',
            'price_madina_makkah' => 'nullable|numeric|min:0',
            'currency' => 'required|string|in:usd,pkr',
        ]);

        Transport::create($validatedData);

        // Redirect or return response
        return redirect()->back()->with('success', 'Transport details saved successfully.');
    }





public function getTransportPrice(Request $request)
{
    $transportType = $request->input('transport_type');

    $transport = Transport::where('transport_type', $transportType)->first();

    if ($transport) {
        return response()->json([
            'price_airport_makkah' => $transport->price_airport_makkah,
            'price_makkah_madina' => $transport->price_makkah_madina,
            'price_madina_makkah' => $transport->price_madina_makkah,
        ]);
    }

    return response()->json(['error' => 'Transport type not found'], 404);
}

public function gettransporttype()
{
    $transports = Transport::all(['transport_type']);

    return response()->json($transports);
}

public function edit($id)
{
    $transport = Transport::findOrFail($id);
    return view('transport.edit' , compact('transport'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'transport_type' => 'required|string',
        'price_airport_makkah' => 'nullable|numeric',
        'price_makkah_madina' => 'nullable|numeric',
        'price_madina_makkah' => 'nullable|numeric',
        'currency' => 'required|in:usd,pkr',
    ]);

    $transport = Transport::findOrFail($id);


    $transport->update([
        'transport_type' => $request->input('transport_type'),
        'price_airport_makkah' => $request->input('price_airport_makkah'),
        'price_makkah_madina' => $request->input('price_makkah_madina'),
        'price_madina_makkah' => $request->input('price_madina_makkah'),
        'currency' => $request->input('currency'),
    ]);


    return redirect()->route('transport.index')->with('success', 'Transport details updated successfully.');
}





}
