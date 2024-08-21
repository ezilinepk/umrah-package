<!-- Modal -->
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

                    #imageThumbnails img {
                        width: 100px;
                        /* Thumbnail size */
                        height: 100px;
                        object-fit: cover;
                        cursor: pointer;
                        border: 2px solid transparent;
                        transition: border-color 0.3s ease;
                    }

                    #imageThumbnails img.selected {
                        border-color: #007bff;
                        /* Highlight the selected image */
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
    #selectedImageContainer {
        margin-top: 20px;
        text-align: center;
    }

    #imageThumbnails {
        display: flex;
        overflow-x: auto; /* Enables horizontal scrolling */
        gap: 10px;
        padding: 10px;
        scroll-snap-type: x mandatory; /* Snap scrolling */
    }

    #imageThumbnails img {
        width: 150px; /* Adjust as needed */
        height: 100px; /* Adjust as needed */
        object-fit: cover; /* Maintain aspect ratio */
        scroll-snap-align: start; /* Align images to the start of the container */
        cursor: pointer;
        border: 2px solid transparent; /* Default border */
        transition: border-color 0.3s; /* Smooth transition */
    }

    #imageThumbnails img.selected {
        border-color: #007bff; /* Highlight selected image */
    }

    /* Hide scrollbar for Webkit browsers */
    #imageThumbnails::-webkit-scrollbar {
        display: none;
    }
</style>



                <div class="container">
                    <div class="row">
                        <h2 class="hotel_name"></h2>
                        <div class="star-rating"></div>
                        <p class="hotel_details"></p>

                    </div>

                    <div>
                        <img id="selectedImage" src="" alt="Selected Image"
                            style="margin-top: 20px; width: 100%; max-width: 1350pxpx; height: auto; display: block; margin-left: auto; margin-right: auto;" />
                    </div>

                    <div id="selectedImageContainer">
                        <div id="imageThumbnails">
                         
                        </div>
                    </div>

                        <div class="hotel_price_table"></div>
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
