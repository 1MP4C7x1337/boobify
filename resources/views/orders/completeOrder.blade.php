<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Complete Order - Boobify</title>
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
                            <h1 class="mb-0 dark-signin">Order confirmation</h1>
                            
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                   <div class="iq-header-title">
                                      <h4 class="card-title">Order {{ $charge_code }}</h4>
                                   </div>
                                </div>
                                <div class="iq-card-body">
                                   <div class="table-responsive">
                                      <table id="datatable" class="table table-striped table-bordered" >
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Model Name</th>
                                        <th>Service Name</th>
                                        <th>Additional information</th>
                                        <th>Price $</th>
                                        <th>Current status</th>
                                   </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $metadata['user_name'] }}</td>
                                        <td>{{ $metadata['model_name'] }}</td>
                                        <td>{{ $metadata['service_name'] }}</td>
                                        <td>{{ $metadata['info'] }}</td>
                                        <td>{{ $metadata['price'] }}</td>
                                        <td>
                                            @if ($metadata['current_status']=='NEW')
                                                <span class="badge badge-info">{{ $metadata['current_status'] }}</span>
                                            @elseif($metadata['current_status']=='PAYED')
                                            <span class="badge badge-secondary">{{ $metadata['current_status'] }}</span>
                                            @endif
                                        </td>
                                    </tr>
                               </tbody>
                            </table>
                                   </div>
                                </div>
                             </div>
                             <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="images" style="">Choose pictures</label><br>
                                    {{-- <input type="file" class="inputfile" name="images[]" data-multiple-caption="{count} files selected" class="form-control mb-0 @error('images') is-invalid @enderror" style="width: 0.1px;height: 0.1px;opacity: 0; overflow: hidden; position: absolute; z-index: -1;" id="images" placeholder="Images" multiple required> --}}
                                    <input type="file" class="@error('images') is-invalid @enderror" name="images[]" id="file" class="" multiple />
                                    @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Send pictures</button>
                             </form>
                        </div>
                    </div>
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