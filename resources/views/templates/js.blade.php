<!-- Required jquery and libraries -->
<script src="{{asset('/')}}/assets/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('/')}}/assets/js/popper.min.js"></script>
<script src="{{asset('/')}}/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Swiper slider  js-->
{{-- <script src="{{asset('/')}}/assets/vendor/swiper/js/swiper.min.js"></script> --}}
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Customized jquery file  -->
<script src="{{asset('/')}}/assets/js/main.js"></script>
<!-- PWA app service registration and works -->
{{-- <script src="{{asset('/')}}/assets/js/pwa-services.js"></script> --}}
<script src="{{asset('/')}}/assets/js/app.js"></script>

<!-- Toaster Notify.js Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 
<script type="text/javascript">
  // Toaster Notify
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-full-width",
      "preventDuplicates": false,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

const swiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

</script>
@include('templates.notif')
@stack('scripts')