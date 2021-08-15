@extends('model_dash.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch ">
                <div class="iq-card-body">
                    <div class="d-flex d-flex align-items-center justify-content-between">
                        <div>
                            <h2>{{ Auth::user()->earnings }}$</h2>
                            <p class="fontsize-md m-0">Your Earnings</p>
                        </div>
                        <div class="rounded-circle iq-card-icon dark-icon-light iq-bg-primary "> <i class="ri-calculator-fill"></i></div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch ">
                <div class="iq-card-body">
                    <div class="d-flex d-flex align-items-center justify-content-between">
                        <div>
                            <h2>{{ Auth::user()->balance }}$</h2>
                            <p class="fontsize-md m-0">Your Account Balance</p>
                        </div>
                        <div class="rounded-circle iq-card-icon dark-icon-light iq-bg-primary "> <i class="fa fa-money"></i></div>
                    </div>
                </div>
                <form method="post" action="{{ route('withdraw') }}">
                    @csrf
                    @php
                        $pendingWithdrawal = False;
                    @endphp
                    @foreach ($withdrawals as $withdrawal)
                        @if($withdrawal->current_status == 'OPENED')
                            @php
                                $pendingWithdrawal = True;
                            @endphp
                        @endif
                    @endforeach
                    <input type="hidden" name="model_name" value="{{ Auth::user()->name }}">
                    <center><button class="btn btn-success mb-2" type="submit"
                        @if($pendingWithdrawal==True or Auth::user()->balance == '0')
                        disabled
                        @endif
                        >Open Withdrawal request</button></center>
                </form>
            </div>
        </div> 
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="iq-card iq-card-block iq-card-stretch ">
                <div class="iq-card-body">
                    <div class="d-flex d-flex align-items-center justify-content-between">
                        <div>
                            <h2>{{ $orders_completed }}</h2>
                            <p class="fontsize-md m-0">Orders completed</p>
                        </div>
                        <div class="rounded-circle iq-card-icon dark-icon-light iq-bg-primary "> <i class="ri-award-fill"></i></div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
           <div class="iq-header-title">
              <h4 class="card-title">Withdrawal requests</h4>
           </div>
        </div>
        <div class="iq-card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>Amount $</th>
                            <th>Current status</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($withdrawals) == 0)
                            <tr>
                                <td class="text-center" colspan="9">No withdrawal requests detected</td>
                            </tr>
                        @endif
                        @foreach ($withdrawals as $withdrawal)    
                            <tr>
                                <td>{{ $withdrawal->amount }}</td>
                                <td>
                                    @if ($withdrawal->current_status=='OPENED')
                                    <span class="badge badge-info">{{ $withdrawal->current_status }}</span>
                                    @elseif($withdrawal->current_status=='CLOSED')
                                        <span class="badge badge-success">{{ $withdrawal->current_status }}</span>
                                    @endif  
                                </td>
                                <td>{{ $withdrawal->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection