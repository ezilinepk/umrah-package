<?php

namespace App\Http\Controllers\visa;

use App\Http\Controllers\Controller;
use App\Models\Visa;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index()
    {
        $visas = Visa::get();
        return view('visa.index' , compact('visas'));
    }

     public function create()
     {
        return view('visa.crate');
     }

     public function store(Request $request)
     {
         $request->validate([
             'visa_price' => 'required|numeric',
             'visa_valid_date' => 'required|date',
             'visa_exp_date' => 'required|date',
             'visa_country' => 'required|string|max:255',
             'visa_type' => 'required|string|max:255',
             'visa_place_of_issue' => 'required|string|max:255',
             'visa_price_with_transport' => 'required|numeric',
         ]);

         $data = $request->only([
             'visa_price',
             'visa_valid_date',
             'visa_exp_date',
             'visa_country',
             'visa_type',
             'visa_place_of_issue',
             'visa_price_with_transport',
         ]);


         Visa::create($data);

         return redirect()->route('visa.index')->with('success', 'Visa record created successfully.');
     }



     public function VisaPrice(Request $request)
     {

         $visaType = $request->input('visaType');


         $visa = Visa::where('visa_type', $visaType)->first();

        //  dd($visa);
         if ($visa) {
             return response()->json([
                 'success' => true,
                 'visaPrice' => $visa->visa_price,
                 'visaPriceWithTransport' => $visa->visa_price_with_transport,
             ]);
         }

         return response()->json([
             'success' => false,
             'message' => 'Visa price not found.'
         ]);
     }

     public function edit($id)
     {
        $visa =Visa::findOrFail($id);
        return view('visa.edit', compact('visa'));
     }


}
