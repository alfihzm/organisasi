<h5 class="card-title" style="color: #2E3192;">[GALERI HIMSI UBSI 2024]</h5>
<p class="mb-3"> Berikut adalah beberapa momen dari kegiatan HIMSI 🎉 </p>

<div class="gallery row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <div class="col">
        <a href="{{ asset('img/galeri/photo1.webp') }}" data-bs-toggle="lightbox" data-gallery="himsi-gallery">
            <img src="{{ asset('img/galeri/photo1.webp') }}" alt="photo1" class="img-fluid gallery-img">
        </a>
    </div>
    <div class="col">
        <a href="{{ asset('img/galeri/photo2.webp') }}" data-bs-toggle="lightbox" data-gallery="himsi-gallery">
            <img src="{{ asset('img/galeri/photo2.webp') }}" alt="photo2" class="img-fluid gallery-img">
        </a>
    </div>
    <div class="col">
        <a href="{{ asset('img/galeri/photo3.webp') }}" data-bs-toggle="lightbox" data-gallery="himsi-gallery">
            <img src="{{ asset('img/galeri/photo3.webp') }}" alt="photo3" class="img-fluid gallery-img">
        </a>
    </div>
    <div class="col">
        <a href="{{ asset('img/galeri/photo4.webp') }}" data-bs-toggle="lightbox" data-gallery="himsi-gallery">
            <img src="{{ asset('img/galeri/photo4.webp') }}" alt="photo4" class="img-fluid gallery-img">
        </a>
    </div>
    <div class="col">
        <a href="{{ asset('img/galeri/photo5.webp') }}" data-bs-toggle="lightbox" data-gallery="himsi-gallery">
            <img src="{{ asset('img/galeri/photo5.webp') }}" alt="photo5" class="img-fluid gallery-img">
        </a>
    </div>
    <div class="col">
        <a href="{{ asset('img/galeri/photo6.webp') }}" data-bs-toggle="lightbox" data-gallery="himsi-gallery">
            <img src="{{ asset('img/galeri/photo6.webp') }}" alt="photo6" class="img-fluid gallery-img">
        </a>
    </div>
</div>

<style>
    .gallery-img {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-radius: 8px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
    $(document).on('click', '[data-bs-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
