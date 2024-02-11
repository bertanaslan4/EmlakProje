<script src="{{ asset('front/js/jquery-3.7.0.min.js')}}"></script>
<script src="{{ asset('front/js/jquery-ui.js')}}"></script>
<script src="{{ asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('front/js/popper.min.js')}}"></script>
<script src="{{ asset('front/js/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('front/js/slick.js')}}"></script>
<script src="{{ asset('front/js/waypoints.min.js')}}"></script>
<script src="{{ asset('front/js/wow.min.js')}}"></script>
<script src="{{ asset('front/js/jquery.counterup.min.js')}}"></script>
<script src="{{ asset('front/js/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('front/js/gsap.min.js')}}"></script>
<script src="{{ asset('front/js/simpleParallax.min.js')}}"></script>
<script src="{{ asset('front/js/TweenMax.min.js')}}"></script>
<script src="{{ asset('front/js/jquery.marquee.min.js')}}"></script>
{{-- <script src="{{ asset('front/js/jquery.nice-select.min.js')}}"></script> --}}
<script src="{{ asset('front/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('front/js/custom.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session()->has('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            text: '{{ Session::get('success') }}',
            showConfirmButton: false,
            timer: 3000
        })
    </script>
@endif

@if(session()->has('errors'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            text: '{{ session('errors')->first() }}',
            showConfirmButton: false,
            timer: 3000
        })
    </script>
@endif