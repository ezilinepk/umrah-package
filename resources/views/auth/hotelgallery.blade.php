<!-- Main Hotel Booking Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1350px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hotel Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card gallery-view">
                    <div class="card-header">
                        <h4>Gallery View</h4>
                    </div>
                    <div class="card-body">
                        <div id="galleryImages"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal for showing clicked picture -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Selected Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Script to handle image gallery click and modal display -->
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
        // Event listener for dynamically added images
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
