@extends('admin_dash.dashboard')
@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h4 class="card-title">ID: {{ $user->id }} Edit user: {{ $user->name }}</h4>
       </div>
    </div>
    <div class="iq-card-body">
       <form method="post" action="{{ route('editUser', $user->id) }}">
            @csrf  
             
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="dropdown my-3">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Role</label>
                <select name="role" class="form-control" id="exampleFormControlSelect1">
                    <option selected="">{{ $user->role }}</option>
                    @foreach ($roles as $role)
                    @if($role == $user->role)

                    @else
                        <option>{{ $role }}</option>
                    @endif
                   @endforeach
                </select>
            </div>
        </div>
        @if ($user->role=="model")
            <div class="form-group">
                <label for="service_name">Age</label>
                <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" id="age" value="{{ $user->age }}" min="0">
                @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        @endif
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">New password</label>
            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
       </form>
    </div>
 </div>
@endsection