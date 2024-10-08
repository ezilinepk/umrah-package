<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atour.com</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <style>
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .input-group {
            margin-bottom: 1rem;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
        }

        .custom-dropdown select {
            width: 100%;
            height: 38px;
        }

        .header {
            background-color: #fff;
            height: 90px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .header .logo-container {
            display: flex;
            align-items: center;
        }

        .header .logo-container img {
            height: 60px;
            margin-right: 10px;
        }

        .header .logo-container h4 {
            color: black;
            margin: 0;
            font-size: 24px;
        }

        .header .auth-buttons {
            margin-right: 40px;
        }



        .bg-img {
            position: relative;
            background-image: url('assets/dummy/pic-anjum.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }

        .bg-img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }

        .bg-img>* {
            position: relative;
            z-index: 2;
        }

        .search-form {
            max-width: 1050px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            color: black;
            margin: auto;

        }

        .search-form .form-group {
            margin-bottom: 1rem;
        }

        .hotel-info {
            display: flex;
            flex-direction: column;
        }

        .hotel-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .hotel-header .card-title {
            margin-right: 15px;
        }

        .hotel-header .star-rating {
            margin: 0;
        }

        .hotel-header .hotel-distance {
            margin-left: 15px;
        }

        .booking-details {
            margin-top: 40px;
        }

        .booking-card img {
            width: 100%;
            height: 270px;
            object-fit: cover;
        }



        .booking-card .card-body .btn {
            align-self: flex-end;
        }

        .card-title,
        .star-rating,
        .hotel-distance {
            margin: 0;
        }

        .hotel-info {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .booking-card {
            margin-bottom: 20px;
        }

        .price-item {
            display: inline-block;
            margin-right: 10px;
        }

        .d-inline-block {
            display: inline-block;
        }

        footer {
            background-color: black;
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .hotel-info {
            color: white;
            padding: 10px;
        }

        .card-title,
        .card-text {
            margin-bottom: 0;
            line-height: 1.2;
        }

        .star-rating {
            font-size: 16px;
        }

        .booking-card {
            margin-bottom: 15px;
        }

        .hotel-info {
            background: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 5px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .card-img-top {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .card-body {
            padding: 1.25rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            margin-bottom: 0.5rem;
        }

        #additionalRowsContainer .form-row .input-group {
            margin-bottom: 10px;
            /* Adjust spacing between rows */
        }

        #additionalRowsContainer .form-row .removeRowButton {
            cursor: pointer;
        }

        .estimate-total-price {
    font-weight: bold;
    color: red;
              }

              .search-form {
    max-height: 400px;
    overflow-y: auto;
    padding-right: 15px;
}


.header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    background-color: #f8f9fa;
    padding: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}


.book-now {
    padding: 1.1em 2.7em;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2.3px;
            font-weight: 500;
            color: #000;
            background-color: #fff;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }



.book-now:hover {
    background-color: rgb(21,114,232);
            box-shadow: 0px 15px 20px rgb(21,114,232);
            color: #fff;
            transform: translateY(-7px)
}

.book-now:active  {
    transform: translateY(-1px);
}
.hotel-name{
padding: 1.1em 2.7em;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2.3px;
            font-weight: 500;
            color: #000;
            background-color: #fff;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
}
 .hotel-name:hover {

    background-color: rgb(21,114,232);
            box-shadow: 0px 15px 20px rgb(21,114,232);
            color: #fff;
            transform: translateY(-7px)
}








    </style>
</head>

<body>
    <header>
        <div class="container-fluid header">
            <div class="logo-container">
                <img src="{{ asset('images/logo/logo-3 (1).png') }}" alt="Primary Logo" style="height: 35px;">
            </div>
            <div class="auth-buttons">
                <a href="{{ route('ulogin') }}" class="btn btn-outline-primary">Sign In</a>
            </div>
        </div>
    </header>

    <div class="content"  style="">
        <div class="bg-img">
            <div  style="text-align: center; margin-bottom: 265px;">
                <h1 id="hero-banner-header1" class="fade-in" data-selenium="hero-banner-h1">Mecca hotels & places to stay</h1>
                <h2 id="hero-banner-header2" class="fade-in hero-banner-header2" data-selenium="hero-banner-h2">
                    Search to compare prices and discover great deals with free cancellation
                </h2>

                <div class="container" >
                    <div class="search-form">
                            <div class="form-row">
                                <div class="form-group col-md-4 col-sm-6 col-12">
                                    <label for="ziaratName" style="color: black">Location</label>
                                    <select class="form-control" id="ziaratName">
                                        <option value="">Select Location</option>
                                        <option value="Makkah">Makkah</option>
                                        <option value="Madina">Madina</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 col-sm-6 col-12">
                                    <label for="dateRange" style="color: black">Check-in / Check-out</label>
                                    <input type="text" class="form-control" id="dateRange">
                                </div>



                                <div class="form-group col-md-3 col-sm-6 col-12">
                                    <label for="nights" style="color: black">Nights</label>
                                    <input type="text" class="form-control " id="night" readonly>
                                </div>

                                <div class="form-group col-md-1 col-sm-6 col-12 d-flex align-items-end" style="margin-bottom: 20px">
                                    <button class="btn btn-sm btn-primary" id="addRowButton">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>




                            <div id="additionalRowsContainer" class="mt-3"></div>

                            <div class="form-row align-items-end" style="margin-left: 4px;">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="additionalInputField" placeholder=" Applier Name">
                                </div>

                                <div class="form-row align-items-end" style="margin-left: 4px;">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="numberofperson" placeholder="Number of person">
                                    </div>

                                <div class="col-md-3">
                                    <button type="button" id="calculateubl" class=" texi btn btn-primary">Search</button>
                                </div>
                            </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

    <div class="hotelDetails" id="hotelDetailsSection" style="display: none;">
        <div class="container" style="max-width: 2000px">
 </div>
         </div>







    {{-- @dd($hotel); --}}

    @include('auth.hoteldetail')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetchRoomPrices() {
    var hotelName = $('#ziaratName').val();
    var dateRange = $('#dateRange').val();
    var totalperson = $('#numberofperson').val(); // Get the value

    console.log({ hotel_city: hotelName, dateRange: dateRange, totalperson: totalperson });

    if (!hotelName || !dateRange || !totalperson) {
        alert("Please fill in all fields");
        return;
    }


        $.ajax({
    url: '{{ route('getRoomPrices') }}',
    type: 'GET',
    data: {
        hotel_city: hotelName,
        dateRange: dateRange,
        totalperson: totalperson,
        _token: '{{ csrf_token() }}'
    },
    success: function(response) {
        if (response.success) {
            console.log(response);

            var prices = response.prices;
            var dateRange = response.date_range;
            var numDays = response.num_days;
            var hotelStars = response.hotel_stars;
            var hoteldistance = response.hotel_distance;
            var visaPrice = response.visa_price || 0;
            var visaPriceWithTransport = response.visa_price_with_transport || 0;

            $('#nights').val(numDays);
            $('#hotelDetailsSection').show();

            var groupedHotels = prices.reduce(function(groups, hotel) {
                var packageName = hotel.package_name || 'No Package';
                if (!groups[packageName]) {
                    groups[packageName] = { makkah: [], madina: [] };
                }
                var city = hotel.hotel_city.toLowerCase();
                if (city === 'makkah') {
                    groups[packageName].makkah.push(hotel);
                } else if (city === 'madina') {
                    groups[packageName].madina.push(hotel);
                }
                return groups;
            }, {});
            Object.keys(groupedHotels).forEach(function(packageName) {
    var packageHotels = groupedHotels[packageName];

    var packageSectionHtml = `
        <div class="card package-details">
            <div class="card-header">
                <h3>Package: ${packageName}</h3>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="hotel-name" style="margin-left: 5px;">Makkah Hotels</h4>
                        <div id="makkah-hotels-${packageName}"></div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="hotel-name">Madina Hotels</h4>
                        <div id="madina-hotels-${packageName}"></div>
                    </div>
                </div>
            </div>
        </div>
    `;

    if ($(`#package-${packageName}`).length === 0) {
        $('#hotelDetailsSection .container').append(packageSectionHtml);
    }
                packageHotels.makkah.forEach(function(hotel, index) {
                    var hotelName = hotel.hotel_name;
                    var roomPrices = hotel.prices;
                    var hotelPicture = hotel.picture || '';
                    var hotelStars = hotel.hotel_stars || 'N/A';
                    var hoteldistance = hotel.hotel_distance;

                    var hotelDetailsHtml = `
                        <div class="card booking-card">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="${hotelPicture}" class="card-img-top img-fluid" alt="${hotelName}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">${hotelName} (${hotel.hotel_city})</h5>
                                        <p class="star-rating text-warning">${'★'.repeat(hotelStars)}</p>
                                        <p class="card-text"><strong>Date: ${dateRange}</strong></p>
                                         <p class="card-text"><strong>Distance From Haram pak: ${hoteldistance }K.m</strong></p>

                                        <p class="card-text">Number of Nights: ${numDays}</p>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                 <th>Double</th>
                                                   <th>Triple</th>
                                                        <th>Quad</th>
                                                    <th>Quint</th>
                                                    <th>Sharing</th>

                                                </tr>
                                            </thead>
                                            <tbody id="room-prices-${packageName}-${index}">

                                                <tr id="room-price-row-${packageName}-${index}">
                                                    <td id="price-double-${packageName}-${index}"></td>
                                                    <td id="price-triple-${packageName}-${index}"></td>
                                                     <td id="price-quad-${packageName}-${index}"></td>
                                                    <td id="price-quint-${packageName}-${index}"></td>
                                                  <td id="price-sharing-${packageName}-${index}"></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="#" data-hotel-id="${hotel.id}" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary book-now" >View details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    $(`#makkah-hotels-${packageName}`).append(hotelDetailsHtml);

                    // Populate room prices
                    roomPrices.forEach(function(room) {
                        var roomType = room.room_type.toLowerCase();
                        var pricePerPerson = room.price_per_person || 0;

                        if (roomType.includes('sharing')) {
                            $(`#price-sharing-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        } else if (roomType.includes('quint')) {
                            $(`#price-quint-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        } else if (roomType.includes('triple')) {
                            $(`#price-triple-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        } else if (roomType.includes('quad')) {
                            $(`#price-quad-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        } else if (roomType.includes('double')) {
                            $(`#price-double-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        }
                    });
                });

                packageHotels.madina.forEach(function(hotel, index) {
                    var hotelName = hotel.hotel_name;
                    var hotelStars = hotel.hotel_stars || 'N/A';
                    var roomPrices = hotel.prices;
                    var hotelPicture = hotel.picture || '';
                    var hotelStars = hotel.hotel_stars || 'N/A';
                    var hoteldistance = hotel.hotel_distance;

                    var hotelDetailsHtml = `
                        <div class="card booking-card">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="${hotelPicture}" class="card-img-top img-fluid" alt="${hotelName}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">${hotelName} (${hotel.hotel_city})</h5>
                                        <p class="star-rating text-warning">${'★'.repeat(hotelStars)}</p>
                                         <p class="card-text"><strong>Distance from Hotel to madina pak: ${hoteldistance }K.m</strong></p>
                                        <p class="card-text"><strong>Date: ${dateRange}</strong></p>
                                        <p class="card-text">Number of Nights: ${numDays}</p>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                 <th>Double</th>
                                                   <th>Triple</th>
                                                        <th>Quad</th>
                                                    <th>Quint</th>
                                                    <th>Sharing</th>

                                                </tr>
                                            </thead>
                                            <tbody id="room-prices-${packageName}-${index}">

                                                <tr id="room-price-row-${packageName}-${index}">
                                                    <td id="price-double-${packageName}-${index}"></td>
                                                    <td id="price-triple-${packageName}-${index}"></td>
                                                     <td id="price-quad-${packageName}-${index}"></td>
                                                    <td id="price-quint-${packageName}-${index}"></td>
                                                  <td id="price-sharing-${packageName}-${index}"></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="#" data-hotel-id="${hotel.id}" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary book-now" style="margin-top: 37px;">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    $(`#madina-hotels-${packageName}`).append(hotelDetailsHtml);

                    roomPrices.forEach(function(room) {
                        var roomType = room.room_type.toLowerCase();
                        var pricePerPerson = room.price_per_person || 0;

                        if (roomType.includes('sharing')) {
                            $(`#price-sharing-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        } else if (roomType.includes('quint')) {
                            $(`#price-quint-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        } else if (roomType.includes('triple')) {
                            $(`#price-triple-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        } else if (roomType.includes('quad')) {
                            $(`#price-quad-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        } else if (roomType.includes('double')) {
                            $(`#price-double-${packageName}-${index}`).text(`SAR${pricePerPerson}`);
                        }
                    });
                });
            });
        } else {
            console.error('Error fetching room prices:', response.message);
        }
    },
    error: function(xhr, status, error) {
        console.error('AJAX Error:', status, error);
    }
});


        }


    $('#calculateubl').click(function() {
        fetchRoomPrices();
    });
});

function updateEstimatedTotalPrice(totalPrices) {
    var currentTotal = parseFloat($('#estimateTotalPrice').val()) || 0;
    for (var hotelId in totalPrices) {
        if (totalPrices.hasOwnProperty(hotelId)) {
            var price = parseFloat(totalPrices[hotelId].replace(/,/g, '')) || 0;
            currentTotal += price;
        }
    }

    $('#estimateTotalPrice').val(currentTotal.toFixed(2));
    $('#estimateTotalPriceContainer').hide();
}

$('#calculateubl').on('click', function() {
        $('#estimateTotalPriceContainer').show();
});


$('#roomDropdown').change(function() {
                fetchRoomPrices($('#ziaratName').val());
            });

// $('#calculateTotalPriceBtn').click(function() {
//         fetchRoomPrices($('#location').val());
//         $('#estimateTotalPriceContainer').show();
//     });

$(document).ready(function() {
    function addNewRow() {
    var rowCount = $('#additionalRowsContainer .form-row').length;
    var uniqueSuffix = Date.now();
    var newRow = `
    <div class="form-row new-row" data-row-id="${rowCount + 1}" id="row-${uniqueSuffix}">
        <div class="form-group col-md-4 col-sm-6 col-4">
            <label for="location-${rowCount + 1}" style="color: black">Location</label>
            <select class="form-control location" id="location-${uniqueSuffix}">
                <option value="">Select location</option>
                <option value="Makkah">Makkah</option>
                <option value="Madina">Madina</option>
            </select>
        </div>

        <div class="form-group col-md-4 col-sm-6 col-4">
            <label for="dateRange-${rowCount + 1}" style="color: black">Check-in / Check-out</label>
            <input type="text" class="form-control dateRange" id="dateRange-${uniqueSuffix}">
        </div>

        <div class="form-group col-md-3 col-sm-6 col-3">
            <label for="nights-${uniqueSuffix}" style="color: black">Nights</label>
            <input type="text" class="form-control nights" id="nights-${uniqueSuffix}" readonly>
        </div>

        <div class="form-group col-md-1 col-sm-6 col-1 d-flex align-items-end" style="margin-bottom: 34px; margin-left: 0px; height: 66px;">
            <button class="btn btn-sm btn-danger removeRowButton" id="removeRowButton-${uniqueSuffix}">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>`;

    $('#additionalRowsContainer').append(newRow);

    $(`#removeRowButton-${uniqueSuffix}`).on('click', function() {
        $(`#row-${uniqueSuffix}`).remove();
    });

    initializeDateRangePicker(`#dateRange-${uniqueSuffix}`, `#nights-${uniqueSuffix}`);}

$('#addRowButton').click(function(e) {
    e.preventDefault();
    addNewRow();
});

$('#additionalRowsContainer').on('click', '.removeRowButton', function() {
    $(this).closest('.form-row').remove();
});
let selectedDateRanges = [];

function initializeDateRangePicker(dateRangeSelector, nightsSelector) {
    var today = moment().startOf('day'); // Use moment.js to get the current date

    $(dateRangeSelector).daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        autoUpdateInput: false,
        minDate: today, // Disable previous dates
        isInvalidDate: function(date) {
            return date.isBefore(today, 'day');
        }
    });

    $(dateRangeSelector).on('apply.daterangepicker', function(ev, picker) {
        var startDate = picker.startDate;
        var endDate = picker.endDate;
        var selectedRange = startDate.format('YYYY-MM-DD') + ' - ' + endDate.format('YYYY-MM-DD');

        // Check for overlapping or duplicate date ranges
        if (isDateRangeDuplicate(startDate, endDate)) {
            alert('This date range overlaps or is already selected in another row. Please choose a different range.');
            $(this).val(''); // Clear the input
            $(nightsSelector).val('');
            return;
        }

        // Store the selected date range
        selectedDateRanges.push({ startDate: startDate, endDate: endDate });

        // Calculate the number of nights
        var nights = endDate.diff(startDate, 'days') + 1;
        $(this).val(selectedRange);
        $(nightsSelector).val(nights);
    });

    $(dateRangeSelector).on('cancel.daterangepicker', function() {
        $(this).val('');
        $(nightsSelector).val('');
    });

    $(document).on('click', '.removeRowButton', function() {
        var row = $(this).closest('.form-row');
        var dateRange = row.find(dateRangeSelector).val();
        removeSelectedDateRange(dateRange); // Remove the date range from the selectedDateRanges array when the row is removed
        row.remove();
    });
}

function isDateRangeDuplicate(startDate, endDate) {
    var isDuplicate = false;
    selectedDateRanges.forEach(function(range) {
        if (
            (startDate.isSameOrBefore(range.endDate) && endDate.isSameOrAfter(range.startDate))
        ) {
            isDuplicate = true;
        }
    });
    return isDuplicate;
}

function removeSelectedDateRange(dateRange) {
    if (!dateRange) return;

    let [start, end] = dateRange.split(' - ').map(date => moment(date));
    selectedDateRanges = selectedDateRanges.filter(function(range) {
        return !(start.isSame(range.startDate) && end.isSame(range.endDate));
    });
}

});
$('#calculateubl').on('click', function() {
    $('#hotelDetailsSection .container').empty();
    $('#additionalRowsContainer .form-row').each(function() {
        var formRow = $(this);
        var hotelId = formRow.find('.location').val();
        var dateRange = formRow.find('.dateRange').val();
        var uniqueSuffix = formRow.attr('id').split('-')[1];
        var totalperson = $('#numberofperson').val()

        if (hotelId && dateRange) {
            $.ajax({
                url: '{{ route('getRoomPrices') }}',
                type: 'GET',
                data: {
                    hotel_city: hotelId,
                    dateRange: dateRange,
                    totalperson: totalperson,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        console.log(response);

                        var prices = response.prices;
                        var dateRange = response.date_range;
                        var numDays = response.num_days;
                        var hoteldistance = response.hotel_distance;
                        var hotelStars = response.hotel_stars;



                        $(`#nights-${uniqueSuffix}`).val(numDays);
                        $('#hotelDetailsSection').show();

                        var groupedHotels = prices.reduce(function(groups, hotel) {
                            var packageName = hotel.package_name || 'No Package';
                            var city = hotel.hotel_city.toLowerCase();

                            if (!groups[packageName]) {
                                groups[packageName] = { makkah: [], madina: [] };
                            }

                            if (city === 'makkah') {
                                groups[packageName].makkah.push(hotel);
                            } else if (city === 'madina') {
                                groups[packageName].madina.push(hotel);
                            }

                            return groups;
                        }, {});

                        Object.keys(groupedHotels).forEach(function(packageName) {
                            var packageHotels = groupedHotels[packageName];
                            var $packageSection = $(`#package-${packageName}`);

                            if ($packageSection.length === 0) {
                                var packageSectionHtml = `
                                    <div class="card package-details" id="package-${packageName}">
                                        <div class="card-header">
                                            <h3>Package: ${packageName}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                  <h4 class="hotel-name">Makkah Hotels</h4>
                                                    <div id="makkah-hotels-${packageName}"></div>
                                                </div>
                                                <div class="col-md-6">
                                                 <h4 class="hotel-name">Madina Hotels</h4>
                                                    <div id="madina-hotels-${packageName}"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                $('#hotelDetailsSection .container').append(packageSectionHtml);
                            }

                            packageHotels.makkah.forEach(function(hotel) {
                                var hotelName = hotel.hotel_name;
                                var hotelStars = hotel.hotel_star || 'N/A';
                                var roomPrices = hotel.prices;
                                var hotelPicture = hotel.picture || '';
                                var hoteldistance = hotel.hotel_distance;


                                var hotelDetailsHtml = `
    <div class="card booking-card">
        <div class="row no-gutters">
            <div class="col-md-3">
                <img src="${hotelPicture}" class="card-img-top img-fluid" alt="${hotelName}">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title">${hotelName} (Makkah)</h5>
                    <p class="star-rating text-warning">${'★'.repeat(hotelStars)}</p>
                    <p class="card-text"><strong>Date: ${dateRange}</strong></p>
                    <p class="card-text"><strong>Distance from Hotel to Haram pak: ${hoteldistance} K.m</strong></p>
                    <p class="card-text">Number of Nights: ${numDays}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Double</th>
                                <th>Triple</th>
                                <th>Quad</th>
                                <th>Quint</th>
                                <th>Sharing</th>
                            </tr>
                        </thead>
                        <tbody class="room-prices-${packageName}">
                            <tr>
                                <td class="price-double-${packageName}"></td>
                                <td class="price-triple-${packageName}"></td>
                                <td class="price-quad-${packageName}"></td>
                                <td class="price-quint-${packageName}"></td>
                                <td class="price-sharing-${packageName}"></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- "View details" button moved below the table -->
                    <a href="#" data-hotel-id="${hotel.id}" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary book-now" style="margin-top: 10px;">View details</a>
                </div>
            </div>
        </div>
    </div>
`;

                                $(`#makkah-hotels-${packageName}`).append(hotelDetailsHtml);

                                roomPrices.forEach(function(room) {
                                    var roomType = room.room_type.toLowerCase();
                                    var pricePerPerson = room.price_per_person || 0;

                                    if (roomType.includes('sharing')) {
                                        $(`.price-sharing-${packageName}`).text(`SAR${pricePerPerson}`);
                                    } else if (roomType.includes('quint')) {
                                        $(`.price-quint-${packageName}`).text(`SAR${pricePerPerson}`);
                                    } else if (roomType.includes('triple')) {
                                        $(`.price-triple-${packageName}`).text(`SAR${pricePerPerson}`);
                                    } else if (roomType.includes('quad')) {
                                        $(`.price-quad-${packageName}`).text(`SAR${pricePerPerson}`);
                                    } else if (roomType.includes('double')) {
                                        $(`.price-double-${packageName}`).text(`SAR${pricePerPerson}`);
                                    }
                                });
                            });

                            packageHotels.madina.forEach(function(hotel) {
                                var hotelName = hotel.hotel_name;
                                var hotelStars = hotel.hotel_stars || 'N/A';
                                var roomPrices = hotel.prices;
                                var hotelPicture = hotel.picture || '';
                                var hoteldistance = hotel.hotel_distance;


                                var hotelDetailsHtml = `
    <div class="card booking-card">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="${hotelPicture}" class="card-img-top img-fluid" alt="${hotelName}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">${hotelName} (Madina)</h5>
                    <p class="star-rating text-warning">${'★'.repeat(hotelStars)}</p>
                    <p class="card-text"><strong>Date: ${dateRange}</strong></p>
                    <p class="card-text"><strong>Distance from Hotel to Madina pak: ${hoteldistance} K.m</strong></p>
                    <p class="card-text">Number of Nights: ${numDays}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Double</th>
                                <th>Triple</th>
                                <th>Quad</th>
                                <th>Quint</th>
                                <th>Sharing</th>
                            </tr>
                        </thead>
                        <tbody class="room-prices-${packageName}">
                            <tr>
                                <td class="price-double-${packageName}"></td>
                                <td class="price-triple-${packageName}"></td>
                                <td class="price-quad-${packageName}"></td>
                                <td class="price-quint-${packageName}"></td>
                                <td class="price-sharing-${packageName}"></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- "View details" button moved below the table -->
                    <a href="#" data-hotel-id="${hotel.id}" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary book-now" style="margin-top: 10px;">View details</a>
                </div>
            </div>
        </div>
    </div>
`;

                                $(`#madina-hotels-${packageName}`).append(hotelDetailsHtml);

                                roomPrices.forEach(function(room) {
                                    var roomType = room.room_type.toLowerCase();
                                    var pricePerPerson = room.price_per_person || 0;

                                    if (roomType.includes('sharing')) {
                                        $(`.price-sharing-${packageName}`).text(`SAR${pricePerPerson}`);
                                    } else if (roomType.includes('quint')) {
                                        $(`.price-quint-${packageName}`).text(`SAR${pricePerPerson}`);
                                    } else if (roomType.includes('triple')) {
                                        $(`.price-triple-${packageName}`).text(`SAR${pricePerPerson}`);
                                    } else if (roomType.includes('quad')) {
                                        $(`.price-quad-${packageName}`).text(`SAR${pricePerPerson}`);
                                    } else if (roomType.includes('double')) {
                                        $(`.price-double-${packageName}`).text(`SAR${pricePerPerson}`);
                                    }
                                });
                            });
                        });
                    } else {
                        console.error('Error fetching room prices:', response.message);
                    }


                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }
    });
});


$(document).on('click', '.book-now', function() {
    let id = $(this).data('hotel-id');
    console.log(id);

    $.ajax({
        url: '{{ route('hoteldetails') }}',
        method: 'GET',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                console.log(response);

                $('.hotel_name').text(response.hotel.hotel_name);
                $('.star-rating').text('★'.repeat(response.hotel.hotel_star));
                $('.hotel_details').text(response.hotel.hotel_details);
                $('.email').html('<strong>Email:</strong> ' + response.hotel.emails);
                $('.phone_number').html( '<strong>Phone number:</strong> ' +response.hotel.phone_numbers);
                $('.address').html( '<strong>Address :</strong> ' + response.hotel.addresses);

                $('#imageThumbnails').empty();
                $('#selectedImage').attr('src', '');

                $('#galleryImages').empty();

                let images = response.images.slice(0, 15);
                images.forEach((image, index) => {
                    let thumbnail = `<img src="{{ asset('images/hotels') }}/${image.hotel_picture}" alt="${response.hotel.hotel_name}" data-image-src="{{ asset('images/hotels') }}/${image.hotel_picture}" class="${index === 0 ? 'selected' : ''}" />`;
                    $('#imageThumbnails').append(thumbnail);

                    if (index === 0) {
                        $('#selectedImage').attr('src', `{{ asset('images/hotels') }}/${image.hotel_picture}`);
                    }

                    let galleryImage = `<div class="gallery-image"><img src="{{ asset('images/hotels') }}/${image.hotel_picture}" alt="${response.hotel.hotel_name}" /></div>`;
                    $('#galleryImages').append(galleryImage);
                });

                $('#imageThumbnails img').on('click', function() {
                    $('#imageThumbnails img').removeClass('selected');
                    $(this).addClass('selected');
                    let src = $(this).data('image-src');
                    $('#selectedImage').attr('src', src);
                });

                $('#hotelCarousel .carousel-inner').empty();
                images.forEach((image, index) => {
                    let activeClass = index === 0 ? 'active' : '';
                    let carouselItem = `
                        <div class="carousel-item ${activeClass}">
                            <img src="{{ asset('images/hotels/') }}/${image.hotel_picture}" class="d-block w-100" alt="${response.hotel.hotel_name}">
                        </div>`;
                    $('#hotelCarousel .carousel-inner').append(carouselItem);
                });

                let roomPriceTable = `
                    <table class="table table-bordered">
                                                      <thead>
                                                       <th>Sharing</th>
                                                    <th>Quint</th>
                                                    <th>Triple</th>
                                                    <th>Quad</th>
                                                    <th>Double</th>
                                                        </thead>
                                                       <tbody class="room-prices">
                                                            <tr>
                                                                <td>SAR${response.dailyPrices.sharing}</td>
                                <td>SAR${response.dailyPrices.quint}</td>
                                <td>SAR${response.dailyPrices.triple}</td>
                                <td>SAR${response.dailyPrices.quad}</td>
                                <td>SAR${response.dailyPrices.double}</td>
                                                            </tr>
                                                        </tbody>

                    </table>`;

                $('.hotel_price_table').html(roomPriceTable);
            }
        }
    });
});






$('#visaPriceWithTransportCheckbox').change(function() {
    if ($(this).is(':checked')) {
        $.ajax({
            url: '{{ route('getVisaPrice') }}',
            type: 'GET',
            data: {
                visaType: 'Ummrah',
                transportIncluded: true,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    console.log('Visa Price with Transport:', response.visaPriceWithTransport);

                    $('#visaPriceWithTransportInputCheckbox').val(response.visaPriceWithTransport);
                    $('#visa-price-container-checkbox').hide();
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    } else {
        $('#visaPriceWithTransportInputCheckbox').val('');
    }
});




    </script>

<script>
    $('#ziaratDropdown').change(function() {
        var selectedZiarat = $(this).val();

        if (selectedZiarat) {
            const url = "{{ route('ziarat.price', ':name') }}".replace(':name', selectedZiarat);

            if (selectedZiarat === 'Both') {
                fetch("{{ route('ziarat.price', 'Makkah') }}")
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok for Makkah');
                        }
                        return response.json();
                    })
                    .then(dataMakkah => {
                        var makkahPrice = dataMakkah.price || 0;
                        $('#makkah').val(makkahPrice);

                        return fetch("{{ route('ziarat.price', 'Madina') }}");
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok for Madina');
                        }
                        return response.json();
                    })
                    .then(dataMadina => {
                        var madinaPrice = dataMadina.price || 0;
                        $('#madina').val(madinaPrice);


                        var totalPrice = parseFloat($('#makkah').val()) + parseFloat($('#madina').val());
                        $('#totalPrice').val(totalPrice);
                    })
                    .catch(error => console.error('Error fetching price:', error));
            } else {
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        var price = data.price || 0;

                        if (selectedZiarat === 'Makkah') {
                            $('#makkah').val(price);
                            $('#ziarat-madina-price-container').hide();
                            $('#totalPrice').val(price);
                        } else if (selectedZiarat === 'Madina') {
                            $('#madina').val(price);
                            $('#ziarat-makkah-price-container').hide();
                            $('#totalPrice').val(price);
                        }
                    })
                    .catch(error => console.error('Error fetching price:', error));
            }
        } else {
            $('#ziarat-makkah-price-container').hide();
            $('#ziarat-madina-price-container').hide();
            $('#total-price-container').hide();
            $('#totalPrice').val(0);
        }
    });


$(document).ready(function() {
    $('#visaPriceWithTransportCheckbox').on('change', function() {
        if ($(this).is(':checked')) {
            $('#transportFieldsContainer').show();
        } else {
            $('#transportFieldsContainer').hide();
        }
    });
});









function initializeDateRangePicker(selector) {
    let today = moment().startOf('day');  // Get today's date

    $(selector).daterangepicker({
        autoUpdateInput: false,
        minDate: today,
        locale: {
            cancelLabel: 'Clear',
            format: 'YYYY-MM-DD'
        }
    }).on('apply.daterangepicker', function(ev, picker) {
        let selectedDateRange = picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD');
        let overlap = getOverlappingRange(selectedDateRange, selector);

        if (overlap) {
            let newStartDate = moment(overlap.endDate).add(1, 'days').format('YYYY-MM-DD');
            let newRange = newStartDate + ' to ' + picker.endDate.format('YYYY-MM-DD');

            if (newStartDate <= picker.endDate.format('YYYY-MM-DD')) {
                alert(`The selected date range overlaps with an existing one. Only the non-overlapping dates (${newRange}) will be added.`);
                $(this).val(newRange);
            } else {
                alert("The selected date range has already been chosen. Please select a different date range.");
                $(this).val('');
            }
        } else {
            $(this).val(selectedDateRange);
        }

        let nights = picker.endDate.diff(picker.startDate, 'days') + 1;

        $('#night').val(nights);

        let parentRow = $(this).closest('.form-row');
        parentRow.find('.nights').val(nights);  // Correct selector for dynamic rows

        $('.nig').val(nights);

    }).on('cancel.daterangepicker', function() {
        $(this).val('');
        let parentRow = $(this).closest('.form-row');
        parentRow.find('.nights').val('');

        $('.nig').val('');
    });
}

function getOverlappingRange(selectedDateRange, currentSelector) {
    let [selectedStart, selectedEnd] = selectedDateRange.split(' to ').map(date => moment(date));
    let overlappingRange = null;

    let mainDateRange = $('#dateRange').val();
    if (mainDateRange && currentSelector !== '#dateRange') {
        let [mainStart, mainEnd] = mainDateRange.split(' to ').map(date => moment(date));
        if (selectedStart.isSameOrBefore(mainEnd) && selectedEnd.isSameOrAfter(mainStart)) {
            overlappingRange = {
                startDate: mainStart,
                endDate: mainEnd
            };
            return overlappingRange;
        }
    }

    $('.dateRange').each(function() {
        if (this.id !== currentSelector.replace('#', '')) {
            let [rangeStart, rangeEnd] = $(this).val().split(' to ').map(date => moment(date));
            if (selectedStart.isSameOrBefore(rangeEnd) && selectedEnd.isSameOrAfter(rangeStart)) {
                overlappingRange = {
                    startDate: rangeStart,
                    endDate: rangeEnd
                };
                return false;
            }
        }
    });

    return overlappingRange;
}


initializeDateRangePicker('#dateRange');



    const roomDropdown = document.getElementById("roomDropdown");
const counter = document.getElementById("counter");
const addButton = document.getElementById("addcounter");
const subtractButton = document.getElementById("subtractRowButton");

function isRoomTypeSelected() {
    return roomDropdown.value !== '';
}




addButton.addEventListener("click", () => {
    if (isRoomTypeSelected()) {
        const currentValue = parseInt(counter.textContent);
        counter.textContent = currentValue + 1;
    } else {
        alert("Please select a room type before adding.");
    }
});


subtractButton.addEventListener("click", () => {
    if (isRoomTypeSelected()) {
        const currentValue = parseInt(counter.textContent);
        if (currentValue > 1) {
            counter.textContent = currentValue - 1;
        }
    } else {
        alert("Please select a room type before subtracting.");
    }
});


function debounce(func, wait) {
                let timeout;
                return function(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func.apply(this, args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            $('.location').change(function() {
                var hotelId = $(this).val();

                if (hotelId) {
                    $.ajax({
                        url: '{{ route('getHotelDetailsById') }}',
                        method: 'GET',
                        data: {
                            hotel_id: hotelId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.error) {
                                console.error(response.error);
                                return;
                            }

                            var hotel = response.hotel;
                            fetchRoomPrices();
                            var hotelDetailsHtml = `
                            <div class="card booking-card">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="${hotel.picture}" class="card-img-top" alt="${hotel.name}" class="img-fluid">
                                    </div>
                                    <div class="col-md-8 d-flex flex-column">
                                        <div class="card-body flex-grow-1">
                                            <h5 class="card-title">${hotel.name}</h5>
                                            <p class="star-rating text-warning">${'★'.repeat(hotel.star)}</p>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="#" data-hotel-id="${hotel.id}" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary book-now">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                            $('#booking-details').html(hotelDetailsHtml);
                        },
                        error: function(xhr) {
                            console.error("Error fetching hotel details:", xhr.responseText);
                        }
                    });
                } else {
                    $('#booking-details').html('');
                }
            });


            $(document).on('change', '.location', debounce(function() {
                var locationId = $(this).val();
                var hotelDropdown = $(this).closest('.form-row').find('.hotel');

                hotelDropdown.html('<option value="">Select Hotel</option>');

                if (locationId) {
                    $.ajax({
                        url: '{{ url('/get-hotels') }}',
                        type: 'GET',
                        data: {
                            ziarat: locationId
                        },
                        success: function(response) {
                            response.forEach(hotel => {
                                hotelDropdown.append(
                                    `<option value="${hotel.id}">${hotel.hotel_name}</option>`
                                );
                            });
                        },
                        error: function(error) {
                            console.error('Error fetching hotels:', error);
                        }
                    });
                }
            }, 300));




//             document.getElementById('checkInDate').addEventListener('change', calculateNights);
// document.getElementById('checkOutDate').addEventListener('change', calculateNights);

// function calculateNights() {
//     var checkInDate = new Date(document.getElementById('checkInDate').value);
//     var checkOutDate = new Date(document.getElementById('checkOutDate').value);

//     if (checkInDate && checkOutDate && checkOutDate > checkInDate) {
//         var timeDifference = checkOutDate.getTime() - checkInDate.getTime();
//         var nights = timeDifference / (1000 * 3600 * 24);
//         document.getElementById('nights').value = nights;
//     } else {
//         document.getElementById('nights').value = 0;
//     }
// }


$(document).ready(function() {
    function collectFormData() {
        var formData = [];

        $('#additionalRowsContainer .form-row').each(function() {
            var row = $(this);
            var location = row.find('.location').val();
            var hotel = row.find('.hotel').val();
            var dateRange = row.find('.dateRange').val();
            var roomType = row.find('.roomDropdown').val();
            var nights = row.find('.nights').val();
            var counter = row.find('.counter').text();

            if(location && hotel && dateRange && roomType && nights && counter) {
                formData.push({
                    location: location,
                    hotel: hotel,
                    dateRange: dateRange,
                    roomType: roomType,
                    nights: nights,
                    counter: counter
                });
            }
        });

        var visaPrice = $('#visaPriceCheckbox').is(':checked') ? 1 : 0;
        var visaPriceWithTransport = $('#visaPriceWithTransportCheckbox').is(':checked') ? 1 : 0;
        var additionalInput = $('#additionalInputField').val();

        return {
            formData: formData,
            visaPrice: visaPrice,
            visaPriceWithTransport: visaPriceWithTransport,
            additionalInput: additionalInput
        };
    }

    $('#calculateTotalPriceBtn').on('click', function(e) {
        e.preventDefault();
        var data = collectFormData();
        console.log(data);  // Ensure the data is correct

        $.ajax({
            url: '{{ route("storeFormData") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                data: data
            },
            success: function(response) {
                if(response.success) {
                    alert('Data stored successfully!');
                    // Handle the display of stored data
                } else {
                    alert('Failed to store data.');
                }
            },
            error: function(xhr) {
                alert('An error occurred. Please try again.');
                console.error(xhr.responseText);  // Log any server error
            }
        });
    });
});








</script>




</body>

</html>
