@extends('user_dash.dashboard')
@section('content')

<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h3 class="card-title">Referral Program</h3>
       </div>
    </div>
    <div class="iq-card-body">
        <h4>Account type: {{ Auth::user()->role }}</h4>

        <hr class="w-100" style="background-color: var(--iq-dark-icon-color);"/>

        <h5>Here is your ref link: <a href="#">{{ route('register') }}?ref={{ Auth::user()->name }}</a></h5>
        <h5>Share it and earn discounts!</h5>
        <br>
        <h6>Users registered from your ref link: {{ $referredUsers }}</h6>


    </div>
</div>
<div class="iq-card p-2">
    <div class="iq-header-title">
        <h4>Compensation:
            @if(Auth::user()->role =='user') 
                {{ $compensation }}% of model side fee
            @elseif(Auth::user()->role =='partner')
                {{ 100 - $compensation }}% of model side fee
            @endif
        </h4>
     </div>
</div>


        @if(Auth::user()->role == 'partner')

        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                <h4>Choose how much you get from model's 20% side fee (referred user will get the rest)</h4>
               </div>
            </div>
            <div class="iq-card-body">
                <h6>Current value: {{ Auth::user()->partner_referral }}%</h6>
                <form method="post" action="{{ route('updatePartnerReferral') }}">
                    @csrf
                
                    <input id="ex1" name="referral" class="custom-range" data-slider-id='ex1Slider' type="text" data-slider-min="10" data-slider-max="100" data-slider-step="10" data-slider-value="{{ Auth::user()->partner_referral }}"/><br>
                    <button type="submit" class="btn btn-success mt-3">Update</button>
                </form>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js" integrity="sha512-f0VlzJbcEB6KiW8ZVtL+5HWPDyW1+nJEjguZ5IVnSQkvZbwBt2RfCBY0CBO1PsMAqxxrG4Di6TfsCPP3ZRwKpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                <script>
                var slider = new Slider('#ex1', {
                        formatter: function(value) {
                            return 'Current value: ' + value + '%';
                        }
                    });
                </script>
            </div>
        </div>
        @endif
    </div>
</div>


@endsection