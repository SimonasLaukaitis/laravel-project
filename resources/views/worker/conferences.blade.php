@extends('layouts.app')

@section('title', 'Conferences')

@section('content')

<div class="container">

    <h4 class="mt-4 mb-3">{{ __('app.conferences') }}</h4>
    <h4 class="mt-4 mb-3">{{ __('app.future_conferences') }}</h4>

    <div class="">
        @if(count($conferences) > 0)
            <div class="slider">
                @foreach($conferences as $conference)
                    @php
                        $currentDate = \Carbon\Carbon::now()->format('Y-m-d');
                    @endphp

                    @if($conference['event_date'] > $currentDate)
                        <div class="card border-primary" style="margin-left: 5px; margin-right: 5px; height: 250px; display: flex; flex-direction: column; justify-content: space-between;">
                            <div class="card-body">
                                <label for="ev-name">{{ __('app.event_name') }}</label>
                                <h4 id="ev-name">{{ $conference['event_name'] }}</h4>
                            </div>
                            <div style="margin-top: auto; margin-left: 20px; margin-bottom: 20px;">
                                <a href="{{ route('worker.show', ['id' => $conference['id']]) }}" onclick="showLoading()" class="btn btn-primary">{{ __('app.more') }}</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="col-md-12">
                <p>No conferences available.</p>
            </div>
        @endif
    </div>

    <h4 class="mt-4 mb-3">{{ __('app.all_conferences') }}</h4>
    <div class="row">
        @if(count($conferences) > 0)
            @foreach($conferences as $conference)
                <div class="col-md-6 mb-4">
                    <div class="card border-primary h-100">
                        <div class="card-body d-flex flex-column">
                            <label for="ev-name">{{ __('app.event_name') }}</label>
                            <h4 id="ev-name">{{ $conference['event_name'] }}</h4>
                            <div class="mt-auto">
                                <br>
                                <a href="{{ route('worker.show', ['id' => $conference['id']]) }}" onclick="showLoading()" class="btn btn-primary">{{ __('app.more') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <p>No conferences available.</p>
            </div>
        @endif
    </div>

</div>
@endsection
