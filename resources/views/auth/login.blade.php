@extends('auth.master')
@section('content')
<h1>Log in to {{config('app.app_name')}}</h1>
{!! Form::open(['class' => 'pure-form pure-form-stacked']) !!}
    <input class="pure-input-1" type="text" name="email" placeholder="Email"/>
    <input class="pure-input-1" type="password" name="password" placeholder="Password"/>
    <label for="remember" class="pure-checkbox">
           <input id="remember" type="checkbox" name="remember"> Remember me
       </label>
    <button class="pure-button" type="submit" name="Submit">Login</button>
{!! Form::close() !!}
@endsection
