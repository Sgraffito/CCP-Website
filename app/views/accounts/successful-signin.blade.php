@extends('layouts.default')

@section('content')        
    
<!-- About Section ------------------------------------------>
    <section id="successful-signin">
        <div class="container">
            
            <!-- Title -->
            <div class="row col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
                <div class="col-lg-12 text-center">
                    <div class="alert alert-info">You have signed up!</br>
                    Please re-enter your information to login.</div>
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
                <div class="row showback">
                    <h3>Sign-In</h3>
                    
                    {{ Form::open(array('url' => 'loginAfterSignUp',
                    'role' => 'form')) }}
                    
                    <!-- Username -->
                    <div class="form-group">
                        {{ Form::label('username', 'Username') }}
                        {{ Form::text('username', 
                        Input::old('username'),
                        array( 'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Username', 
                        'id' => 'login-username')) }}
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', 
                            array('placeholder' => 'Password',
                            'class' => 'form-control')) }}
                    </div>

                    <!-- If there are login errors, show them here -->
                    <div>
                        @if (Session::has('doLoginAfterSignup'))
                            <!-- Check if pass/username combo was incorrect -->
                            @if (Session::has('message')) 
                               <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            <!-- Check if user failed to enter password or username -->
                            @elseif (Session::has('errors'))
                                <div class="alert alert-danger">{{ $errors->first('username')}} 
                                    {{ $errors->first('username')}} </div>
                            @endif
                        @endif
                    </div>
                    
                    <!-- Submit button -->
                    <div>{{ Form::submit('Login',
                        array('class' => 'btn btn-info',
                        'name' => 'login')) }}</div>
                    
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>

@stop