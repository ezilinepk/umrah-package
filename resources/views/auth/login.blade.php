<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking.com</title>

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

        .content {
            text-align: center;
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
            max-width: 1000px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            color: black
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
            height: 200px;
            object-fit: cover;
        }

        .booking-card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
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




    </style>
</head>

<body>
    <header>
        <div class="container-fluid header">
            <div class="logo-container">
                <img src="{{ asset('assets/dummy/booking-com-2048.png') }}" alt="Primary Logo" style="height: 150px;">
            </div>
            <div class="auth-buttons">
                <a href="{{ route('ulogin') }}" class="btn btn-outline-primary">Sign In</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="bg-img">
            <div >
                <h1 id="hero-banner-header1" class="fade-in" data-selenium="hero-banner-h1">Mecca hotels & places to stay</h1>
                <h2 id="hero-banner-header2" class="fade-in hero-banner-header2" data-selenium="hero-banner-h2">
                    Search to compare prices and discover great deals with free cancellation
                </h2>

                <div class="container">
                    <div class="search-form">
                        <form id="search-form">
                            <div class="form-row">
                                <div class="form-group col-md-3 col-sm-6 col-12">
                                    <label for="ziaratName" style="color: black">Location</label>
                                    <select class="form-control" id="ziaratName">
                                        <option value="">Select Location</option>
                                        <option value="Makkah">Makkah</option>
                                        <option value="Madina">Madina</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 col-sm-6 col-12">
                                    <label for="location" style="color: black">Hotel Name</label>
                                    <select class="form-control" id="location">
                                        <option value="">Select Hotel</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 col-sm-6 col-12">
                                    <label for="dateRange" style="color: black">Check-in / Check-out</label>
                                    <input type="text" class="form-control" id="dateRange">
                                </div>

                                <div class="form-group col-md-3 col-sm-6 col-12 d-flex align-items-end">
                                    <div class="w-100">
                                        <label for="roomDropdown" style="color: black">Room Type</label>
                                        <div class="input-group">
                                            <select class="form-control" id="roomDropdown">
                                                <option value="">Select room type and quantity</option>
                                                <option value="Sharing">Sharing</option>
                                                <option value="Double">Double</option>
                                                <option value="Triple">Triple</option>
                                                <option value="Quint">Quint</option>
                                            </select>
                                            <div class="input-group-append">
                                                <a class="btn btn-sm btn-primary" id="addRowButton">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="additionalRowsContainer"></div>

                            <div class="form-row" style="margin-left: 4px; ">
                                <div class="col-md-3">
                                    <label for="visa" class="form-label" style="color: black">Visa</label>
                                    <div class="input-group">
                                        <select class="form-control" id="visaDropdown">
                                            <option value="">Select Visa</option>
                                            <option value="visaPrice">Only Visa</option>
                                            <option value="visaPriceWithTransport">Visa Price with Transport</option>
                                        </select>
                                    </div>
                                    <div id="visa-price-container" class="mt-2" style="display: none;">
                                        <label for="visaPrice" class="form-label">Visa Price</label>
                                        <input type="hidden" id="visaPrice" class="form-control" value="0">
                                    </div>
                                    <div id="visa-price-with-transport-container" class="mt-2" style="display: none;">
                                        <label for="visaPriceWithTransport" class="form-label">Visa Price with Transport</label>
                                        <input type="hidden" id="visaPriceWithTransport" class="form-control" value="0">
                                    </div>
                                </div>

                                <div class="col-md-3" >
                                    <label for="ziarat" class="form-label" style="color: black">Ziarat</label>
                                    <div class="input-group">
                                        <select class="form-control" id="ziaratDropdown">
                                            <option value="">Select Ziarat</option>
                                            <option value="Makkah">Makkah</option>
                                            <option value="Madina">Madina</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>

                                    <div id="ziarat-makkah-price-container" class="mt-2" style="display: none;">
                                        <label for="makkah" class="form-label">Makkah Price</label>
                                        <input type="hidden" id="makkah" class="form-control" value="0">
                                    </div>
                                    <div id="ziarat-madina-price-container" class="mt-2" style="display: none;">
                                        <label for="madina" class="form-label">Madina Price</label>
                                        <input type="hidden" id="madina" class="form-control" value="0">
                                    </div>
                                    <div id="total-price-container" class="mt-2" style="display: none;">
                                        <label for="totalPrice" class="form-label">Total Price</label>
                                        <input type="hidden" id="totalPrice" class="form-control" value="0" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4" id="estimateTotalPriceContainer" style="display: none;">
                                    <label for="estimateTotalPrice" style="color: black">Estimated Total Price (PKR)</label>
                                    <input type="text" id="estimateTotalPrice" class="form-control estimate-total-price" value="0" readonly>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hotelDetails" id="hotelDetailsSection" style="display: none;">
        <div class="container">
            <div class="booking-details" id="booking-details" >
                <div id="makkah-hotels" class="hotel-list" >
                    <div class="card">
                        <div class="card-header">
                            <h3>Makkah Hotels</h3>
                        </div>
                    </div>
                </div>
                <div id="madina-hotels" class="hotel-list">
                    <div class="card">
                        <div class="card-header">
                            <h3>Madina Hotels</h3>
                        </div>
                    </div>
                </div>
            </div>
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
        document.addEventListener("DOMContentLoaded", function() {
            const locationDropdown = document.getElementById('location');
            const ziaratNameDropdown = document.getElementById('ziaratName');

            ziaratNameDropdown.addEventListener('change', function() {
                const selectedZiarat = this.value;

                locationDropdown.innerHTML = '<option value="">Select Hotel</option>';

                if (selectedZiarat) {
                    fetch(`{{ url('/get-hotels') }}?ziarat=${selectedZiarat}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(hotel => {
                                const option = document.createElement('option');
                                option.value = hotel.id;
                                option.textContent = hotel.hotel_name;
                                locationDropdown.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error fetching hotels:', error));
                }
            });
        });



        $(document).ready(function() {
    function fetchRoomPrices(hotelId) {
        var hotelName = $('#location').val();
        var dateRange = $('#dateRange').val();
        var roomType = $('#roomDropdown').val();
        var visaPrice = parseFloat($('#visaPrice').val()) || 0;
        var visaPriceWithTransport = parseFloat($('#visaPriceWithTransport').val()) || 0;
        var ziaratPrice = parseFloat($('#totalPrice').val()) || 0;

        if (hotelName && dateRange && roomType) {
            $.ajax({
                url: '{{ route('getRoomPrices') }}',
                type: 'GET',
                data: {
                    hotel_name: hotelName,
                    dateRange: dateRange,
                    roomType: roomType,
                    visaPrice: visaPrice,
                    visaPriceWithTransport: visaPriceWithTransport,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        console.log(response);

                        var roomPrices = response.roomPrices;
                        var totalPrices = response.totalPrices;
                        var dailyPrices = response.dailyPrices;
                        var visaPrice = response.visaPrice || 0;
                        var visaPriceWithTransport = response.visaPriceWithTransport || 0;
                        var dateRange = response.dateRange;

                        updateHotelDetails(hotelId, roomPrices, totalPrices, dailyPrices,
                            visaPrice, visaPriceWithTransport, ziaratPrice , dateRange);
                    } else {
                        console.error('Error fetching room prices:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }
    }

    function updateHotelDetails(hotelId, roomPrices, totalPrices, dailyPrices, visaPrice, visaPriceWithTransport, ziaratPrice, dateRange) {
    $.ajax({
        url: '{{ route('getHotelDetailsById') }}',
        method: 'GET',
        data: {
            hotel_id: hotelId,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.error) {
                console.error('Error fetching hotel details:', response.error);
                return;
            }

            var hotel = response.hotel;
            var totalPrice = totalPrices[hotelId] ? parseFloat(totalPrices[hotelId].replace(/,/g, '')).toFixed(2) : '0.00';
            var grandTotalPrice = parseFloat(totalPrice) + ziaratPrice;

            var currentTotal = parseFloat($('#estimateTotalPrice').val()) || 0;
            var newTotal = currentTotal + grandTotalPrice;
            $('#estimateTotalPrice').val(newTotal.toFixed(2));

            $('#estimateTotalPriceContainer').show();

            var hotelDetailsHtml = `
                <div class="card booking-card">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="${hotel.picture}" class="card-img-top img-fluid" alt="${hotel.name}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${hotel.name}</h5>
                                <p class="star-rating text-warning">${'★'.repeat(hotel.star)}</p>
                                <p class="card-text"><strong>Date: ${dateRange}</strong></p>
                                <div class="price-info">

                                </div>
                                <a href="#" data-hotel-id="${hotel.id}" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary book-now">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $('#hotelDetailsSection').show();
            if (hotel.city.toLowerCase() === 'makkah') {
                $('#makkah-hotels ').append(hotelDetailsHtml);
            } else if (hotel.city.toLowerCase() === 'madina') {
                $('#madina-hotels ').append(hotelDetailsHtml);
            }
        },
        error: function(xhr) {
            console.error("Error fetching hotel details:", xhr.responseText);
        }
    });

}

function updateEstimatedTotalPrice(totalPrices) {
    var currentTotal = parseFloat($('#estimateTotalPrice').val()) || 0;
    for (var hotelId in totalPrices) {
        if (totalPrices.hasOwnProperty(hotelId)) {
            var price = parseFloat(totalPrices[hotelId].replace(/,/g, '')) || 0;
            currentTotal += price;
        }
    }

    $('#estimateTotalPrice').val(currentTotal.toFixed(2));
    $('#estimateTotalPriceContainer').show();
}



            function initializeDateRangePicker(selector) {
                $(selector).daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear',
                        format: 'YYYY-MM-DD'
                    }
                }).on('apply.daterangepicker', function(ev, picker) {
                    let selectedDateRange = picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate
                        .format('YYYY-MM-DD');
                    let overlap = getOverlappingRange(selectedDateRange, selector);

                    if (overlap) {
                        let newStartDate = moment(overlap.endDate).add(1, 'days').format('YYYY-MM-DD');
                        let newRange = newStartDate + ' to ' + picker.endDate.format('YYYY-MM-DD');

                        if (newStartDate <= picker.endDate.format('YYYY-MM-DD')) {
                            alert(
                                `The selected date range overlaps with an existing one. Only the non-overlapping dates (${newRange}) will be added.`);
                            $(this).val(newRange);
                        } else {
                            alert(
                                "The selected date range has already been chosen. Please select a different date range.");
                            $(this).val('');
                        }
                    } else {
                        $(this).val(selectedDateRange);
                    }

                    fetchRoomPrices();
                }).on('cancel.daterangepicker', function() {
                    $(this).val('');
                    fetchRoomPrices();
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
                        if (selectedStart.isSameOrBefore(rangeEnd) && selectedEnd.isSameOrAfter(
                            rangeStart)) {
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

            $('#roomDropdown').change(function() {
                fetchRoomPrices($('#location').val());
            });

            $(document).ready(function() {
                function addNewRow() {
                    var rowCount = $('#additionalRowsContainer .form-row').length;
                    var uniqueSuffix = Date.now();
                    var newRow = `
            <div class="form-row" data-row-id="${rowCount + 1}" id="row-${uniqueSuffix}">
                <div class="form-group col-md-3 col-sm-6 col-12">
                    <label for="location-${rowCount + 1}" style="color: black">Location</label>
                    <select class="form-control location" id="location-${uniqueSuffix}" style="width: 234px;">
                        <option value="">Select location</option>
                        <option value="Makkah">Makkah</option>
                        <option value="Madina">Madina</option>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-6 col-12" style="width: 323px; margin-left: -1px;">
                    <label for="hotel-${rowCount + 1}" style="color: black">Hotel Name</label>
                    <select class="form-control hotel" id="hotel-${uniqueSuffix}">
                        <option value="">Select Hotel</option>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-6 col-12">
                    <label for="dateRange-${rowCount + 1}" style="color: black">Check-in / Check-out</label>
                    <input type="text" class="form-control dateRange" id="dateRange-${uniqueSuffix}">
                </div>

                <div class="form-group col-md-3 col-sm-6 col-12 d-flex align-items-end">
                    <div class="w-100">
                        <label for="roomDropdown-${rowCount + 1}" style="color: black">Room Type</label>
                        <div class="input-group">
                            <select class="form-control roomDropdown" id="roomDropdown-${uniqueSuffix}">
                                <option value="">Select room type</option>
                                <option value="Sharing">Sharing</option>
                                <option value="Double">Double</option>
                                <option value="Triple">Triple</option>
                                <option value="Quint">Quint</option>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-sm btn-danger removeRowButton" id="removeRowButton-${uniqueSuffix}"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;

                    $('#additionalRowsContainer').append(newRow);
                    initializeDateRangePicker(`#dateRange-${uniqueSuffix}`);
                }

                $('#addRowButton').click(function(e) {
                    e.preventDefault();
                    addNewRow();
                });

                $('#additionalRowsContainer').on('click', '.removeRowButton', function() {
                    $(this).closest('.form-row').remove();
                });
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


            $(document).on('change', '.hotel, .dateRange, .roomDropdown', debounce(function() {
    var formRow = $(this).closest('.form-row');
    var hotelId = formRow.find('.hotel').val();
    var dateRange = formRow.find('.dateRange').val();
    var roomType = formRow.find('.roomDropdown').val();

    if (hotelId && dateRange && roomType) {
        fetchRoomPricesAndDetails(hotelId, dateRange, roomType);
    }
}, 300));

function fetchRoomPricesAndDetails(hotelId, dateRange, roomType) {
    $.ajax({
        url: '{{ route('getRoomPrices') }}',
        type: 'GET',
        data: {
            hotel_name: hotelId,
            dateRange: dateRange,
            roomType: roomType,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                console.log(response);

                var totalPrices = response.totalPrices;
                var hotelDetailsHtml = generateHotelDetailsHtml(
                    response.hotel,
                    response.roomPrices,
                    totalPrices,
                    response.dailyPrices,
                    response.visaPrice,
                    response.visaPriceWithTransport,
                    response.picture,
                    response.dateRange
                );

                $('#hotelDetailsSection').show();
                if (response.hotel.hotel_city === 'Makkah') {
                    $('#makkah-hotels ').append(hotelDetailsHtml);
                } else if (response.hotel.hotel_city === 'Madina') {
                    $('#madina-hotels ').append(hotelDetailsHtml);
                }

                // Optionally update estimated total price if needed
                updateEstimatedTotalPrice(totalPrices);
            } else {
                console.error('Error fetching room prices:', response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}



function generateHotelDetailsHtml(hotel, roomPrices, totalPrices, dailyPrices, visaPrice,
    visaPriceWithTransport, hotelPicture, dateRange) {

    var totalPrice = totalPrices[hotel.id] ? parseFloat(totalPrices[hotel.id]).toFixed(2) : '0.00';

    return `
        <div class="card booking-card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="${hotelPicture}" class="card-img-top img-fluid" alt="${hotel.hotel_name}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">${hotel.hotel_name}</h5>
                        <p class="star-rating text-warning">${'★'.repeat(hotel.hotel_star)}</p>
                        <p class="card-text"><strong>Date: ${dateRange}</strong></p>
                        <div class="price-info">

                        </div>
                        <a href="#" data-hotel-id="${hotel.id}" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary book-now" style="margin-top: 37px;">View</a>
                    </div>
                </div>
            </div>
        </div>`;
}


$(document).on('click', '.book-now', function() {
    let id = $(this).data('hotel-id');
    $.ajax({
        url: '{{ route('hoteldetails') }}',
        method: 'GET',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {

                $('.hotel_name').text(response.hotel.hotel_name);
                $('.star-rating').text('★'.repeat(response.hotel.hotel_star));
                $('.hotel_details').text(response.hotel.hotel_details);

                $('#imageThumbnails').empty();
                $('#selectedImage').attr('src', '');

                let images = response.images.slice(0, 15);
                images.forEach((image, index) => {
                    let thumbnail = `<img src="{{ asset('images/hotels') }}/${image.hotel_picture}" alt="${response.hotel.hotel_name}" data-image-src="{{ asset('images/hotels') }}/${image.hotel_picture}" class="${index === 0 ? 'selected' : ''}" />`;
                    $('#imageThumbnails').append(thumbnail);
                    if (index === 0) {
                        $('#selectedImage').attr('src', `{{ asset('images/hotels') }}/${image.hotel_picture}`);
                    }
                });

                $('#imageThumbnails img').on('click', function() {
                    $('#imageThumbnails img').removeClass('selected');
                    $(this).addClass('selected');
                    let src = $(this).data('image-src');
                    $('#selectedImage').attr('src', src);
                });

                $('#hotelCarousel .carousel-inner').empty();
                response.images.forEach((image, index) => {
                    let activeClass = index === 0 ? 'active' : '';
                    let carouselItem = `<div class="carousel-item ${activeClass}">
                        <img src="{{ asset('images/hotels/') }}/${image.hotel_picture}" class="d-block w-100" alt="${response.hotel.hotel_name}">
                    </div>`;
                    $('#hotelCarousel .carousel-inner').append(carouselItem);
                });

                let carousel = new bootstrap.Carousel('#hotelCarousel');
                carousel.cycle();
            }
        }
    });
});




            $(document).ready(function() {
                $('#visaDropdown').change(function() {
                    const selectedValue = $(this)
                        .val();

                    if (selectedValue === 'visaPrice') {
                        $.ajax({
                            url: '{{ route('getVisaPrice') }}',
                            type: 'GET',
                            data: {
                                visaType: 'Ummrah',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    $('#visaPrice').val(response.visaPrice);
                                    $('#visa-price-with-transport-container')
                                        .hide();
                                } else {
                                    $('#visa-price-container').hide();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                            }
                        });
                    } else if (selectedValue === 'visaPriceWithTransport') {
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
                                    $('#visaPriceWithTransport').val(
                                        response.visaPriceWithTransport);
                                    $('#visa-price-container').hide();
                                } else {
                                    $('#visa-price-with-transport-container')
                                        .hide();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                            }
                        });
                    } else {
                        $('#visaPrice').val('');
                        $('#visaPriceWithTransport').val('');
                        $('#visa-price-container').hide();
                        $('#visa-price-with-transport-container').hide();
                    }
                });
            });

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
</script>




</body>

</html>
