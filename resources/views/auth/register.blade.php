@extends('auth.master')
@section('content')
<h1>Sign up for {{config('app.app_name')}}</h1>
{!! Form::open(['class' => 'pure-form pure-form-stacked']) !!}
    <input class="pure-input-1" type="text" name="first_name" placeholder="First Name"/>
    <input class="pure-input-1" type="text" name="last_name" placeholder="Last Name"/>
    <input class="pure-input-1" type="email" name="email" placeholder="Email Address"/>
    <input class="pure-input-1" type="password" name="password" placeholder="Password"/>
    <input class="pure-input-1" type="password" name="password_confirmation" placeholder="Password Confirmation"/>
    <button class="pure-button" type="submit" name="Submit">Sign up</button>
{!! Form::close() !!}
@endsection
