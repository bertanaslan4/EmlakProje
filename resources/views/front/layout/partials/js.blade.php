<script src="{{asset('front/js/jquery-3.7.0.min.js')}}"></script>
<script src="{{asset('front/js/jquery-ui.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('front/js/slick.js')}}"></script>
<script src="{{asset('front/js/waypoints.min.js')}}"></script>
<script src="{{asset('front/js/wow.min.js')}}"></script>
<script src="{{asset('front/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('front/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front/js/gsap.min.js')}}"></script>
<script src="{{asset('front/js/simpleParallax.min.js')}}"></script>
<script src="{{asset('front/js/TweenMax.min.js')}}"></script>
<script src="{{asset('front/js/jquery.marquee.min.js')}}"></script>
<script src="{{asset('front/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('front/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('front/js/custom.js')}}"></script>

<script>
    $(".marquee_text").marquee({
        direction: "left",
        duration: 25000,
        gap: 50,
        delayBeforeStart: 0,
        duplicated: true,
        startVisible: true,
    });
    $(".marquee_text2").marquee({
        direction: "left",
        duration: 25000,
        gap: 50,
        delayBeforeStart: 0,
        duplicated: true,
        startVisible: true,
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Bilgi',
            text: '{{ Session::get('success') }}',
            showConfirmButton: true,
            timer: 3000
        })
    </script>
@endif