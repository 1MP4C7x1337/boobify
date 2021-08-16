@extends('layouts.app')
@section("content")
    <form action="{{ route('search') }}" method="post">
        @csrf
        <label>Search model</label>
        <input type="search" name="search">
        <input type="submit" value="search">
    </form>
    {{ dd($result ?? '')}}
@endsection