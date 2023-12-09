@extends('layouts.app')

@section('title', 'Conferences')

@section('content')

<div class="container text-center mt-5">
    <h4 class="mb-4">{{ __('app.admin_menu') }}</h4>
    <br><br><br><br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a class="btn btn-primary btn-block mb-3" href="{{ route('admin.userlist') }}">{{ __('app.all_users_management')}}</a>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary btn-block mb-3" href="{{ route('admin.conferencelist') }}">{{ __('app.conference_management')}}</a>
        </div>
    </div>
</div>

@endsection
