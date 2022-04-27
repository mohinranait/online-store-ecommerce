    <!-- Plugins JS File -->
    <script src="{{asset('frontend')}}/js/jquery.min.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.hoverIntent.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('frontend')}}/js/superfish.min.js"></script>
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap-input-spinner.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.plugin.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="{{asset('frontend')}}/js/main.js"></script>
    <script src="{{asset('frontend')}}/js/app.js"></script>
    <script src="{{asset('frontend')}}/js/demos/demo-4.js"></script>

     <!-- Toastr  -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>

<script>
       // toastr enitialize
       @if( Session::has('success'))
        toastr.options = {
          "closeButton": true,
          "progressBar": true,
          "timeOut": "5000",
        },toastr.success("{{ Session::get('success') }}");

      @elseif(Session::has('warning'))
        toastr.options = {
          "closeButton": true,
          "progressBar": true,
          "timeOut": "4000",
        },toastr.warning("{{ Session::get('warning') }}");
        
      @elseif(Session::has('delete'))
        toastr.options = {
          "closeButton": true,
          "progressBar": true,
          "timeOut": "4000",
        }, toastr.warning("{{ Session::get('delete') }}");
      @endif
    </script>


<script>
  // $(document).ready(function(){

  // })

  $("#division_id").change(function(){

    var division = $("#division_id").val();


    $('#districtname').html("");
    var option = "";

    $.get( "http://127.0.0.1:8000/get-district/" + division , function( value ) {

      value = JSON.parse(value);
      value.forEach(function(element){
        option += "<option value'" + element.id + "'>" + element.name + " </option>"
      })

      $('#districtname').html(option);

    });
    
  })
</script>