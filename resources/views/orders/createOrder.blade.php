<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Make order - Boobify</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   </head>
   <body class="dark">
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <section class="sign-in-page">
            <div class="container bg-white mt-5 p-5">
                <div class="row no-gutters">
                    <div class="col-sm-12 align-self-center">
                        <div class="sign-in-from">
                            <h1 class="mb-0 dark-signin">Order wizard</h1>
                            <h3 class="mb-0 dark-signin">Model: {{ $model->name }}, {{ $model->age }}</h3>
                            
                            <form class="mt-4" method="POST" action="{{ route('create_order', $model->id) }}">
                                @csrf
                                
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Choose service</label>
                                        <select name="service" class="form-control mb-1" id="exampleFormControlSelect2" size="{{ count($services) }}" required>
                                        @if (count($services)==0)
                                            <option>No services available</option>
                                        @endif
                                           @foreach ($services as $service)
                                               <option value="{{ $service->service_name }};{{ $service->price }}">{{ $service->service_name }}, {{ $service->price }}$</option>
                                           @endforeach
                                        </select>
                                        <label for="exampleFormControlSelect2">Note: 2$ fee will be applied</label>
                                     </div>
                                     <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Additional information</label>
                                        <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                     </div>
                                     <input type="hidden" name="model" value="{{ $model->name }}">
                                     @if (count($services)!=0)
                                        <button type="submit" class="btn mb-3 dark-icon btn-primary"><i class="ri-bill-fill"></i>Place order</button>
                                     @endif
                                </form>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <!-- Appear JavaScript -->
      <script src="{{ asset('js/jquery.appear.js') }}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{ asset('js/countdown.min.js') }}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{ asset('js/waypoints.min.js') }}"></script>
      <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
      <!-- Wow JavaScript -->
      <script src="{{ asset('js/wow.min.js') }}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{ asset('js/apexcharts.js') }}"></script>
      <!-- Slick JavaScript -->
      <script src="{{ asset('js/slick.min.js') }}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{ asset('js/select2.min.js') }}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('js/chart-custom.js') }}"></script>
      <!-- Custom JavaScript -->
      <script src="{{ asset('js/custom.js') }}"></script>
   </body>
</html>