@extends('model_dash.dashboard')
@section('content')

{{-- Services Table --}}

<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h4 class="card-title">Services</h4>
       </div>
    </div>
    <div class="iq-card-body">
       <p>Here you can see, create and delete your services.</p>
       <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered" >
   <thead>
       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Description</th>
           <th>Price $</th>
           <th></th>
       </tr>
   </thead>
   <tbody>
        @if(count($services) == 0)
            <tr>
                <td class="text-center" colspan="5">No services detected</td>
            </tr>
        @endif
        @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->service_name }}</td>
                <td>{{ $service->service_desc }}</td>
                <td>{{ $service->price }}</td>
                <td style="width: 5rem;"><a href="{{ route('delete_service', $service->id) }}"><button type="button" class="btn btn-danger mb-3"><i class="ri-delete-bin-2-fill pr-0"></i>Delete</button></a></td>
            </tr>
        @endforeach
       
   </tbody>
</table>
       </div>
    </div>
 </div>

<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h4 class="card-title">Create a service</h4>
       </div>
    </div>
    <div class="iq-card-body">
       <form method="post" action="{{ route('create_service') }}">
            @csrf  
             
            <div class="form-group">
                <label for="service_name">Service name</label>
                <input type="text" name="service_name" class="form-control @error('service_name') is-invalid @enderror" id="service_name" >
                @error('service_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          <div class="form-group">
             <label for="service_desc">Service description</label>
             <input type="text" name="service_desc" class="form-control @error('service_desc') is-invalid @enderror" id="service_desc" >
             @error('service_desc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
          <div class="form-group">
            <label for="price">Price $</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" min="0">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="price">Note: We will charge you 20% from service price.</label>
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
       </form>
    </div>
 </div>
@endsection