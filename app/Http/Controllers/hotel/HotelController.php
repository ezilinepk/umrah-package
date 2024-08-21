<?php

namespace App\Http\Controllers\hotel;

use Carbon\Carbon;
use App\Models\Hotel;
use App\Models\HotelImage;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotel.index', compact('hotels'));
    }


    public function create()
    {

        $role = Role::get();
        return view('hotel.create', compact('role'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'hotel_name' => 'required|string|max:255',
            'hotel_city' => 'required|string|max:255',
            'hotel_google_map' => 'nullable|url',
            'hotel_star' => 'required|integer|min:1|max:5',
            'hotel_distance' => 'nullable|numeric',
            'hotel_picture' => 'nullable|image|mimes:png,jpg,avif,jpeg,webp',
            'room_price_sharing' => 'required|numeric',
            'room_price_sharing_currency' => 'required|in:PKR,USD',
            'room_price_quint' => 'required|numeric',
            'room_price_quint_currency' => 'required|in:PKR,USD',
            'room_price_triple' => 'required|numeric',
            'room_price_triple_currency' => 'required|in:PKR,USD',
            'room_price_double' => 'required|numeric',
            'room_price_double_currency' => 'required|in:PKR,USD',
            'room_price_quad' => 'required|numeric',
            'room_price_quad_currency' => 'required|in:PKR,USD',
            'hotel_room_details' => 'nullable|string',
            'hotel_details' => 'nullable|string',
            'hotel_images.*' => 'image|mimes:jpeg,png,jpg, webp,gif,avif,svg|max:2048',
        ]);

        // Additional dynamic pricing validation
        foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day) {
            foreach (['sharing', 'quint', 'double', 'triple'] as $room_type) {
                $validatedData = array_merge($validatedData, $request->validate([
                    $day . '_price_' . $room_type => 'nullable|numeric',
                    $day . '_price_' . $room_type . '_currency' => 'nullable|string|in:PKR,USD',
                ]));
            }
        }

        // Save hotel main information
        $hotel = Hotel::create($validatedData);


        if ($request->hasFile('hotel_picture')) {
            $file = $request->file('hotel_picture');
            $file_name = 'hotel-' . time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('images/'), $file_name);
            $hotel->update(['hotel_picture' => $file_name]);
        }


        if ($request->hasFile('hotel_images')) {
            foreach ($request->file('hotel_images') as $image) {
                $image_name = 'hotel-' . time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('images/hotels'), $image_name, 'public');

                HotelImage::create([
                    'hotel_id' => $hotel->id,
                    'hotel_picture' => $image_name,
                ]);
            }
        }

        // Redirect with a success message
        return redirect()->route('hotel.index')->with('success', 'Hotel added successfully.');
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotel.edit', compact('hotel'));
    }





    public function getHotelsByLocationclass(Request $request)
    {
        $location = $request->input('location');
        $hotels = Hotel::where('hotel_city', $location)->get();


        $html = '<div class="hotelDetails">
                    <div class="booking-details" id="booking-details">';

        foreach ($hotels as $hotel) {
            $dailyPriceSharing = $hotel->room_price_sharing;
            $dailyPriceQuad = $hotel->room_price_quad;
            $dailyPriceQuint = $hotel->room_price_quint;
            $dailyPriceTriple = $hotel->room_price_triple;
            $dailyPriceDouble = $hotel->room_price_double;

            $html .= '<div class="card booking-card">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="' . asset('images/' . $hotel->hotel_picture) . '" alt="Hotel Picture" class="img-fluid">
                            </div>
                            <div class="col-md-6" style="margin-left: 20px">
                                <div class="d-flex justify-content-between">
                                    <div class="hotel-info flex-grow-1">
                                        <h5 class="card-title">' . htmlspecialchars($hotel->hotel_name) . '</h5>
                                        <p class="star-rating">';
            for ($i = 0; $i < $hotel->hotel_star; $i++) {
                $html .= '★';
            }
            $html .= '</p>
                                        <p class="card-text"><strong>' . htmlspecialchars($hotel->hotel_city) . '</strong></p>
                                        <table class="table table-bordered">
                                            <thead style="background-color: gray;color: white;">
                                                <tr>
                                                    <th>Sharing</th>
                                                    <th>Quad</th>
                                                    <th>Quint</th>
                                                    <th>Triple</th>
                                                    <th>Double</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>$' . number_format($dailyPriceSharing, 2) . '</td>
                                                    <td>$' . number_format($dailyPriceQuad, 2) . '</td>
                                                    <td>$' . number_format($dailyPriceQuint, 2) . '</td>
                                                    <td>$' . number_format($dailyPriceTriple, 2) . '</td>
                                                    <td>$' . number_format($dailyPriceDouble, 2) . '</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-end">
                                <a href="#" class="btn btn-outline-primary">Book Now</a>
                            </div>
                            <div class="row" style="margin-left:20px;">
                                <div class="col-md-6">
                                    <div class="price-item" id="room-price-' . $hotel->id . '">
                                          <span id="room-price-value-' . $hotel->id . '">' . number_format($dailyPriceSharing, 2) . '</span>
                                    </div>
                                    <div class="price-item" id="daily-price-' . $hotel->id . '">
                                       <span id="daily-price-value-' . $hotel->id . '">-</span>
                                    </div>
                                    <div class="price-item" id="total-price-' . $hotel->id . '">
                                         <span id="total-price-value-' . $hotel->id . '">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }

        $html .= '</div></div>';

        return response()->json(['html' => $html, 'hotels' => $hotels]);
    }

    // public function getHotelsByLocationid(Request $request)
    // {
    //     // dd($request->all());
    //     $location = $request->input('location');
    //     $hotels = Hotel::where('hotel_city', $location)->get();

    //     $html = '<div class="hotelDetails">
    //                 <div class="booking-details" id="booking-details">';

    //     foreach ($hotels as $hotel) {
    //         $dailyPriceSharing = $hotel->room_price_sharing;
    //         $dailyPriceQuad = $hotel->room_price_quad;
    //         $dailyPriceQuint = $hotel->room_price_quint;
    //         $dailyPriceTriple = $hotel->room_price_triple;
    //         $dailyPriceDouble = $hotel->room_price_double;

    //         $hotelDetailsUrl = route('hoteldetails', [
    //             'id' => $hotel->id,

    //         ]);

    //         // Default total price calculation
    //         $totalPrice = $dailyPriceSharing * 1;

    //         // Start of hotel card HTML
    //         $html .= '<div class="card booking-card">
    //                     <div class="row no-gutters position-relative">
    //                         <!-- Hotel Image -->
    //                         <div class="col-md-4">
    //                             <img src="' . asset('images/' . $hotel->hotel_picture) . '" alt="Hotel Picture" class="img-fluid">
    //                         </div>

    //                         <!-- Hotel Info -->
    //                         <div class="col-md-6 position-absolute" style="top: 10px; left: 410px; z-index: 1; background-color: rgba(0, 0, 0, 0.1); padding: 15px; border-radius: 5px;">
    //                             <div class="hotel-info">
    //                                 <h5 class="card-title text-white">' . htmlspecialchars($hotel->hotel_name) . '</h5>
    //                                 <p class="star-rating text-warning">';

    //         for ($i = 0; $i < $hotel->hotel_star; $i++) {
    //             $html .= '★';
    //         }
    //         // @include('auth.hoteldetail');

    //         $html .= '</p>
    //                                 <p class="card-text text-white"><strong>' . htmlspecialchars($hotel->hotel_city) . '</strong></p>

    //                                 <!-- Pricing Information -->
    //                                 <div class="price-info">
    //                                     <div class="price-item" id="room-price-' . $hotel->id . '">
    //                                         <span id="room-price-value-' . $hotel->id . '">' . number_format($dailyPriceSharing, 2) . '</span>
    //                                     </div>
    //                                     <div class="price-item" id="daily-price-' . $hotel->id . '">
    //                                         <span id="daily-price-value-' . $hotel->id . '">-</span>
    //                                     </div>
    //                                     <div class="price-item" id="total-price-' . $hotel->id . '">
    //                                         <span id="total-price-value-' . $hotel->id . '">' . number_format($totalPrice, 2) . '</span>
    //                                     </div>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                     </div>


    //                     <div class="row">
    //     <div class="col-md-4">
    //         <a href="" data-hotel-id="' . $hotel->id . '" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary bookNow" style="margin: 15px;">Book Now</a>
    //     </div>
    //                     </div>
    //                 </div>'; // End of hotel card
    //     }

    //     $html .= '</div></div>';

    //     return response()->json(['html' => $html, 'hotels' => $hotels]);
    // }

    public function getHotelDetailsById(Request $request)
{
    $hotelId = $request->input('hotel_id');
    $hotel = Hotel::where('id',$hotelId)->first();

    if (!$hotel) {
        return response()->json(['error' => 'Hotel not found'], 404);
    }

    return response()->json([
        'hotel' => [
            'id' => $hotel->id,
            'name' => $hotel->hotel_name,
            'city' => $hotel->hotel_city,
            'star' => $hotel->hotel_star,
            'price_sharing' => $hotel->room_price_sharing,
            'price_double' => $hotel->room_price_double,
            'price_triple' => $hotel->room_price_triple,
            'price_quad' => $hotel->room_price_quad,
            'price_quint' => $hotel->room_price_quint,
            'picture' => asset('images/' . $hotel->hotel_picture),
            'details' => $hotel->hotel_details,
        ],
    ]);
}


