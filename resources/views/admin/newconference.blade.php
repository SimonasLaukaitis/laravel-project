@extends('layouts.app')

@section('title', 'Add Conference')

@section('content')
<div class="container">
    <h1 class="mt-4">{{ __('app.add_new') }}</h1>

    <form method="POST" action="{{ route('admin.storeConference') }}">
        @csrf

        <div class="form-group">
            <label for="location">{{ __('app.location') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="location" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="event-name">{{ __('app.event_name') }}</label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="event-name" name="surname" value="{{ old('surname') }}">
            @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">{{ __('app.date') }}</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="info">{{ __('app.info') }}</label>
            <textarea class="form-control @error('user_type') is-invalid @enderror" id="info" name="user_type">{{ old('user_type') }}</textarea>
            @error('user_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('app.update') }}</button>
    </form>
</div>
@endsection
