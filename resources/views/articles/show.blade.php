@extends('layouts.app')

@section('title','Article Show')

@section('content')



<h4>{{ $article['title'] }}</h4>
<p>{{ $article['content'] }}</p>

@endsection