public function getRoomPrices(Request $request)
{
    // dd($request->all());
    $location = $request->input('hotel_name');

    $dateRange = $request->input('dateRange');
    $roomType = $request->input('roomType');
    $visaPrice = (float) $request->input('visaPrice', 0);
    $visaPriceWithTransport = (float) $request->input('visaPriceWithTransport', 0);

    if (strpos($dateRange, ' - ') !== false) {
        list($startDate, $endDate) = explode(' - ', $dateRange);
    } elseif (strpos($dateRange, ' to ') !== false) {
        list($startDate, $endDate) = explode(' to ', $dateRange);
    } else {
        return response()->json(['success' => false, 'message' => 'Invalid date range format.'], 400);
    }

    $startDate = \Carbon\Carbon::parse($startDate);
    $endDate = \Carbon\Carbon::parse($endDate);
    $numDays = $startDate->diffInDays($endDate) + 1;

    $hotels = Hotel::where('id', $location)->get();
    // dd($hotels);

    $roomPrices = [];
    $totalPrices = [];
    $dailyPrices = [];

    foreach ($hotels as $hotel) {
        $roomPrice = 0;

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dayOfWeek = strtolower($date->format('l'));
            $priceField = "{$dayOfWeek}_price_" . strtolower($roomType);


            if ($hotel->$priceField) {
                $roomPrice += $hotel->$priceField;
            } else {
            }
        }


        $roomPrices[$hotel->id] = 'Room price for ' . $numDays . ' days: $' . number_format($roomPrice, 2);
        $dailyPrices[$hotel->id] = number_format($roomPrice / $numDays, 2);
        $totalPrices[$hotel->id] = number_format($roomPrice + $visaPrice + $visaPriceWithTransport, 2);
        // dd($totalPrices);
    }

    return response()->json([
        'success' => true,
        'hotel' => $hotels->first(),
        'roomPrices' => $roomPrices,
        'dailyPrices' => $dailyPrices,
        'visaPrice' => $visaPrice,
        'visaPriceWithTransport' => $visaPriceWithTransport,
        'totalPrices' => $totalPrices,
       'picture' => asset('images/' . $hotel->hotel_picture),
       'dateRange' => $dateRange,


    ]);
}



