<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1350px;">
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
                        background-color: #d9f2ff; /* Light blue background */
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        position: relative;
}

                        #imageThumbnails {
                            display: flex;
                            gap: 10px;
                            padding: 10px;
                            overflow-x: hidden; /* Remove horizontal scrollbar */
                            touch-action: pan-x; /* Enable touch-based horizontal swipe */
                            scroll-snap-type: x mandatory;
                        }

                        #imageThumbnails img {
                            width: 150px;
                            height: 100px;
                            object-fit: cover;
                            scroll-snap-align: start;
                            cursor: pointer;
                            border: 2px solid #ddd; /* 2px border around images */
                            transition: border-color 0.3s ease;
                            border-radius: 5px; /* Slight rounding for aesthetic */
                        }

                        #imageThumbnails img.selected {
                            border-color: #007bff; /* Change border color when selected */
                        }

                        /* Optional: Add hover effect */
                        #imageThumbnails img:hover {
                            border-color: #007bff; /* Border changes on hover */
                        }

                    #imageThumbnails img.selected {
                        border-color: #007bff;
                    }

                    .carousel-item img {
                        width: 100%;
                        height: 680px;
                        object-fit: cover;
                    }

                    .hotel_name {
                        font-size: 24px;
                        font-weight: bold;
                        margin-bottom: 10px;
                    }

                    .star-rating {
                        color: gold;
                        margin-bottom: 10px;
                    }

                    .hotel_details {
                        margin-bottom: 20px;
                        line-height: 1.5;
                    }

                    .contact-info {
                        padding: 15px;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                        background-color: #f9f9f9;
                        margin-top: 20px;
                    }

                    .contact-info div {
                        margin-bottom: 10px;
                    }

                    #selectedImage {
                        margin: 20px auto;
                        width: 100%;
                        max-width: 1000px;
                        height: auto;
                        display: block;
                        border-radius: 8px;
                        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    }

                    .hotel_price_table {
                        margin-top: 20px;
                     box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);

                    }

                    .gallery-view {
                        margin-top: 20px;
                    }

                    #galleryImages {
                        display: flex;
                        flex-wrap: wrap; /* Allow wrapping of images to the next line */
                        gap: 10px; /* Space between images */
                    }

                    .gallery-image {
                        width: calc(50% - 10px); /* Two images per row, accounting for gap */
                        margin-bottom: 10px; /* Space below each image */
                        border-radius: 8px;
                        overflow: hidden;
                    }

                    .gallery-image img {
                        width: 100%;
                        height: auto; /* Maintain aspect ratio */
                        border-radius: 8px;
                    }
                    .complements label {
                        display: block; /* Make each label occupy a full line */
                        margin-bottom: 5px; /* Space between items */
                    }



                </style>

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Hotel Details</h4>
                                </div>
                                <div class="card-body">
                                    <h2 class="hotel_name"></h2>
                                    <div class="star-rating"></div>
                                    <p class="hotel_details"></p>
                                    <img id="selectedImage" src="" alt="Selected Image" />
                                    <div id="imageThumbnails"></div>
                                </div>
                            </div>

                            <div class="card room-prices">
                                <div class="card-header">
                                    <h4>Room Prices</h4>
                                </div>
                                <div class="card-body">
                                    <div class="hotel_price_table"></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="card contact-info">
                                <div class="card-header">
                                    <h4>Contact</h4>
                                </div>
                                <div class="card-body">
                                    <div class="email"><strong>Email:</strong> <span class="email"></span></div>
                                    <div class="phone_number"><strong>Phone Number:</strong> <span class="phone_number"></span></div>
                                    <div class="address"><strong>Address:</strong> <span class="address"></span></div>
                                </div>
                            </div>

                            <div class="card gallery-view">
                                <div class="card-header">
                                    <h4>Gallery View</h4>
                                </div>
                                <div class="card-body">
                                    <div id="galleryImages"></div>
                                </div>
                            </div>

                            <div class="card complements">
                                <div class="card-header">
                                    <h4>Complements</h4>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <h5>Breakfast</h5>
                                        <label><input type="checkbox"> Marmalade</label><br>
                                        <label><input type="checkbox"> Ham</label><br>
                                        <label><input type="checkbox"> Bread</label><br>
                                        <label><input type="checkbox"> Breakfast burrito</label><br>
                                        <label><input type="checkbox"> Coffee</label><br>
                                        <label><input type="checkbox"> Tomato</label><br>
                                    </div>
                                    <div>
                                        <h5>Dinner</h5>
                                        <label><input type="checkbox"> Rice</label><br>
                                        <label><input type="checkbox"> Beef</label><br>
                                        <label><input type="checkbox"> Mutton</label><br>
                                        <label><input type="checkbox"> Chicken</label><br>
                                        <label><input type="checkbox"> Vegetable</label><br>
                                    </div>
                                    <div>
                                        <h5>Drinks</h5>
                                        <label><input type="checkbox"> Soft Drinks</label><br>
                                        <label><input type="checkbox"> Juices</label><br>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="galleryModal" style="display: none;">
    <div class="container" style="max-width: 2000px">
</div>
@include('auth.hotelgallery')

<script>
    function populateGallery(response) {
        $('#galleryImages').empty();
        response.gallery.forEach(function(imageUrl) {
            $('#galleryImages').append(`
                <div class="gallery-image">
                    <img src="${imageUrl}" alt="Gallery Image">
                </div>
            `);
        });
    }

    $(document).ready(function() {
        $('#galleryImages').on('click', '.gallery-image img', function() {
            var imageUrl = $(this).attr('src');

            // Set the clicked image URL in the modal
            $('#modalImage').attr('src', imageUrl);

            // Show the modal
            $('#imageModal').modal('show');
        });
    });
</script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
