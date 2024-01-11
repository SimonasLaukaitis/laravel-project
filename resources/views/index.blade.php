@extends('layouts.app')

@section('title', 'Conferences')

@section('content')

<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
<h2>Simonas Laukaitis</h2>
    <p>PIT-20-I-NT</p>
    <h1 class="main-heading mb-5">{{ __('app.conferences')}}</h1>
    <div class="d-flex justify-content-center">
       <a href="{{ route('client.conferences') }}" onclick="showLoading()" class="btn btn-primary mx-2" href="">{{ __('app.client')}}</a>
       <a class="btn btn-primary mx-2" href="{{ route('worker.conferences') }}">{{ __('app.worker')}}</a>
       <a class="btn btn-primary mx-2" href="{{ route('admin.menu') }}">{{ __('app.administrator')}}</a>
      
       
    </div>
     <p>_______________________________________________________</p>
    <div class="d-flex justify-content-center">
   
     <a class="btn btn-primary mx-2" href="{{ route('admin.userregistration') }}">{{ __('app.userregistration')}}</a>
     </div>
</div>





@endsection