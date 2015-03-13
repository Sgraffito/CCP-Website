@extends('layouts.default')

@section('content')        
    
<!-- About Section ------------------------------------------>
   

    <section id="profile">
        <div class="container">
            
            <div class="row welcome">
                <div class="col-lg-12 text-center">
                    <div> 
                        <h2>
                            Welcome back 
                            {{ isset(Auth::user()->username) ? Auth::user()->username :  '' }}
                        </h2>
                        
                        <hr>
                            
                    </div>
                </div>
            </div>
            
            <div class="current-project">
                <h3>Your Current Projects</h3>
                
                <!-- If there are login errors, show them here -->
                <div>
                    @if (Session::has('upload-project-error'))
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
                
                
                <!-- Display all the projects --> 
                @foreach($currentUserWork as $work)
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center 
                                project-description">
                        <canvas data-processing-sources= 
                                {{ $fileName = 'assets/processing/' . $work->project_file_name; }} > 
                        </canvas>        
                    </div>
                @endforeach
                
                
            </div>
            
            <div class="pull-right">
            <button type="button" class="btn btn-info btn-lg add-new-project-button"
                data-toggle="modal" data-target="#addProject">
                <span class="fa fa-plus"></span>
                Add New Project
            </button> 
            
            <!-- Button for Add Processing Project Modal -->
            <button type="button" class="btn btn-info btn-lg add-new-project-button"
                data-toggle="modal" data-target="#addProject">
                View All
            </button> 
            </div>
            
            <!-- Modal Add Processing Project -->
            <div class="modal fade" id="addProject" tabindex="-1" role="dialog" 
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">
                                Close
                                </span>
                            </button>
                            <h4 class="modal-title centered" id="myModalLabel">
                                Upload Processing Project
                            </h4>
                        </div>

                        <div class="modal-body">
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
                                    {{ Form::label('upload-photo', 'Upload Photo') }}
                                    {{ Form::file('file','',
                                        array('id' =>'file',
                                        'class' => 'woopdedo')) }}
                                </div>
                                
                                <!-- Private or Shared -->
                                <div class="form-group">
                                    {{ Form::label('upload-photo', 'Share Project') }}
                                    <br>
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
                                    {{ Form::submit('Upload Project',
                                    array('class' => 'btn btn-info',
                                    'name' => 'save-user-photo')) }}
                                </div>
                                
                                <!-- Close the form -->
                                {{ Form::close() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Modal for adding Processing Project -->
            
        </div>
    </section>


@stop