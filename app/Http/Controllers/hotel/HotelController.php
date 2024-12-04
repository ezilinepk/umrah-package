<?php

namespace App\Http\Controllers\hotel;

use Carbon\Carbon;
use App\Models\Hotel;
use App\Models\HotelImage;
use App\Models\HotelPackage;
use Illuminate\Http\Request;
use App\Models\HotelDailyPrice;
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


        $packages = HotelPackage::get();
        return view('hotel.create', compact('packages') );
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'hotel_name.*' => 'required|string|max:255',
            'hotel_city.*' => 'required|string|max:255',
            'hotel_google_map.*' => 'nullable|url',
            'hotel_star.*' => 'required|integer|min:1|max:5',
            'hotel_distance.*' => 'nullable|numeric',
            'hotel_picture.*' => 'nullable|image|mimes:png,jpg,avif,jpeg,webp|max:2048',
            'room_price_sharing.*' => 'required',
            'room_price_quint.*' => 'required',
            'room_price_triple.*' => 'required',
            'room_price_double.*' => 'required',
            'room_price_quad.*' => 'required',
            'package_name.*' => 'required',
            'hotel_images.*.*' => 'image|mimes:jpeg,png,jpg,webp,gif,avif,svg|max:2048',
            'address.*' => 'required|string',
        ]);

        if (is_array($request->hotel_name)) {
            foreach ($request->hotel_name as $index => $hotelName) {
                $hotelData = [
                    'hotel_name' => $hotelName,
                    'hotel_city' => $request->hotel_city[$index] ?? null,
                    'hotel_google_map' => $request->hotel_google_map[$index] ?? null,
                    'hotel_star' => $request->hotel_star[$index] ?? 1,
                    'hotel_distance' => $request->hotel_distance[$index] ?? null,
                    'room_price_sharing' => json_encode($request->room_price_sharing),
                    'room_price_quint' => json_encode($request->room_price_quint),
                    'room_price_triple' => json_encode($request->room_price_triple),
                    'room_price_double' => json_encode($request->room_price_double),
                    'room_price_quad' => json_encode($request->room_price_quad),
                    'package_name' => $request->package_name[$index],
                    'emails' => $request->email[$index] ?? null,
                    'addresses' => $request->address[$index] ?? '',
                ];

                // dd($hotelData);

                $hotel = Hotel::create($hotelData);

                if ($request->file('hotel_picture') && isset($request->file('hotel_picture')[$index])) {
                    $file = $request->file('hotel_picture')[$index];
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
            }
        }

        return redirect()->route('hotel.index')->with('success', 'Hotels added successfully.');
    }










    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        $roomPriceSharing = json_decode($hotel->room_price_sharing, true);
        // dd($roomPriceSharing);
        $roomPriceQuad = json_decode($hotel->room_price_quad, true);
        // dd($roomPriceQuad);
        $roomPriceDouble = json_decode($hotel->room_price_double, true);
        $roomPriceTriple = json_decode($hotel->room_price_triple, true);
        $roomPriceQuint = json_decode($hotel->room_price_quint, true);
        $packages = HotelPackage::all();

        return view('hotel.edit', compact('hotel', 'packages', 'roomPriceSharing', 'roomPriceTriple' , 'roomPriceQuad', 'roomPriceDouble', 'roomPriceQuint'));
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
    // dd($request->all()); // Check the request data

    $location = $request->input('hotel_city');
    $dateRange = $request->input('dateRange');
    $totalPerson = $request->input('totalperson', 1);
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

    // Main hotel search
    $hotels = Hotel::where('hotel_city', $location)->get();

    // Room types mapping
    $roomTypes = [
        'sharing' => 'room_price_sharing',
        'quint' => 'room_price_quint',
        'triple' => 'room_price_triple',
        'quad' => 'room_price_quad',
        'double' => 'room_price_double'
    ];

    $priceResults = [];

    // Process the main hotel data
    foreach ($hotels as $hotel) {
        $hotelPrices = [];

        foreach ($roomTypes as $roomTypeName => $priceField) {
            if (!is_null($hotel->$priceField)) {
                $numPersons = match (strtolower($roomTypeName)) {
                    'quad' => 4,
                    'triple' => 3,
                    'double' => 2,
                    'sharing' => 6,
                    'quint' => 5,
                    default => 1,
                };

                $basePrices = json_decode($hotel->$priceField, true); // Parse JSON prices
                $totalPrice = 0;

                // Get daily prices within the date range
                for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
                    $day = $date->day; // Get the day of the month (e.g., 21)
                    $totalPrice += $basePrices[1][$day] ?? 0;
                }

                // Calculate room price per person and total
                $roomPricePerPerson = ($totalPrice / $numPersons) * $totalPerson;
                $hotelPrices[] = [
                    'room_type' => ucfirst($roomTypeName),
                    'price_per_person' => number_format($roomPricePerPerson, 2),
                    'price_per_day' => number_format($roomPricePerPerson / $numDays, 2),
                    'total_price_for_persons' => number_format($roomPricePerPerson, 2),
                ];
            }
        }

        $priceResults[] = [
            'id' => $hotel->id,
            'hotel_name' => $hotel->hotel_name,
            'hotel_city' => $hotel->hotel_city,
            'package_name' => $hotel->package_name,
            'hotel_stars' => $hotel->hotel_star,
            'number_days' =>  $numDays,
            'hotel_distance' => $hotel->hotel_distance,
            'picture' => asset('images/' . $hotel->hotel_picture),
            'prices' => $hotelPrices
        ];
    }

    // Process additional rows if any
    $additionalRows = $request->input('additionalRows', []);
    $additionalResults = [];

    foreach ($additionalRows as $row) {
        $location = $row['hotel_city'];
        $dateRange = $row['date_range'];
        $totalPerson = $request->input('totalperson'); // Assuming you use the main `totalperson` here
        // You can process the additional row data just like the main data here

        if (strpos($dateRange, ' - ') !== false) {
            list($startDate, $endDate) = explode(' - ', $dateRange);
        } elseif (strpos($dateRange, ' to ') !== false) {
            list($startDate, $endDate) = explode(' to ', $dateRange);
        }

        $startDate = \Carbon\Carbon::parse($startDate);
        $endDate = \Carbon\Carbon::parse($endDate);
        $numDays = $startDate->diffInDays($endDate) + 1;

        $hotels = Hotel::where('hotel_city', $location)->get();
        // dd($hotels);
        $priceResultsForRow = [];

        foreach ($hotels as $hotel) {
            $hotelPrices = [];

            foreach ($roomTypes as $roomTypeName => $priceField) {
                if (!is_null($hotel->$priceField)) {
                    $numPersons = match (strtolower($roomTypeName)) {
                        'quad' => 4,
                        'triple' => 3,
                        'double' => 2,
                        'sharing' => 6,
                        'quint' => 5,
                        default => 1,
                    };

                    $basePrices = json_decode($hotel->$priceField, true); // Parse JSON prices
                    $totalPrice = 0;

                    // Get daily prices within the date range
                    for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
                        $day = $date->day; // Get the day of the month (e.g., 21)
                        $totalPrice += $basePrices[1][$day] ?? 0; // Use 0 if no price is set for that day
                    }

                    // Calculate room price per person and total
                    $roomPricePerPerson = ($totalPrice / $numPersons) * $totalPerson;
                    $hotelPrices[] = [
                        'room_type' => ucfirst($roomTypeName),
                        'price_per_person' => number_format($roomPricePerPerson, 2),
                        'price_per_day' => number_format($roomPricePerPerson / $numDays, 2),
                        'total_price_for_persons' => number_format($roomPricePerPerson, 2),
                    ];
                }
            }

            $priceResultsForRow[] = [
                'id' => $hotel->id,
                'hotel_name' => $hotel->hotel_name,
                'hotel_city' => $hotel->hotel_city,
                'package_name' => $hotel->package_name,
                'hotel_stars' => $hotel->hotel_star,
                'number_days' => $numDays,
                'hotel_distance' => $hotel->hotel_distance,
                'picture' => asset('images/' . $hotel->hotel_picture),
                'prices' => $hotelPrices
            ];
        }

        $additionalResults[] = [
            'location' => $location,
            'date_range' => $dateRange,
            'prices' => $priceResultsForRow
        ];
    }

    return response()->json([
        'success' => true,
        'hotel_location' => $location,
        'date_range' => $dateRange,
        'visa_price' => $visaPrice,
        'visa_price_with_transport' => $visaPriceWithTransport,
        'prices' => $priceResults,
        'additional_rows' => $additionalResults // Add the additional rows data here
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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'hotel_name' => 'required|string|max:255',
            'hotel_city' => 'required|string|max:255',
            'hotel_google_map' => 'nullable|url',
            'hotel_star' => 'required|integer|min:1|max:5',
            'hotel_distance' => 'nullable|numeric',
            'hotel_picture' => 'nullable|image|mimes:png,jpg,avif,jpeg,webp|max:2048',
            'room_price_sharing' => 'required|array',
            'room_price_quint' => 'required|array',
            'room_price_triple' => 'required|array',
            'room_price_double' => 'required|array',
            'room_price_quad' => 'required|array',
            'package_name' => 'required|string',
            'hotel_room_details' => 'nullable|string',
            'hotel_details' => 'nullable|string',
            'hotel_images.*' => 'image|mimes:jpeg,png,jpg,webp,gif,avif,svg|max:2048',
        ]);

        $hotel = Hotel::findOrFail($id);

        // Prepare room prices as JSON-encoded fields
        $roomPrices = [
            'room_price_sharing' => json_encode($request->room_price_sharing),
            'room_price_quint' => json_encode($request->room_price_quint),
            'room_price_triple' => json_encode($request->room_price_triple),
            'room_price_double' => json_encode($request->room_price_double),
            'room_price_quad' => json_encode($request->room_price_quad),
        ];

        // Update the hotel with validated data and room prices
        $hotel->update(array_merge($validatedData, $roomPrices));

        // Handle hotel picture
        if ($request->hasFile('hotel_picture')) {
            if ($hotel->hotel_picture && file_exists(public_path('images/' . $hotel->hotel_picture))) {
                unlink(public_path('images/' . $hotel->hotel_picture));
            }
            $file = $request->file('hotel_picture');
            $file_name = 'hotel-' . time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('images/'), $file_name);
            $hotel->update(['hotel_picture' => $file_name]);
        }

        // Handle hotel images
        if ($request->hasFile('hotel_images')) {
            foreach ($request->file('hotel_images') as $image) {
                $image_name = 'hotel-' . time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('images/hotels'), $image_name);

                HotelImage::create([
                    'hotel_id' => $hotel->id,
                    'hotel_picture' => $image_name,
                ]);
            }
        }

        return redirect()->route('hotel.index')->with('success', 'Hotel updated successfully.');
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
