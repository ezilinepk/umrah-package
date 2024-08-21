
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
            /* Adjust the size as needed */
            margin-right: 10px;
            /* Space between logo and text */
        }

        .header .logo-container h4 {
            color: black;
            margin: 0;
            font-size: 24px;
            /* Adjust font size as needed */
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
            /* Adjust the opacity as needed */
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
            /* Ensure the image takes up full width of its container */
            height: 200px;
            /* Fixed height for images */
            object-fit: cover;
            /* Ensure images cover the container without distortion */
        }

        .booking-card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Ensure that the content is spaced out properly */
            padding: 20px;
            /* Padding inside the card */
        }

        .booking-card .card-body .btn {
            align-self: flex-end;
            /* Align the button to the right */
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
            /* Adjust spacing as needed */
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
                <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="bg-img">
            <div>
                <h1 id="hero-banner-header1" class="fade-in" data-selenium="hero-banner-h1">Mecca hotels &amp; places to
                    stay</h1>
                <h2 id="hero-banner-header2" class="fade-in hero-banner-header2" data-selenium="hero-banner-h2">Search
                    to compare prices and discover great deals with free cancellation</h2>

                    <div class="container">
                        <div class="search-form">
                            <form id="search-form">
                                <div class="form-row">
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="location">Location</label>
                                        <select class="form-control" id="location">
                                            <option value="">Select location</option>
                                            <option value="Makkah">Makkah</option>
                                            <option value="Madina">Madina</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="dateRange">Check-in / Check-out</label>
                                        <input type="text" class="form-control" id="dateRange">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="roomDropdown">Room Type</label>
                                        <select class="form-control" id="roomDropdown">
                                            <option value="">Select room type and quantity</option>
                                            <option value="Sharing">Sharing</option>
                                            <option value="Double">Double</option>
                                            <option value="Triple">Triple</option>
                                            <option value="Quint">Quint</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12 d-flex align-items-end">
                                        <a class="btn btn-sm btn-primary" id="addRowButton"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>

                                <div id="additionalRowsContainer"></div>

                                <div class="form-row mt-3">

                                    <input type="hidden" id="transport-price-hidden" >

                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="transport_airport_makkah" name="transport_options" value="airport_makkah" data-transport-type="bus" onchange="toggleTransportPrice(this)">
                                            <label class="form-check-label" for="transport_airport_makkah">Airport to Makkah</label>
                                            <input type="number" step="0.01" class="form-control mt-2 d-none" id="price_airport_makkah" name="price_airport_makkah" placeholder="Enter Price...">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="transport_makkah_madina" name="transport_options" value="makkah_madina" data-transport-type="bus" onchange="toggleTransportPrice(this)">
                                            <label class="form-check-label" for="transport_makkah_madina">Makkah to Madina</label>
                                            <input type="number" step="0.01" class="form-control mt-2 d-none" id="price_makkah_madina" name="price_makkah_madina" placeholder="Enter Price...">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="transport_madina_makkah" name="transport_options" value="madina_makkah" data-transport-type="bus" onchange="toggleTransportPrice(this)">
                                            <label class="form-check-label" for="transport_madina_makkah">Madina to Makkah</label>
                                            <input type="number" step="0.01" class="form-control mt-2 d-none" id="price_madina_makkah" name="price_madina_makkah" placeholder="Enter Price...">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="visaCheckbox" name="visa">
                                            <input type="hidden" id="visaPrice" value="0">
                                            <label class="form-check-label" for="visaCheckbox">Visa</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12 text-center">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
    <div class="hotelDetails">
        <div class="container">
            <div class="booking-details" id="booking-details">
                @foreach ($hotels as $hotel)

                @endforeach
            </div>
        </div>
    </div>




    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Daterangepicker JS -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        function toggleTransportPrice(element) {
            const transportType = $(element).data('transport-type');
            const isChecked = element.checked;

            if (isChecked) {
                $.ajax({
                    url: '{{ route("get.transport.price") }}',
                    type: 'GET',
                    data: { transport_type: transportType },
                    success: function(response) {
                        if (response[`price_${element.value}`]) {
                            var price = response[`price_${element.value}`];
                            console.log(`Price for ${element.value}:`, price);

                            $('#transport-price-hidden').val(price);  // Store the price in the hidden field
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching transport price:', error);
                    }
                });
            } else {
                console.log(`Checkbox for ${element.value} is unchecked.`);
                $('#transport-price-hidden').val(0);  // Reset the value if unchecked
            }
        }
        </script>

<script>
$(document).ready(function () {
    // Store requests by row ID
    var rowRequests = {};

    function handleFormSubmission(formSelector, locationSelector, dateRangeSelector, roomTypeSelector, visaPriceSelector, transportPriceSelector, route) {
        $(document).on('submit', formSelector, function (event) {
            event.preventDefault();

            var form = $(this);
            var rowId = form.closest('.form-row').data('row-id');
            var location = form.find(locationSelector).val();
            var dateRange = form.find(dateRangeSelector).val();
            var roomType = form.find(roomTypeSelector).val();
            var visaPrice = parseFloat(form.find(visaPriceSelector).val()) || 0;
            var searchKey = rowId + '|' + location + '|' + dateRange;

            console.log('Submitting form for rowId:', rowId);
            console.log('Search key:', searchKey);

            if (!rowRequests[searchKey]) {
                rowRequests[searchKey] = true;

                $.ajax({
                    url: route,
                    type: 'GET',
                    data: {
                        location: location,
                        dateRange: dateRange,
                        roomType: roomType,
                        visaPrice: visaPrice,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        console.log('Response received for:', searchKey);

                        if (response.hotels.length > 0) {
                            $('#booking-details').prepend(response.html);

                            $.ajax({
                                url: '{{ route('getRoomPrices') }}',
                                type: 'GET',
                                data: {
                                    hotel_city: location,
                                    dateRange: dateRange,
                                    roomType: roomType,
                                    visaPrice: visaPrice,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    console.log('Room prices response:', response);

                                    if (response.success) {
                                        var roomPrices = response.roomPrices;
                                        var totalPrices = response.totalPrices;
                                        var dailyPrices = response.dailyPrices;

                                        for (var hotelId in roomPrices) {
                                            if (roomPrices.hasOwnProperty(hotelId) && totalPrices.hasOwnProperty(hotelId) && dailyPrices.hasOwnProperty(hotelId)) {
                                                $('#daily-price-' + hotelId + ' span').text('Room Price per Day: $' + dailyPrices[hotelId]);
                                                $('#room-price-' + hotelId + ' span').text(roomPrices[hotelId]);

                                                var totalPrice = parseFloat(totalPrices[hotelId].replace(/,/g, '')) || 0;

                                                $('#total-price-' + hotelId + ' span').text(
                                                    'Including Visa: $' + visaPrice.toFixed(2) +
                                                    ' | Transport Price: $' + transportPrice.toFixed(2) +
                                                    ' | Total Price: $' + totalPrice.toFixed(2)
                                                );
                                            }
                                        }
                                    } else {
                                        console.error('Error fetching room prices:', response.message);
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error('AJAX Error:', status, error);
                                }
                            });
                        } else {
                            $('#booking-details').prepend('<p>No hotels found for the selected location.</p>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            }
        });
    }

    function addNewRow() {
        var rowCount = $('#additionalRowsContainer .form-row').length;
        var newRow =
            `<div class="form-row" data-row-id="${rowCount + 1}">
                <div class="form-group col-md-3">
                    <label for="location-${rowCount + 1}">Location</label>
                    <select class="form-control location" id="location-${rowCount + 1}">
                        <option value="">Select location</option>
                        <option value="Makkah">Makkah</option>
                        <option value="Madina">Madina</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="dateRange-${rowCount + 1}">Check-in / Check-out</label>
                    <input type="text" class="form-control dateRange" id="dateRange-${rowCount + 1}">
                </div>
                <div class="form-group col-md-3">
                    <label for="roomDropdown-${rowCount + 1}">Room Type</label>
                    <select class="form-control roomDropdown" id="roomDropdown-${rowCount + 1}">
                        <option value="">Select room type and quantity</option>
                        <option value="Sharing">Sharing</option>
                        <option value="Double">Double</option>
                        <option value="Triple">Triple</option>
                        <option value="Quint">Quint</option>
                    </select>
                </div>
                <div class="form-group col-md-3 d-flex align-items-end">
                    <a class="btn btn-sm btn-danger removeRowButton"><i class="fa fa-minus"></i></a>
                </div>
            </div>`;

        $('#additionalRowsContainer').append(newRow);

        // Initialize date range picker for the new row
        $('input.dateRange').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        }).on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
        }).on('cancel.daterangepicker', function () {
            $(this).val('');
        });

        handleFormSubmission('#search-form', '.location', '.dateRange', '.roomDropdown', '#visaPrice', '{{ route('getHotelsByLocationid') }}');
    }

    $('#addRowButton').click(function (e) {
        e.preventDefault();
        addNewRow();
    });

    // Event delegation for removing rows
    $('#additionalRowsContainer').on('click', '.removeRowButton', function () {
        $(this).closest('.form-row').remove();
    });

    // Initialize the date range picker for the initial form
    $('#dateRange').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('#dateRange').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
    });

    $('#dateRange').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });

    // Visa Checkbox Logic
    $('#visaCheckbox').change(function () {
        if ($(this).is(':checked')) {
            $.ajax({
                url: '{{ route('getVisaPrice') }}',
                type: 'GET',
                data: {
                    visaType: 'Ummrah',
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        $('#visaPrice').val(response.visaPrice);
                        $('#visa-price-container').show();
                    } else {
                        $('#visa-price-container').hide();
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        } else {
            $('#visaPrice').val('');
            $('#visa-price-container').hide();
        }
    });

    // Initialize the form submission for the initial form
    handleFormSubmission('#search-form', '#location', '#dateRange', '#roomDropdown', '#visaPrice',  '{{ route('getHotelsByLocationid') }}');
});


</script>




</body>

</html>









4























































































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
            /* Adjust the size as needed */
            margin-right: 10px;
            /* Space between logo and text */
        }

        .header .logo-container h4 {
            color: black;
            margin: 0;
            font-size: 24px;
            /* Adjust font size as needed */
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
            /* Adjust the opacity as needed */
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
            /* Ensure the image takes up full width of its container */
            height: 200px;
            /* Fixed height for images */
            object-fit: cover;
            /* Ensure images cover the container without distortion */
        }

        .booking-card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Ensure that the content is spaced out properly */
            padding: 20px;
            /* Padding inside the card */
        }

        .booking-card .card-body .btn {
            align-self: flex-end;
            /* Align the button to the right */
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
            /* Adjust spacing as needed */
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

.card-title, .card-text {
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
                <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="bg-img">
            <div>
                <h1 id="hero-banner-header1" class="fade-in" data-selenium="hero-banner-h1">Mecca hotels &amp; places to
                    stay</h1>
                <h2 id="hero-banner-header2" class="fade-in hero-banner-header2" data-selenium="hero-banner-h2">Search
                    to compare prices and discover great deals with free cancellation</h2>

                    <div class="container">
                        <div class="search-form">
                            <form id="search-form">
                                <div class="form-row">
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="hotel">Hotel</label>
                                        <select class="form-control" id="hotel">
                                            <option value="">Select hotel</option>
                                            @foreach ($hotels as $hotel)
                                                <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="dateRange">Check-in / Check-out</label>
                                        <input type="text" class="form-control" id="dateRange">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="roomDropdown">Room Type</label>
                                        <select class="form-control" id="roomDropdown">
                                            <option value="">Select room type and quantity</option>
                                            <option value="Sharing">Sharing</option>
                                            <option value="Double">Double</option>
                                            <option value="Triple">Triple</option>
                                            <option value="Quint">Quint</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12 d-flex align-items-end">
                                        <a class="btn btn-sm btn-primary" id="addRowButton"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>

                                <div id="additionalRowsContainer"></div>

                                <div class="form-row mt-3">
                                    <input type="hidden" id="transport-price-hidden">

                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="transport_airport_makkah" name="transport_options" value="airport_makkah" data-transport-type="bus" onchange="toggleTransportPrice(this)">
                                            <label class="form-check-label" for="transport_airport_makkah">Airport to Makkah</label>
                                            <input type="number" step="0.01" class="form-control mt-2 d-none" id="price_airport_makkah" name="price_airport_makkah" placeholder="Enter Price...">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="transport_makkah_madina" name="transport_options" value="makkah_madina" data-transport-type="bus" onchange="toggleTransportPrice(this)">
                                            <label class="form-check-label" for="transport_makkah_madina">Makkah to Madina</label>
                                            <input type="number" step="0.01" class="form-control mt-2 d-none" id="price_makkah_madina" name="price_makkah_madina" placeholder="Enter Price...">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="transport_madina_makkah" name="transport_options" value="madina_makkah" data-transport-type="bus" onchange="toggleTransportPrice(this)">
                                            <label class="form-check-label" for="transport_madina_makkah">Madina to Makkah</label>
                                            <input type="number" step="0.01" class="form-control mt-2 d-none" id="price_madina_makkah" name="price_madina_makkah" placeholder="Enter Price...">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="visaCheckbox" name="visa">
                                            <input type="hidden" id="visaPrice" value="0">
                                            <label class="form-check-label" for="visaCheckbox">Visa</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12 text-center">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    </div>


            </div>
        </div>
    </div>
    <div class="hotelDetails">
        <div class="container">
            <div class="booking-details" id="booking-details">
                @foreach ($hotels as $hotel)

                @endforeach
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        function toggleTransportPrice(element) {
            const transportType = $(element).data('transport-type');
            const isChecked = element.checked;

            if (isChecked) {
                $.ajax({
                    url: '{{ route("get.transport.price") }}',
                    type: 'GET',
                    data: { transport_type: transportType },
                    success: function(response) {
                        if (response[`price_${element.value}`]) {
                            var price = response[`price_${element.value}`];
                            console.log(`Price for ${element.value}:`, price);

                            $('#transport-price-hidden').val(price);
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching transport price:', error);
                    }
                });
            } else {
                console.log(`Checkbox for ${element.value} is unchecked.`);
                $('#transport-price-hidden').val(0);
            }
        }
        </script>




<script>
$(document).ready(function() {
    // Initialize date range picker
    $('#dateRange').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

    // Handle form submission
    $('#search-form').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Capture form data
        const hotelName = $('#hotel').val();
        const dateRange = $('#dateRange').val();
        const roomType = $('#roomDropdown').val();

        console.log('Form data:', {
            hotelName,
            dateRange,
            roomType
        });

        $.ajax({
            url: '{{ route("getHotelsByName") }}', // Ensure this route is correct
            type: 'GET',
            data: {
                name: hotelName,
                dateRange: dateRange,
                roomType: roomType
            },
            success: function(response) {
                $('#booking-details').html(response.html);
                console.log('Request succeeded:', response);
            },
            error: function(error) {
                console.error('Error fetching hotels:', error);
            }
        });
    });

    // Add new row
    $('#addRowButton').on('click', function(event) {
        event.preventDefault();

        const rowCount = $('#additionalRowsContainer .form-row').length;
        const newRow = `
            <div class="form-row">
                <div class="form-group col-md-3 col-sm-6 col-12">
                    <label for="hotel_${rowCount}">Hotel ${rowCount + 1}</label>
                    <select class="form-control" id="hotel_${rowCount}" name="hotel_${rowCount}">
                        <option value="">Select hotel</option>
                        @foreach ($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6 col-12">
                    <label for="dateRange_${rowCount}">Check-in / Check-out ${rowCount + 1}</label>
                    <input type="text" class="form-control" id="dateRange_${rowCount}" name="dateRange_${rowCount}">
                </div>
                <div class="form-group col-md-3 col-sm-6 col-12">
                    <label for="roomDropdown_${rowCount}">Room Type ${rowCount + 1}</label>
                    <select class="form-control" id="roomDropdown_${rowCount}" name="roomDropdown_${rowCount}">
                        <option value="">Select room type and quantity</option>
                        <option value="Sharing">Sharing</option>
                        <option value="Double">Double</option>
                        <option value="Triple">Triple</option>
                        <option value="Quint">Quint</option>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6 col-12 d-flex align-items-end">
                    <a class="btn btn-sm btn-danger remove-row-button" data-row-id="${rowCount}"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        `;

        $('#additionalRowsContainer').append(newRow);
        $('#dateRange_' + rowCount).daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    });

    // Remove row
    $('#additionalRowsContainer').on('click', '.remove-row-button', function() {
        $(this).closest('.form-row').remove();
    });
});

</script>

</body>

</html>





























scripto

<script>
    $(document).ready(function () {
        var rowRequests = {};
        var storedPrices = {};

        function handleFormSubmission(formSelector, locationSelector, dateRangeSelector, roomTypeSelector, visaPriceSelector, transportPriceSelector, route) {
            $(document).on('submit', formSelector, function (event) {
                event.preventDefault();

                var form = $(this);
                var rowId = form.closest('.form-row').data('row-id');
                var location = form.find(locationSelector).val();
                var dateRange = form.find(dateRangeSelector).val();
                var roomType = form.find(roomTypeSelector).val();
                var visaPrice = parseFloat(form.find(visaPriceSelector).val()) || 0;
                var visaPriceWithTransport = parseFloat($('#visaPriceWithTransport').val()) || 0;
                var searchKey = rowId + '|' + location + '|' + dateRange + '|' + roomType;

                if (!storedPrices[searchKey]) {
                    storedPrices[searchKey] = {
                        location: location,
                        dateRange: dateRange,
                        roomType: roomType,
                        visaPrice: visaPrice,
                        visaPriceWithTransport: visaPriceWithTransport
                    };
                }

                console.log('Submitting form for rowId:', rowId);
                console.log('Search key:', searchKey);

                if (!rowRequests[searchKey]) {
                    rowRequests[searchKey] = true;

                    $.ajax({
                        url: route,
                        type: 'GET',
                        data: {
                            location: location,
                            dateRange: dateRange,
                            roomType: roomType,
                            visaPrice: visaPrice,
                            visaPriceWithTransport: visaPriceWithTransport,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            console.log('Response received for:', searchKey);

                            if (response.hotels.length > 0) {
                                $('#booking-details').prepend(response.html);

                                $.ajax({
                                    url: '{{ route('getRoomPrices') }}',
                                    type: 'GET',
                                    data: {
                                        hotel_city: location,
                                        dateRange: dateRange,
                                        roomType: roomType,
                                        visaPrice: visaPrice,
                                        visaPriceWithTransport: visaPriceWithTransport,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        console.log('Room prices response:', response);

                                        if (response.success) {
                                            var roomPrices = response.roomPrices;
                                            var totalPrices = response.totalPrices;
                                            var dailyPrices = response.dailyPrices;

                                            for (var hotelId in roomPrices) {
                                                if (roomPrices.hasOwnProperty(hotelId) && totalPrices.hasOwnProperty(hotelId) && dailyPrices.hasOwnProperty(hotelId)) {
                                                    $('#daily-price-' + hotelId + ' span').text('Room Price per Day: $' + dailyPrices[hotelId]);
                                                    $('#room-price-' + hotelId + ' span').text(roomPrices[hotelId]);

                                                    var totalPrice = parseFloat(totalPrices[hotelId].replace(/,/g, '')) || 0;

                                                    $('#total-price-' + hotelId + ' span').text(
                                                        'Including Visa: $' + visaPrice.toFixed(2) +
                                                        ' | Visa With Transport Price: $' + visaPriceWithTransport.toFixed(2) +
                                                        ' | Total Price: $' + totalPrice.toFixed(2)
                                                    );
                                                }
                                            }
                                        } else {
                                            console.error('Error fetching room prices:', response.message);
                                        }
                                    },
                                    error: function (xhr, status, error) {
                                        console.error('AJAX Error:', status, error);
                                    }
                                });
                            } else {
                                $('#booking-details').prepend('<p>No hotels found for the selected location.</p>');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                        }
                    });
                }
            });
        }

        function addNewRow() {
            var rowCount = $('#additionalRowsContainer .form-row').length;
            var newRow =
                `<div class="form-row" data-row-id="${rowCount + 1}">
                    <div class="form-group col-md-3">
                        <label for="location-${rowCount + 1}">Location</label>
                        <select class="form-control location location${rowCount + 1}" id="location-${rowCount + 1}">
                            <option value="">Select location</option>
                            <option value="Makkah">Makkah</option>
                            <option value="Madina">Madina</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dateRange-${rowCount + 1}">Check-in / Check-out</label>
                        <input type="text" class="form-control dateRange dateRange${rowCount + 1}" id="dateRange-${rowCount + 1}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="roomDropdown-${rowCount + 1}">Room Type</label>
                        <select class="form-control roomDropdown roomDropdown${rowCount + 1}" id="roomDropdown-${rowCount + 1}">
                            <option value="">Select room type and quantity</option>
                            <option value="Sharing">Sharing</option>
                            <option value="Double">Double</option>
                            <option value="Triple">Triple</option>
                            <option value="Quint">Quint</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 d-flex align-items-end">
                        <a class="btn btn-sm btn-danger removeRowButton"><i class="fa fa-minus"></i></a>
                    </div>
                </div>`;

            $('#additionalRowsContainer').append(newRow);

            // Initialize date range picker for the new row
            $(`input.dateRange.dateRange${rowCount + 1}`).daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            }).on('cancel.daterangepicker', function () {
                $(this).val('');
            });

            handleFormSubmission(
                '#search-form',
                `.location${rowCount + 1}`,
                `.dateRange${rowCount + 1}`,
                `.roomDropdown${rowCount + 1}`,
                '#visaPrice',
                '#visaPriceWithTransportCheckbox',
                '{{ route('getHotelsByLocationid') }}'
            );
        }

        $('#addRowButton').click(function (e) {
            e.preventDefault();
            addNewRow();
        });

        $('#additionalRowsContainer').on('click', '.removeRowButton', function () {
            $(this).closest('.form-row').remove();
        });

        $('#dateRange').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#dateRange').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
        });

        $('#dateRange').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

        handleFormSubmission(
            '#search-form',
            '#location',
            '#dateRange',
            '#roomDropdown',
            '#visaPrice',
            '#visaPriceWithTransportCheckbox',
            '{{ route('getHotelsByLocationid') }}'
        );
    });
        </script>



