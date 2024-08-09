<!-- <script src="{{asset('web-assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('web-assets/js/wow.js')}}"></script>
<script src="{{asset('web-assets/slick/slick.js')}}"></script>
<script src="{{asset('web-assets/slick/slick.min.js')}}"></script>
<script src="{{asset('web-assets/js/jquery.flipster.js')}}"></script>
<script src="{{asset('web-assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('web-assets/js/fancybox.js')}}"></script>
<script src="{{asset('web-assets/js/bootstrap.js')}}"></script> -->

<script src="{{asset('web-assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('web-assets/js/wow.js')}}"></script>
<script src="{{asset('web-assets/slick/slick.js')}}"></script>
<script src="{{asset('web-assets/slick/slick.min.js')}}"></script>
<script src="{{asset('web-assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('web-assets/js/fancybox.js')}}"></script>
<script src="{{asset('web-assets/js/bootstrap.js')}}"></script>
<script src="{{asset('web-assets/js/custom.js')}}"></script>
      <script>
      $(function(){
        $(".flipster").flipster({
          style: 'carousel'
          });
          });

        </script>
      <script src="{{asset('web-assets/js/custom.js')}}"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
      <script>
         $('.num-count').each(function () {
           $(this).prop('Counter',0).animate({
             Counter: $(this).text()
           }, {
             duration: 2000,
             easing: 'swing',
             step: function (now) {
               $(this).text(Math.ceil(now));
             }
           });
         });

      </script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>



    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->





<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>


<script>
  @if(Session::has('message'))
  toastr.options =
  {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "6000",
    "extendedTimeOut": "6000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  toastr.success("{{ session('message') }}");
  @endif
  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "6000",
    "extendedTimeOut": "6000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  toastr.error("{{ session('error') }}");
  @endif
  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "6000",
    "extendedTimeOut": "6000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "6000",
    "extendedTimeOut": "6000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  toastr.warning("{{ session('warning') }}");
  @endif
</script>
<script type="text/javascript">
  $(document).ready(function(){
      toastr.options =
      {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "6000",
          "extendedTimeOut": "6000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
      }

      $("#newsletter_form").submit(function(e){
          e.preventDefault();
          var url = "{{ route('newsletter') }}";
          var form_data = $('#newsletter_form').serialize();
          $.ajax({
              type: "POST",
              url: url,
              data: form_data,
              dataType : 'JSON',
              success:function(result){
                  if(result.success) {

                      toastr.success('Thankyou For Subscribing To Our Newsletter.');
                      $('input[name="newsletter_email"]').val('');
                      $('#myModal').hide();
                  }
                  else{
                      toastr.error(result.error);
                  }
              },
          });
      });

  });
</script>
<!-- <script type="text/javascript">
    var cleave = new Cleave('#reg_contact', {
        numericOnly: true,
        delimiters: ['-', '-', ' '],
        blocks: [3, 3, 4],
    });
</script> -->

@yield('js')
