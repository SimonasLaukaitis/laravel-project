@extends('layouts.app')

@section('title', 'Conferences')

@section('content')

<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <h1 class="main-heading mb-5">{{ __('app.conferences')}}</h1>
    <div class="d-flex justify-content-center">
        <button class="btn btn-primary mx-2">{{ __('app.client')}}</button>
        <button class="btn btn-primary mx-2">{{ __('app.worker')}}</button>
        <button class="btn btn-primary mx-2">{{ __('app.administrator')}}</button>
    </div>
</div>



@endsection