
<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="vendor/wow/wow.js"></script><!-- WOW JS -->
<script src="vendor/bootstrap/js/popper.min.js"></script><!-- POPPER.MIN JS -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="vendor/owl-carousel/owl.carousel.js"></script><!-- OWL-CAROUSEL JS -->
<script src="vendor/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC-POPUP JS -->
<script src="vendor/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="vendor/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="vendor/masonry/isotope.pkgd.min.js"></script><!-- ISOTOPE -->
<script src="vendor/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="vendor/masonry/masonry-4.2.2.js"></script><!-- MASONRY -->
<script src="vendor/bootstrap-select/bootstrap-select.min.js"></script><!-- BOOTSTRAP SELECT -->
<script src="js/dz.carousel.js"></script><!-- OWL-CAROUSEL -->
<script src="js/dz.ajax.js"></script><!-- CONTACT JS  -->
<script src="js/custom.js"></script><!-- CUSTOM JS -->

<script src="vendor/swiper/js/swiper.min.js"></script><!-- swiper -->
<script>
    var testimonialThumbs = new Swiper('.testimonial-thumbs', {
        spaceBetween: 10,
        slidesPerView: 3,
        centeredSlides: true,
        freeMode: true,
        autoplay: true,
        loop: true,
        speed: 3000,
    });
    var testimonialContent = new Swiper('.testimonial-content', {
        spaceBetween: 10,
        autoplay: true,
        loop: true,
        speed: 3000,
        thumbs: {
            swiper: testimonialThumbs
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
