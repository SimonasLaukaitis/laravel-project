@extends('layouts.app')

@section('title', 'Edit Conference')

@section('content')
<div class="container">
    <h1 class="mt-4">{{ __('app.edit') }}</h1>

    @if(isset($conference))
    {{-- {{ route('conference.update', $conference->id) }} --}}
    <form method="POST" action="">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">{{ __('app.location') }}</label>
            <input type="text" class="form-control" id="name" name="location" value="{{ $conference['location']}}">
        </div>

        <div class="form-group">
            <label for="event_name">{{ __('app.event_name') }}</label>
            <input type="text" class="form-control" id="event_name" name="event_name" value="{{ $conference['event_name'] }}">
        </div>

        <div class="form-group">
            <label for="event_date">{{ __('app.date') }}</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $conference['event_date'] }}">
        </div>

        <div class="form-group">
            <label for="info">{{ __('app.info') }}</label>
            <textarea class="form-control custom-textfield" id="info" name="info">{{ $conference['info'] }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('app.update') }}</button>
    </form>
    @else
    <p class="alert alert-warning">{{ __('app.data_not_found') }}</p>
    @endif
</div>
@endsection
