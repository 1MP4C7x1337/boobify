@extends('layouts.app')
@section("content")

    <div class="container-fluid">
        <div class="row" style="">
            <img class="img-fluid" src="{{ asset('img/bg2.png') }}" style="z-index: -1; user-select: none;"/>
            <div class="col-3"></div>
            <div class="col-6"></div>
            <div class="col-3"></div>   
        </div>
        <div class="row justify-content-around text-center">
            <div class="col-4">
                <img class="mb-2" width="128" height="82" src="{{ asset('img/msg.png') }}"><br>
                <strong>Think up your message</strong> <br>
                The magic starts here, the words make<br>
                difference. Think of your best motto.
            </div>
            <div class="col-4">
                <img class="mb-2" width="110" height="82" src="{{ asset('img/card.png') }}"><br>
                <strong>Pay securely</strong> <br>
                Choose from variety of available<br> payments services, it's easy, secure and fast.
            </div>
            <div class="col-4">
                <img class="mb-2" width="128" height="82" src="{{ asset('img/hand.png') }}"><br>
                <strong>Share it!</strong><br>
                Let your boobify come into the world. Get to<br> collecting smiles, likes and claps, Enjoy!
            </div>
        </div>
    </div>

@endsection