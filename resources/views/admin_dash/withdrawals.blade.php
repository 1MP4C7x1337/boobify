@extends('admin_dash.dashboard')
@section('content')

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
                        <th>User</th>
                        <th>Email</th>
                        <th>Amount $</th>
                        <th>Current status</th>
                        <th>Created at</th>
                        <th></th>
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
                            <td>{{ $withdrawal->model_name }}</td>
                            <td>{{ $withdrawal->email }}</td>
                            <td>{{ $withdrawal->amount }}</td>
                            <td>
                                @if ($withdrawal->current_status=='OPENED')
                                <span class="badge badge-info">{{ $withdrawal->current_status }}</span>
                                @elseif($withdrawal->current_status=='CLOSED')
                                    <span class="badge badge-success">{{ $withdrawal->current_status }}</span>
                                @endif  
                            </td>
                            <td>{{ $withdrawal->created_at }}</td>
                            <td>
                                <form method="post" action="{{ route('closeWithdrawal') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $withdrawal->id }}">
                                    
                                        <button type="submit" class="btn btn-success" @if($withdrawal->current_status == 'CLOSED') disabled @endif>Close request</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection