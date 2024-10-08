<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormdataController extends Controller
{

    public function storeFormData(Request $request)
    {
        // Remove the dd statement after verifying the request data
        dd($request->all());

        $data = $request->input('data');


        // Insert each row of formData into the database
        // foreach($data['formData'] as $row) {
        //     DB::table('your_table_name')->insert([
        //         'location' => $row['location'],
        //         'hotel_name' => $row['hotel'],
        //         'date_range' => $row['dateRange'],
        //         'room_type' => $row['roomType'],
        //         'nights' => $row['nights'],
        //         'counter' => $row['counter'],
        //         'visa_price' => $data['visaPrice'],
        //         'visa_price_with_transport' => $data['visaPriceWithTransport'],
        //         'additional_input' => $data['additionalInput'],
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // }

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }

}
