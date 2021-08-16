@extends('model_dash.dashboard')
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
        <h6>Users registered from your ref link: {{ count($referredUsers) }}</h6>
    </div>
</div>

@endsection