<div class="form-row mt-3">



    <div class="form-group col-md-3 col-sm-6 col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="visaCheckbox" name="visa">
            <input type="hidden" id="visaPrice" value="0">
            <label class="form-check-label" for="visaCheckbox">Visa</label>
        </div>
    </div>

    <div class="form-group col-md-3 col-sm-6 col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="visaPriceWithTransportCheckbox" name="visa_price_with_transport">
            <input type="hidden" id="visaPriceWithTransport" value="0">
            <label class="form-check-label" for="visaPriceWithTransportCheckbox">Visa Price with Transport</label>
        </div>
    </div>

</div>














































<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 950px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hotel Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <style>
                    .upload-card {
                        text-align: center;
                        padding: 20px;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                        background-color: #f9f9f9; /* Light background color */
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        position: relative;
                    }
                    .btn-upload {
                        width: 100px;
                        height: 100px;
                        border-radius: 8px;
                        margin-right: 1154px;
                        background-color: #dcdcdc;
                        color: #333;
                        border: none;
                        font-size: 36px;
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .btn-upload:hover {
                        background-color: #b0b0b0;
                    }
                    .upload-card input[type="file"] {
                        display: none;
                    }

                    /* Set a fixed size for the images */
                    .carousel-item img {
                        width: 100%;
                        height: 680px; /* Fixed height */
                        object-fit: cover; /* This will maintain the aspect ratio and crop the image to fill the container */
                    }

                </style>
            </head>
            <body>
                <div class="container">
                    <div class="row">
                        <div class="hotel-header">

                            <span class="hotel_name"></span>
                            <div class="star-rating">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Left Side: Hotel Image Carousel -->
                        <div class="col-md-6">
                            <div id="hotelCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <!-- Images will be dynamically added here by JavaScript -->
                                </div>
                                <a class="carousel-control-prev" href="#hotelCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#hotelCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                        <!-- Right Side: Hotel Details -->
                        <div class="col-md-6">
                            <span class="hotel_details"> <h2>Details</h2></span>


                            {{-- <p>{{ $hotel->hotel_details }}</p> --}}

                            <div class="hotel_price_table"></div>
                            {{-- <p>Total Price: ${{ number_format($totalPrice, 2) }}</p>
                            <p>Number of Nights: {{ $nights }}</p>
                            <p>Visa Price: ${{ number_format($visaPrice, 2) }}</p>
                            <p>Transport Price: ${{ number_format($transportPrice, 2) }}</p>
                            <p>Room Price per Night: ${{ number_format($roomPricePerDay, 2) }}</p>
                            <p>Total Room Price: ${{ number_format($roomPrice, 2) }}</p> --}}
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <table id="pricing-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color: gray;">Day</th>
                                        <th style="background-color: gray;">Sharing</th>
                                        <th style="background-color: gray;">Quad</th>
                                        <th style="background-color: gray;">Quint</th>
                                        <th style="background-color: gray;">Triple</th>
                                        <th style="background-color: gray;">Double</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            $('.book-now-btn').on('click', function (e) {
                                e.preventDefault();
                                var hotelId = $(this).data('hotel-id');
                                $('#selectedHotelId').val(hotelId);
                                $('#myModal').modal('show');
                            });
                        });
                    </script>

        </div>
    </div>
