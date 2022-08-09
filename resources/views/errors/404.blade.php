@extends('errors.illustrated-layout')

@section('code', '404 😭')

@section('title', __('Page Not Found'))

@section('image')

    <div class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
    </div>

@endsection

@section('message', $messageError)
