@extends('layouts.app')
@section("content")

    <div class="container-fluid" style="">
        <div class="row">
            <img class="img-fluid bg-img" src="{{ asset('img/bg2.png') }}" style="width: 100%;z-index: -1; user-select: none; object-fit: cover;"/> 
        </div>
        <div class="row justify-content-around text-center mb-3">
            <div class="col-12 col-md-4 mb-5">
                <img class="mb-2 slogan-img" src="{{ asset('img/msg.png') }}"><br>
                <p class="slogan-text"><strong>Think up your message</strong> <br>
                The magic starts here, the words make<br>
                difference. Think of your best motto.</p>
            </div>
            <div class="col-12 col-md-4 mb-5">
                <img class="mb-2 slogan-img" src="{{ asset('img/card.png') }}"><br>
                <p class="slogan-text"><strong>Pay securely</strong> <br>
                Choose from variety of available<br> payments services, it's easy, secure and fast.</p>
            </div>
            <div class="col-12 col-md-4 mb-5">
                <img class="mb-2 slogan-img" src="{{ asset('img/hand.png') }}"><br>
                <p class="slogan-text"><strong>Share it!</strong><br>
                Let your boobify come into the world. Get to<br> collecting smiles, likes and claps, Enjoy!</p>
            </div>
        </div>
        <div class="row justify-content-around text-center mt-5">
            <h1 class="display-4">The Models</h1>
        </div>
        <div class="row justify-content-around text-center mt-5">
            <div class="col-1 col-lg-1 col-xl-2"></div>
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4">
                    @foreach ($models as $model)
                    @php
                        $image = explode(';', $model->images)[0]
                    @endphp
                    <div class="col mb-4">
                        <div class="card" style="background-color: #222222; border-radius: 25px;">
                            <h4 class="card-title mt-2">
                                {{ $model->name }}, {{ $model->age }}
                                @if(Cache::has('user-is-online-' . $model->id))
                                <img class="img-fluid online-icon" style="" src="{{ asset('img/online.png') }}">
                                @else
                                    
                                @endif
                            </h4>
                            {{-- <x-cld-image public-id="{{ $image }}"></x-cld-image> --}}
                                <img class="card-img" src="https://res.cloudinary.com/boobify/image/upload/v1628532918/{{ $image }}">
                            <div class="card-footer">
                                <a href="{{ route('create_order', $model->id) }}"><button class="btn mainBtn">Order now</button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-1 col-xl-2"></div>
        </div>
    </div>

    @include('footer')

@endsection