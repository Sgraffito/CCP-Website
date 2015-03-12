@extends('layouts.default')

@section('content')        
    
<!-- About Section ------------------------------------------>
    <section id="my_account_settings">
        <div class="container">

            <!-- Title -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="sectionTitle">Your Account</h2>
                </div>
            </div>
            
            @if(isset(Auth::user()->username))

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6
                            col-sm-offset-3 col-md-offset-3 
                            col-lg-offset-3">
                <div class="row showback">                    
                    
                    <h4>Your Account Info </h4>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        @if (isset(Auth::user()->photo_file_name)) 
                            {{ HTML::image('/assets/uploads/' . Auth::user()->photo_file_name) }}

                        @else
                        <div>
                            <p>empty!</p>
                        </div>
                        @endif
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <p><b>Username:</b> {{ Auth::user()->username }}</p>
                        <p><b>Email:</b> {{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Add profile picture -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
                <div class="row showback">
                    <div class="row">
                    
                    <h4>Add Profile Picture</h4>
 
                        <div class="alert alert-warning">
                            <p> Image should be at least 300 by 300 pixels</p>
                        </div>
                        
                        <!-- Open the form -->
                        {{ Form::open(array('url'=>'uploadUserPhoto',
                            'files'=>true)) }}

                        <!-- Get file button -->
                        <div class='file-button'>
                        {{ Form::file('file','',
                            array('id'=>'file','class'=>'btn btn-info')) }}
                        </div>

                        <!-- Submit button -->
                        <div>
                            {{ Form::submit('Save Picture',
                            array('class' => 'btn btn-info',
                            'name' => 'save-user-photo')) }}
                        </div>
                        
                        <!-- If there are login errors, show them here -->
                        <div>
                            @if (Session::has('user-photo-error'))
                                <!-- Check if pass/username combo was incorrect -->
                                @if (Session::has('message'))
                                    <div class="alert alert-danger">
                                       {{ Session::get('message') }}
                                    </div>
                                @elseif (Session::has('errors')) 
                                    <div class="alert alert-danger">
                                        {{ $errors->first('file') }} 
                                    </div>
                                @endif
                            @endif
                            
                            @if (Session::has('success')) 
                                <div class="alert alert-info">
                                   {{ Session::get('success') }}
                                </div>
                            @elseif (Session::has('error'))
                                <div class="alert alert-danger">
                                   {{ Session::get('error') }}
                                </div>
                            @endif
                        </div>
                        
                        {{ Form::close() }}
                        
                    </div>
                </div>
            </div>
            
            <!-- Change password -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
                <div class="row showback">
                    <div class="row">
                        <h4>Change Password</h4>
                        
                        {{ Form::open(array('url' => 'changeOldPassword', 
                            'role' => 'form')) }}
                    
                        <!-- Old Password -->
                        <div class="form-group">
                            {{ Form::label('old-password', 'Old Password') }}
                            {{ Form::password('old-password', 
                                array( 'type' => 'text',
                                'class' => 'form-control',
                                'placeholder' => 'old password', 
                                'id' => 'old-password' )) }}
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            {{ Form::label('new-password', 'New Password') }}
                            {{ Form::password('new-password', 
                                array('placeholder' => 'new password',
                                'class' => 'form-control',
                                'id' => 'new-password' )) }}
                        </div>

                        <!-- If there are login errors, show them here -->
                        <div>
                            @if (Session::has('new-password-error'))
                                <!-- Check if pass/username combo was incorrect -->
                                @if (Session::has('message'))
                                   <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                @elseif (Session::has('errors')) 
                                    <div class="alert alert-danger">{{ $errors->first('old-password')}} 
                                        {{ $errors->first('new-password')}} </div>
                                <!-- Check if user failed to enter password or username -->
                                @endif
                            @endif
                        </div>
                        
                        <!-- Submit button -->
                        <div>
                            {{ Form::submit('Change Password',
                            array('class' => 'btn btn-info',
                            'name' => 'change_old_password')) }}
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div> 

            <!-- Change email -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
                <div class="row showback">
                    <div class="row">
                        <h4>Change Email</h4>
                        
                        {{ Form::open(array('url' => 'changeEmail', 
                            'role' => 'form')) }}
                    
                        <div class="alert alert-warning">
                            <p>Your current email address: {{ Auth::user()->email }} </p>   
                        </div>

                        <!-- New Email -->
                        <div class="form-group">
                        {{ Form::label('new-Email', 'New Email') }}
                        {{ Form::text('new-email', 
                            Input::old('new-email'),
                            array( 'type' => 'text',
                            'class' => 'form-control',
                            'placeholder' => 'new email', 
                            'id' => 'new-email')) }}                        
                        </div>

                        <!-- If there are login errors, show them here -->
                        <div>
                            @if (Session::has('new-email-error'))
                                <!-- Check if pass/username combo was incorrect -->
                                @if (Session::has('message'))
                                   <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                @elseif (Session::has('errors')) 
                                    <div class="alert alert-danger">
                                        {{ $errors->first('new-email')}} </div>
                                @endif
                            @endif
                        </div>
                        
                        <!-- Submit button -->
                        <div>
                            {{ Form::submit('Change Email',
                            array('class' => 'btn btn-info'
                            )) }}
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div> 

            <!-- Delete account -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
                <div class="row showback">
                    <div class="row">

                        <h4>Delete Account</h4>
                        <div class="alert alert-danger">
                            <p>Warning: deleting your account cannot be undone.</p>
                        </div>

                        {{ Form::open(array('url' => 'deleteAccount', 
                            'role' => 'form')) }}

                        <!-- Submit button -->
                        <div>
                            {{ Form::submit('Delete Account',
                            array('class' => 'btn btn-danger'
                            )) }}
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        
            @endif

        </div> <!-- end container -->
    </section>

@stop