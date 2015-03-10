@extends('layouts.default')

@section('content')        

<!-- Login Section ------------------------------------------>
    <section id="login">
        <div class="container">
            
            <!-- Title -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="sectionTitle">Login</h2>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
                <div class="row showback">
                    <h3>Sign-In</h3>
                    
                    {{ Form::open(array('url' => 'login',
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
                        @if (Session::has('login'))
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
                        'name' => 'login',
                        'page' => 'myAccountSettings')) }}</div>
                    
                    {{ Form::close() }}
                </div>
            </div>
            
            
            <!-- form validator https://1000hz.github.io/bootstrap-validator/# -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
                <div class="row showback">

                    <h4>No Account Yet? Join today!</h4>
                    <h3>Sign-Up</h3>
                   
                    {{ Form::open(array('url' => 'sign-up', 
                    'role' => 'form')) }}
                    
                    <!-- Username --> 
                    <div class="form-group">
                        {{ Form::label('signup-username', 'Username') }}
                        {{ Form::text('signup-username', 
                        Input::old('signup-username'),
                        array( 'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Username', 
                        'id' => 'sign-up-username')) }}
                        <span class="help-block with-errors">
                            Minimum of six letters and numbers
                        </span>
                    </div>
                    
                    <!-- Email --> 
                    <div class="form-group">
                        {{ Form::label('signup-email', 'Email') }}
                        {{ Form::text('signup-email',
                        Input::old('signup-email'),
                        array('placeholder' => 'Email', 
                        'class' => 'form-control',
                        'id' => 'inputEmail')) }}
                        <div class="help-block with-errors"></div>
                    </div>
                    
                    <!-- Password --> 
                    <div class="form-group">
                        {{ Form::label('signup-password', 'Password') }}
                        {{ Form::password('signup-password', 
                        array('placeholder' => 'Password',
                        'class' => 'form-control')) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('signup-confirm-password', 'Confirm Password') }}
                        {{ Form::password('signup-confirm-password', 
                        array('placeholder' => 'Confirm Password',
                        'class' => 'form-control')) }}
                    </div>

                     <!-- if there are login errors, show them here -->
                    <div>
                        @if (Session::has('signup-error'))
                            <!-- Check if pass/username combo was incorrect -->
                            @if (Session::has('message')) 
                               <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            <!-- Check if user failed to enter password or username -->
                            @elseif (Session::has('errors'))
                                <div class="alert alert-danger">{{ $errors->first('signup-username')}} 
                                    {{ $errors->first('signup-email')}}
                                    {{ $errors->first('signup-password')}}
                                    {{ $errors->first('signup-confirm-password')}}
                                    </div>
                            @endif
                        @endif
                    </div>
                    
                    <!-- Submit button -->
                    <div>{{ Form::submit('Sign-Up',
                        array('class' => 'btn btn-danger',
                        'name' => 'sign-up')) }}</div>
                    
                    {{ Form::close() }}
                </div>
            </div>  <!-- End Form -->
            
            
        </div> <!-- End Container Class -->
    </section>

@stop