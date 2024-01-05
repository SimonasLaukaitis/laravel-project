@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <h1 class="mt-4">{{ __('app.edit') }}</h1>

    @if(isset($user))
   
    <form method="POST" action="{{ route('admin.useredit', ['id' => $user->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">{{ __('app.name') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
        </div>

        <div class="form-group">
            <label for="surname">{{ __('app.surname') }}</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ $user['surname'] }}">
        </div>

        <div class="form-group">
            <label for="email">{{ __('app.email') }}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
        </div>

        <div class="form-group">
            <label for="user_type">{{ __('app.user_type') }}</label>
            <select class="form-control" id="user_type" name="user_type">
                <!-- Assuming you have predefined user types -->
                <option value="client" {{ $user['user_type'] === 'client' ? 'selected' : '' }}>Client</option>
                <option value="worker" {{ $user['user_type'] === 'worker' ? 'selected' : '' }}>Worker</option>
                <option value="admin" {{ $user['user_type'] === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('app.update') }}</button>
    </form>
    @else
    <p class="alert alert-warning">{{ __('app.data_not_found') }}</p>
    @endif
</div>
@endsection
