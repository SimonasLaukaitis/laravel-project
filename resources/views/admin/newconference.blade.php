@extends('layouts.app')

@section('title', 'Add Conference')

@section('content')
<div class="container">
    <h1 class="mt-4">{{ __('app.add_new') }}</h1>

    <form method="POST" action="{{ route('admin.conference.store') }}">
        @csrf

        <div class="form-group">
            <label for="location">{{ __('app.location') }}</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="event-name">{{ __('app.event_name') }}</label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="event-name" name="event-name" value="{{ old('event-name') }}">
            @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="event_date">{{ __('app.date') }}</label>
            <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="event_date" name="date" value="{{ old('event_date') }}">
            @error('event_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="info">{{ __('app.info') }}</label>
            <textarea class="form-control @error('info') is-invalid @enderror" id="info" name="info">{{ old('info') }}</textarea>
            @error('user_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('app.update') }}</button>
    </form>
</div>
@endsection
