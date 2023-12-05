@extends('layouts.app')

@section('title','Conferences')

@section('content')

<h5>conferences</h5>

 {{-- @if(count($conferences) > 0)
        <ul>
            @foreach($conferences as $conference)
                <li>
                    <h4>{{ $conference['location'] }}</h4>
                    <p>{{ $conference['event_name'] }}</p>
                    <!-- You can display other conference details here -->
                </li>
            @endforeach
        </ul>
    @else
        <p>No conferences available.</p>
    @endif --}}

@endsection