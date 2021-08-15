@extends('admin_dash.dashboard')
@section('content')

{{-- Services Table --}}

<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h4 class="card-title">Users</h4>
       </div>
    </div>
    <div class="iq-card-body">
       <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered" >
   <thead>
       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Email</th>
           <th>Age</th>
           <th>Role</th>
           <th>Images</th>
           <th>Earnings $</th>
           <th>Balance $</th>
           <th>Created at</th>
           <th></th>
       </tr>
   </thead>
   <tbody>
        @if(count($users) == 0)
            <tr>
                <td class="text-center" colspan="8">No users registered</td>
            </tr>
        @endif
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>@if($user->role=='model'){{ $user->age }}@else N/A @endif</td>
                <td>{{ $user->role }}</td>
                <td>
                    @if($user->role=='model')
                        @php
                            $imgs = explode(';', $user->images);
                        @endphp
                        @foreach ($imgs as $img)
                            <a href="https://res.cloudinary.com/boobify/image/upload/v1628532918/{{ $img }}">Image {{ $loop->index+1 }}</a>
                        @endforeach
                    @else 
                        N/A 
                    @endif</td>
                <td>
                    @if($user->role=='model')
                        {{ $user->earnings }}
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    @if($user->role=='model')
                        {{ $user->balance }}
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $user->created_at }}</td>
                <td style="width: 5rem;"><a href="{{ route('editUser', $user->id) }}"><button type="button" class="btn mb-3 btn-secondary"><i class="ri-bill-fill"></i>Edit</button></a></td>
            </tr>
        @endforeach
       
   </tbody>
</table>
       </div>
    </div>
 </div>
    </div>
 </div>
@endsection