</div>

<script>
  $(document).ready(function () {
    $('.book-now-btn').on('click', function (e) {
        e.preventDefault();

        // Get data attributes from the clicked button
        var hotelId = $(this).data('hotel-id');
        var hotelName = $(this).data('hotel-name');
        var hotelStar = $(this).data('hotel-star');
        var hotelCity = $(this).data('hotel-city');
        var roomPrice = $(this).data('room-price');

        // Debugging: Log the values to the console
        console.log('Hotel ID:', hotelId);
        console.log('Hotel Name:', hotelName);
        console.log('Hotel Star:', hotelStar);
        console.log('Hotel City:', hotelCity);
        console.log('Room Price:', roomPrice);

        // Populate modal fields
        $('#selectedHotelId').val(hotelId);
        $('#hotel-name').text(hotelName); // Set the hotel name in the modal
        $('#hotel-star').text('★'.repeat(hotelStar)); // Show stars in modal
        $('#hotel-city').text(hotelCity);
        $('#room-price-value').text(roomPrice);

        // Show the modal
        $('#myModal').modal('show');
    });
});



</script>




















<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1350px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hotel Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <style>
                    .upload-card {
                        text-align: center;
                        padding: 20px;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                        background-color: #f9f9f9;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        position: relative;
                    }

                    .btn-upload {
                        width: 100px;
                        height: 100px;
                        border-radius: 8px;
                        background-color: #dcdcdc;
                        color: #333;
                        border: none;
                        font-size: 36px;
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .btn-upload:hover {
                        background-color: #b0b0b0;
                    }

                    .upload-card input[type="file"] {
                        display: none;
                    }

                    .carousel-item img {
                        width: 100%;
                        height: 680px;
                        object-fit: cover;
                    }
                </style>
                <style>
                    .carousel {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        width: 100%;
                        max-width: 600px;
                        margin: 0 auto;
                    }

                    .carousel-images {
                        display: flex;
                        overflow: hidden;
                        width: 80%;
                    }

                    .thumbnail {
                        max-width: 100px;
                        margin-right: 10px;
                        cursor: pointer;
                        transition: transform 0.3s ease;
                    }

                    .thumbnail:hover {
                        transform: scale(1.1);
                    }

                    .prev, .next {
                        background-color: #ddd;
                        border: none;
                        padding: 10px;
                        cursor: pointer;
                        transition: background-color 0.3s ease;
                    }

                    .prev:hover, .next:hover {
                        background-color: #aaa;
                    }

                    .modal {
                        display: none;
                        position: fixed;
                        z-index: 1;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        overflow: auto;
                        background-color: rgba(0, 0, 0, 0.8);
                    }

                    .modal-content {
                        margin: auto;
                        display: block;
                        width: 80%;
                        max-width: 700px;
                    }

                    .close {
                        position: absolute;
                        top: 15px;
                        right: 25px;
                        color: white;
                        font-size: 35px;
                        font-weight: bold;
                        cursor: pointer;
                    }

                    </style>

                <div class="container">
                    <div class="row">
                      <h2 class="hotel_name"></h2>
                        <div class="star-rating"></div>
                        <p class="hotel_details"></p>

                    </div>

                    <div class="row" style="width: 100%; !imported">

                        <div class="carousel">
                            <button class="prev" onclick="prevImage()">❮</button>
                            <div class="carousel-images">
                                <img src="image1.jpg" class="thumbnail" onclick="showImage(this)">
                                <img src="image2.jpg" class="thumbnail" onclick="showImage(this)">
                                <img src="image3.jpg" class="thumbnail" onclick="showImage(this)">
                                <!-- Add more images as needed -->
                            </div>
                            <button class="next" onclick="nextImage()">❯</button>
                        </div>

                        <div id="bigImageModal" class="modal">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <img class="modal-content" id="bigImage">
                        </div>
                    </div>
                    <div class="hotel_price_table"></div>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <table id="pricing-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color: gray;">Day</th>
                                        <th style="background-color: gray;">Sharing</th>
                                        <th style="background-color: gray;">Quint</th>
                                        <th style="background-color: gray;">Triple</th>
                                        <th style="background-color: gray;">Double</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table rows will be populated here by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.book-now-btn').on('click', function(e) {
                e.preventDefault();
                var hotelId = $(this).data('hotel-id');
                $('#selectedHotelId').val(hotelId);
                $('#myModal').modal('show');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.book-now-btn').on('click', function(e) {
                e.preventDefault();

                // Get data attributes from the clicked button
                var hotelId = $(this).data('hotel-id');
                var hotelName = $(this).data('hotel-name');
                var hotelStar = $(this).data('hotel-star');
                var hotelCity = $(this).data('hotel-city');
                var roomPrice = $(this).data('room-price');

                // Debugging: Log the values to the console
                console.log('Hotel ID:', hotelId);
                console.log('Hotel Name:', hotelName);
                console.log('Hotel Star:', hotelStar);
                console.log('Hotel City:', hotelCity);
                console.log('Room Price:', roomPrice);

                // Populate modal fields
                $('#selectedHotelId').val(hotelId);
                $('#hotel-name').text(hotelName); // Set the hotel name in the modal
                $('#hotel-star').text('★'.repeat(hotelStar)); // Show stars in modal
                $('#hotel-city').text(hotelCity);
                $('#room-price-value').text(roomPrice);

                // Show the modal
                $('#myModal').modal('show');
            });
        });
    </script>
    <script>
        let currentIndex = 0;

        function showImage(img) {
            const modal = document.getElementById("bigImageModal");
            const modalImg = document.getElementById("bigImage");
            modal.style.display = "block";
            modalImg.src = img.src;
        }

        function closeModal() {
            document.getElementById("bigImageModal").style.display = "none";
        }

        function nextImage() {
            const images = document.querySelectorAll('.carousel-images img');
            if (currentIndex < images.length - 1) {
                currentIndex++;
            } else {
                currentIndex = 0; // Loop back to the first image
            }
            updateCarousel();
        }

        function prevImage() {
            const images = document.querySelectorAll('.carousel-images img');
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = images.length - 1; // Loop back to the last image
            }
            updateCarousel();
        }

        function updateCarousel() {
            const images = document.querySelectorAll('.carousel-images img');
            images.forEach((img, index) => {
                img.style.display = index === currentIndex ? 'block' : 'none';
            });
        }

        // Initial display
        updateCarousel();

        </script>






































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

