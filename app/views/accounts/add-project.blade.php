@extends('layouts.default')

@section('content')        
    
<!-- About Section ------------------------------------------>
    <section id="add-project">
        <div class="container">
            
            <!-- Title -->
            <div class="row col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
            </div>

            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6
                        col-sm-offset-3 col-md-offset-3 
                        col-lg-offset-3">
                <div class="row showback">
                    <h3>Upload a Processing Project</h3>
                    
                        <div class="form-group">
                                <div class="alert alert-warning">
                                    <p>You need to upload a Processing file. 
                                        The file extension of a Processing file is .pde</p>
                                </div>
                                
                                <!-- Open the form -->
                                {{ Form::open(array('url'=>'uploadProcessingProject',
                                    'files'=>true)) }}

                                <!-- Project Name --> 
                                <div class="form-group">
                                    {{ Form::label('project-name', 'Project Name') }}
                                    {{ Form::text('project-name',
                                    Input::old('project-name'),
                                    array('placeholder' => 'project name', 
                                    'class' => 'form-control',
                                    'id' => 'project-name')) }}
                                </div>
                                
                                <!-- Get file button -->
                                <div class='file-button'>
                                    {{ Form::label('upload-photo', 'Upload Processing File') }}
                                    {{ Form::file('file','',
                                        array('id' =>'file',
                                        'class' => 'woopdedo')) }}                                      
                                </div>
                
                                <!-- Private or Shared -->
                                <div class="form-group">
                                    {{ Form::label('upload-photo', 'Share Project') }}
                                    {{ Form::radio('sharing','private', true) }} Private
                                    {{ Form::radio('sharing','public') }} Public 
                                </div>

                                <!-- textarea field -->
                                <div class="form-group">
                                    {{ Form::label('project-notes','Project Notes',array('id'=>'','class'=>'')) }}
                                    <br>
                                    {{ Form::text('project-notes',
                                    Input::old('project-notes'),
                                    array('placeholder' => 'project notes', 
                                    'class' => 'form-control',
                                    'id' => 'project-notes')) }}
                                </div>
                               
                                <!-- Submit button -->
                                <div class="form-group">
                                    <a href="add-images">
                                        <button type="button" class="btn btn-info btn-lg add-new-project-button">
                                            Add Images to Project
                                            <span class="fa fa-arrow-right"></span>
                                        </button> 
                                    </a>
                                </div>
                                
                                
                                {{ Form::close() }}
                        
                            </div>

                    <!--
                    {{ Form::open(array('url' => 'loginAfterSignUp',
                    'role' => 'form')) }}
                    
                    <!-- Username
                    <div class="form-group">
                        {{ Form::label('username', 'Username') }}
                        {{ Form::text('username', 
                        Input::old('username'),
                        array( 'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Username', 
                        'id' => 'login-username')) }}
                    </div>

                    <!-- Password
                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', 
                            array('placeholder' => 'Password',
                            'class' => 'form-control')) }}
                    </div>

                    <!-- If there are login errors, show them here
                    <div>
                        @if (Session::has('doLoginAfterSignup'))
                            <!-- Check if pass/username combo was incorrect
                            @if (Session::has('message')) 
                               <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            <!-- Check if user failed to enter password or username
                            @elseif (Session::has('errors'))
                                <div class="alert alert-danger">{{ $errors->first('username')}} 
                                    {{ $errors->first('username')}} </div>
                            @endif
                        @endif
                    </div>
                    
                    <!-- Submit button
                    <div>{{ Form::submit('Login',
                        array('class' => 'btn btn-info',
                        'name' => 'login')) }}</div>
                    
                    {{ Form::close() }}
                    -->
                </div>
            </div>
        </div>
    </section>

@stop