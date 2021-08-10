@extends('model_dash.dashboard')
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title"> Date Based Data</h4>
        </div>
        </div>
        <div class="iq-card-body">
        <div id="am-datedata-chart" style="height: 500px;"></div>
        </div>
    </div>
@endsection