//     public function getRoomPrices(Request $request)
// {
//     // dd($request->all());
//     $hotelName = $request->input('hotel_name');
//     $dateRange = $request->input('dateRange');
//     $roomType = $request->input('roomType');
//     $visaPrice = $request->input('visaPrice', 0);
//     $visaPriceWithTransport = $request->input('visaPriceWithTransport', 0);

//     // Convert date range to start and end dates
//     $dates = explode(' to ', $dateRange);
//     $startDate = Carbon::parse($dates[0]);
//     $endDate = Carbon::parse($dates[1]);

//     // Calculate the number of days
//    $numDays = $startDate->diffInDays($endDate);

//     // Fetch hotel prices from the database
//     $hotels = Hotel::where('hotel_name', $hotelName)->get();
//     $roomPrices = [];
//     $totalPrices = [];
//     $dailyPrices = [];

//     foreach ($hotels as $hotel) {
//         $roomPrice = 0;

//         for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
//             $dayOfWeek = strtolower($date->format('l'));
//             $priceField = "{$dayOfWeek}_price_" . strtolower($roomType);

//             if ($hotel->$priceField) {
//                 $roomPrice += $hotel->$priceField;
//             } else {
//                 \Log::info("Price field not found: $priceField for hotel: {$hotel->id}");
//             }
//         }

