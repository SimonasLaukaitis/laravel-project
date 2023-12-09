@extends('layouts.app')

@section('title', 'Conferences')

@section('content')

<div class="container">
    <h5 class="mt-4 mb-3">{{ __('app.all_users_management') }}</h5>

    <div class="row">
        <div class="col-md-12">
            <ul class="list-group">
                @if(count($users) > 0)
                    @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h5>{{ $user['name'] }} {{ $user['surname'] }}</h5>
                                <p>User Type: {{ ucfirst($user['user_type']) }}</p>
                                <!-- Add more user information here if needed -->
                                <p>User ID: {{ $user['id'] }}</p>
                                <p>User Email: {{ $user['email'] }}</p>
                            </div>
                            <div>
                               
                                 <a class="btn btn-primary btn-sm" href="{{ route('admin.useredit', ['id' => $user['id']]) }}">{{ __('app.edit') }}</a>
                            </div>
                        </li>
                    @endforeach
                @else
                    <li class="list-group-item">{{ __('app.data_not_found') }}</li>
                @endif
            </ul>
        </div>
    </div>
</div>

@endsection
