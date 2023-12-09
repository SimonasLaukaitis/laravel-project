@extends('layouts.app')

@section('title', 'Conferences')

@section('content')

<div class="container">

    <h5 class="mt-4 mb-3">{{ __('app.conferences') }}</h5>
    <p><a href="{{ route('admin.newconference') }}" onclick="showLoading()" class="btn btn-primary">{{ __('app.add_new') }}</a><br></p>
     
    <div class="row">
        @if(count($conferences) > 0)
            @foreach($conferences as $conference)
                <div class="col-md-6 mb-4">
                    <div class="card border-primary h-100">
                        <div class="card-body d-flex flex-column">
                            <label for="ev-name">{{ __('app.event_name') }}</label>
                            <h4 id="ev-name">{{ $conference['event_name'] }}</h4>
                            {{-- <p>{{ $conference['id'] }}</p> --}}

                            @if(isset($conference['event_date']))
                                <h5>{{ $conference['event_date'] }}</h5>
                            @endif

                            <label for="ev-location">{{ __('app.location') }}</label>
                            <h5 id="ev-location">{{ $conference['location'] }}</h5>
                            <p>{{ __('app.registered_users') }}</p>
                            @if(isset($conference['registered_users']) && count($conference['registered_users']) > 0)
                                <ul>
                                    @foreach($conference['registered_users'] as $user)
                                        <li>{{ $user }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>{{ __('app.no_registered_users') }}</p>
                            @endif
                            
                            <div class="mt-auto">
                            <br>
                            {{-- {{ route('client.show', ['id' => $conference['id']]) }} --}}
                            <a href="" onclick="showLoading()" class="btn btn-primary">{{ __('app.edit') }}</a>
                            
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