//         $roomPrices[$hotel->id] = 'Room price for ' . $numDays . ' days: $' . number_format($roomPrice, 2);
//         $dailyPrices[$hotel->id] = number_format($roomPrice / $numDays, 2);
//         $totalPrices[$hotel->id] = number_format($roomPrice + $visaPrice + $visaPriceWithTransport);
//         dd($totalPrices);
//     }

//     return response()->json([
//         'success' => true,
//         'roomPrices' => $roomPrices,
//         'totalPrices' => $totalPrices,
//         'dailyPrices' => $dailyPrices,
//     ]);
// }

    public function getHotels(Request $request)
    {
        $location = $request->get('ziarat');

        $hotels = Hotel::where('hotel_city', $location)->get(['hotel_name', 'id']);

        return response()->json($hotels);
    }
































    public function getHotelsByName(Request $request)
    {
        dd($request->all());
        $name = $request->input('name');

        $hotels = Hotel::where('id', 'LIKE', '%' . $name . '%')->get(); // Use LIKE to allow partial matches

        // Initialize the HTML variable
        $html = '<div class="hotelDetails">
                    <div class="booking-details" id="booking-details">';

        // Check if there are any hotels
        if ($hotels->isEmpty()) {
            $html .= '<p>No hotels found.</p>';
        } else {
            foreach ($hotels as $hotel) {
                // Extract hotel pricing information
                $dailyPriceSharing = $hotel->room_price_sharing;
                $dailyPriceQuad = $hotel->room_price_quad;
                $dailyPriceQuint = $hotel->room_price_quint;
                $dailyPriceTriple = $hotel->room_price_triple;
                $dailyPriceDouble = $hotel->room_price_double;

                // Generate the hotel details URL
                $hotelDetailsUrl = route('hoteldetails', [
                    'id' => $hotel->id,
                    'sharing' => $dailyPriceSharing,
                    'quad' => $dailyPriceQuad,
                    'quint' => $dailyPriceQuint,
                    'triple' => $dailyPriceTriple,
                    'double' => $dailyPriceDouble,
                    'roomPricePerDay' => $dailyPriceSharing
                ]);

                // Default total price calculation
                $totalPrice = $dailyPriceSharing * 1;

                // Append hotel card HTML
                $html .= '<div class="card booking-card">
                            <div class="row no-gutters position-relative">
                                <!-- Hotel Image -->
                                <div class="col-md-4">
                                    <img src="' . asset('images/' . $hotel->hotel_picture) . '" alt="Hotel Picture" class="img-fluid">
                                </div>

                                <!-- Hotel Info -->
                                <div class="col-md-6 position-absolute" style="top: 10px; left: 410px; z-index: 1; background-color: rgba(0, 0, 0, 0.1); padding: 15px; border-radius: 5px;">
                                    <div class="hotel-info">
                                        <h5 class="card-title text-white">' . htmlspecialchars($hotel->hotel_name) . '</h5>
                                        <p class="star-rating text-warning">';

                for ($i = 0; $i < $hotel->hotel_star; $i++) {
                    $html .= '★';
                }

                $html .= '</p>
                                        <p class="card-text text-white"><strong>' . htmlspecialchars($hotel->hotel_city) . '</strong></p>

                                        <!-- Pricing Information -->
                                        <div class="price-info">
                                            <div class="price-item" id="room-price-' . $hotel->id . '">
                                                <span id="room-price-value-' . $hotel->id . '">' . number_format($dailyPriceSharing, 2) . '</span>
                                            </div>
                                            <div class="price-item" id="daily-price-' . $hotel->id . '">
                                                <span id="daily-price-value-' . $hotel->id . '">-</span>
                                            </div>
                                            <div class="price-item" id="total-price-' . $hotel->id . '">
                                                <span id="total-price-value-' . $hotel->id . '">' . number_format($totalPrice, 2) . '</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <a href="' . $hotelDetailsUrl . '&nights=1" class="btn btn-outline-primary" style="margin: 15px;">Book Now</a>
                                </div>
                            </div>
                        </div>'; // End of hotel card
            }
        }

        $html .= '</div></div>';

        // Return the HTML and hotels data as JSON
        return response()->json(['html' => $html, 'hotels' => $hotels]);
    }


}