.card-title, .star-rating, .hotel-distance {
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

.card-title, .card-text {
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
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
                <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="bg-img">
            <div>
                <h1 id="hero-banner-header1" class="fade-in" data-selenium="hero-banner-h1">Mecca hotels &amp; places to
                    stay</h1>
                <h2 id="hero-banner-header2" class="fade-in hero-banner-header2" data-selenium="hero-banner-h2">Search
                    to compare prices and discover great deals with free cancellation</h2>

                    <div class="container">
                        <div class="search-form">
                            <form id="search-form">
                                <div class="form-row">
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="ziratname">Ziarat Name</label>

                                        <select class="form-control" id="ziaratName">
                                            <option value="">Select location</option>
                                            <option value="Makkah">Makkah</option>
                                            <option value="Madina">Madina</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="Hotel-name">Hotel Name</label>
                                        <select class="form-control" id="location">
                                            <option value="">Select Ziarat</option>
                                            <!-- Makkah hotels will be populated here dynamically -->
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="dateRange">Check-in / Check-out</label>
                                        <input type="text" class="form-control" id="dateRange">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <label for="roomDropdown">Room Type</label>
                                        <select class="form-control" id="roomDropdown">
                                            <option value="">Select room type and quantity</option>
                                            <option value="Sharing">Sharing</option>
                                            <option value="Double">Double</option>
                                            <option value="Triple">Triple</option>
                                            <option value="Quint">Quint</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-12 d-flex align-items-end">
                                        <a class="btn btn-sm btn-primary" id="addRowButton"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>

                                <div id="additionalRowsContainer"></div>

                                <div class="form-row mt-3">

                                    {{-- <input type="hidden" id="visaPriceWithTransportCheckbox"> --}}

                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="visaCheckbox" name="visa">
                                            <input type="hidden" id="visaPrice" value="0">
                                            <label class="form-check-label" for="visaCheckbox">Visa</label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 col-sm-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="visaPriceWithTransportCheckbox" name="visa_price_with_transport">
                                            <input type="hidden" id="visaPriceWithTransport" value="0">
                                            <label class="form-check-label" for="visaPriceWithTransportCheckbox">Visa Price with Transport</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="form-group col-12 text-center">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
    <div class="hotelDetails">
        <div class="container">
            <div class="booking-details" id="booking-details">

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Daterangepicker JS -->
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

$(document).ready(function () {
    function fetchRoomPrices() {
        var hotelName = $('#location').val(); // Fetch hotel ID
        var dateRange = $('#dateRange').val();
        var roomType = $('#roomDropdown').val();
        var visaPrice = parseFloat($('#visaPrice').val()) || 0;
        var visaPriceWithTransport = parseFloat($('#visaPriceWithTransport').val()) || 0;

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
                success: function (response) {
                    if (response.success) {
                        var roomPrices = response.roomPrices;
                        var totalPrices = response.totalPrices;
                        var dailyPrices = response.dailyPrices;
                        var visaPriceWithTransport = response.visaPriceWithTransport;

                        // Update the hotel details with the prices
                        updateHotelDetails(response.hotel, roomPrices, totalPrices, dailyPrices, visaPrice, visaPriceWithTransport);
                    } else {
                        console.error('Error fetching room prices:', response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }
    }

    function updateHotelDetails(hotel, roomPrices, totalPrices, dailyPrices, visaPrice, visaPriceWithTransport) {
    console.log(hotel);


    var hotelDetailsHtml = `
        <div class="card booking-card">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="${hotel.picture}" class="card-img-top" alt="${hotel.name}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">${hotel.hotel_name || 'Hotel Name'}</h5>
                        <p class="star-rating text-warning">${'★'.repeat(hotel.hotel_star || 0)}</p>
                        <p class="card-text"><strong>${hotel.hotel_city || 'City'}</strong></p>
                        <div class="price-info">
                            <div id="daily-price-${hotel.id || '0'}" class="price-item">
                                <span>Room Price per Day: $${dailyPrices[hotel.id] || '-'}</span>
                            </div>
                            <div id="room-price-${hotel.id || '0'}" class="price-item">
                                <span>Room Price: $${roomPrices[hotel.id] || '-'}</span>
                            </div>
                            <div id="total-price-${hotel.id || '0'}" class="price-item">
                                <span>
                                    Total Price: $${(parseFloat(totalPrices[hotel.id]?.replace(/,/g, '') || '0')).toFixed(2)}
                                    (Including Visa: $${visaPrice.toFixed(2)}
                                    | Visa With Transport Price: $${visaPriceWithTransport.toFixed(2)})
                                </span>
                            </div>
                        </div>
                        <a href="#" data-hotel-id="${hotel.id || '0'}" data-toggle="modal" data-target="#myModal" class="btn btn-outline-primary book-now">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    `;

    $('#booking-details').html(hotelDetailsHtml);
}

    $('#dateRange').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
        fetchRoomPrices();
    }).on('cancel.daterangepicker', function () {
        $(this).val('');
        fetchRoomPrices();
    });

    $('#roomDropdown').change(function () {
        fetchRoomPrices();
    });

    $('#location').change(function () {
        fetchRoomPrices();
    });

    // Event listener for visa checkbox
    $('#visaCheckbox').change(function () {
        if ($(this).is(':checked')) {
            $.ajax({
                url: '{{ route('getVisaPrice') }}',
                type: 'GET',
                data: {
                    visaType: 'Ummrah',
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        $('#visaPrice').val(response.visaPrice);
                        $('#visa-price-container').show();
                    } else {
                        $('#visa-price-container').hide();
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        } else {
            $('#visaPrice').val('');
            $('#visa-price-container').hide();
        }
    });

    $('#visaPriceWithTransportCheckbox').click(function() {
        if($(this).is(':checked')) {
            $.ajax({
                url: '{{ route('getVisaPrice') }}',
                type: 'GET',
                data: {
                    visaType: 'Ummrah',
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        $('#visaPriceWithTransport').val(response.visaPriceWithTransport);
                        $('#visaPriceWithTransport').show();
                    } else {
                        $('#visaPriceWithTransport').hide();
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }
    });

    $('#location').change(function () {
        var hotelId = $(this).val();

        if (hotelId) {
            $.ajax({
    url: '{{ route("getHotelDetailsById") }}',
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

     },
                error: function(xhr) {
                    console.error("Error fetching hotel details:", xhr.responseText);
                }
            });
        } else {
            $('#booking-details').html('');
        }
    });
});

</script>
</body>

</html>
