@extends('layouts.app')
@section("content")

    <div class="container-fluid" style="background-size:cover;">
        <div class="row">
            <img class="img-fluid" src="{{ asset('img/bg2.png') }}" style="z-index: -1; user-select: none;"/>
            <div class="col-3"></div>
            <div class="col-6"></div>
            <div class="col-3"></div>   
        </div>
        <div class="row justify-content-around text-center mb-3">
            <div class="col-4">
                <img class="mb-2" width="128" height="82" src="{{ asset('img/msg.png') }}"><br>
                <strong>Think up your message</strong> <br>
                The magic starts here, the words make<br>
                difference. Think of your best motto.
            </div>
            <div class="col-4">
                <img class="mb-2" width="110" height="84" src="{{ asset('img/card.png') }}"><br>
                <strong>Pay securely</strong> <br>
                Choose from variety of available<br> payments services, it's easy, secure and fast.
            </div>
            <div class="col-4">
                <img class="mb-2" width="128" height="94" src="{{ asset('img/hand.png') }}"><br>
                <strong>Share it!</strong><br>
                Let your boobify come into the world. Get to<br> collecting smiles, likes and claps, Enjoy!
            </div>
        </div>
        <div class="row justify-content-around text-center mt-5">
            <p class="h3">The Models</p>
        </div>
        <div class="row justify-content-around text-center mt-5">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="row row-cols-1 row-cols-md-4">
                    @foreach ($models as $model)
                    <div class="col mb-4">
                        <div class="card" style="background-color: #222222; border-radius: 25px;">
                            <h5 class="card-title mt-2">{{ $model->name }}, {{ $model->age }}</h5>
                            <x-cld-image public-id="{{ $model->images }}"></x-cld-image>
                            <div class="card-body">
                                <p class="card-text"></p>
                                <button class="btn mainBtn">Order now</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    @include('footer')

@endsection