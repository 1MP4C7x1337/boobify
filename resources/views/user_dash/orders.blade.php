@extends('model_dash.dashboard')
@section('content')

<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h4 class="card-title">Orders</h4>
       </div>
    </div>
    <div class="iq-card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Model Name</th>
                        <th>Service Name</th>
                        <th>Additional information</th>
                        <th>Price $</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Chat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)    
                        <tr>
                            <td>{{ $order->payment_id }}</td>
                            <td>{{ $order->user_name }}</td>
                            <td>{{ $order->model_name }}</td>
                            <td>{{ $order->service_name }}</td>
                            <td>{{ $order->info }}</td>
                            <td>{{ $order->price}}</td>
                            <td><span class="badge badge-info">{{ $order->current_status }}</span></td>
                            <td>{{ $order->created_at }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection