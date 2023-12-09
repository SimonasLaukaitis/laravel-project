@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <h1 class="mt-4">{{ __('app.add_new') }}</h1>

    
   
    <form method="POST" action="">
      

        <div class="form-group">
            <label for="name">{{ __('app.location') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="">
        </div>

        <div class="form-group">
            <label for="surname">{{ __('app.event_name') }}</label>
            <input type="text" class="form-control" id="surname" name="surname" value="">
        </div>

        <div class="form-group">
            <label for="email">{{ __('app.date') }}</label>
            <input type="date" class="form-control" id="email" name="email" value="">
        </div>

       <div class="form-group">
    <label for="user_type">{{ __('app.info') }}</label>
    <textarea class="form-control custom-textfield" id="user_type" name="user_type"></textarea>
</div>

        <button type="submit" class="btn btn-primary">{{ __('app.update') }}</button>
    </form>

    
</div>
@endsection
