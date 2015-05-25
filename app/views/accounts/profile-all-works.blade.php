@extends('layouts.default')

@section('content')        
    
<!-- About Section ------------------------------------------>

    <section id="profile-all-works">
        <div class="container">
            
            <div class="row welcome">
                <div class="col-lg-12 text-center">
                    <div> 
                        <h2>
                            Welcome back 
                            {{ isset(Auth::user()->username) ? Auth::user()->username :  '' }}
                        </h2>
                                                    
                    </div>
                </div>
            </div>
            
            <hr> 
            
            <div class="current-project text-center">
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
                <div class="tiles">

                @foreach($allWorks as $u)

                <div class="col-xm-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div id="canvas-container">
                                <!-- The canvas -->
                                <canvas data-processing-sources= 
                                        {{ $fileName = 'assets/processing/' . $u->project_file_name; }} > 
                                </canvas>

                                <!-- Caption -->
                                <div class="portfolio-caption text-center">
                                    <h4> {{ $u->project_name }} </h4>
                                    <p class="text-muted"> {{ date("Y",strtotime($u->updated_at)) }}</p>

                                    <!-- More button -->
                                    <a href=" {{ route('studentSingleWork', 
                                       array('project-name' => $u->project_file_name)) }} " >
                                        <button type="button" class="btn btn-info">
                                            More
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- End panel body -->

                    </div>
                </div>

                @endforeach
                </div> <!-- End tiles div -->
            

                <!-- New project buttons -->
                <div class="new-project-button">
                    <div class="pull-right">
                        <button type="button" class="btn btn-info btn-lg add-new-project-button"
                            data-toggle="modal" data-target="#addProject">
                            <span class="fa fa-plus"></span>
                            Add New Project
                        </button> 

                        <!-- Button for Add Processing Project Modal -->
                        <a href="viewAllProjects" >
                        <button type="button" class="btn btn-info btn-lg add-new-project-button">
                            View All
                        </button> 
                        </a>
                    </div>
                </div>
                
                
            </div> <!-- End current project -->
            
            
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

<!-- Script for stacking the rows -->
<!-- http://www.benknowscode.com/2013/12/working-with-variable-height-css-floats.html -->
<script >
    
function fitRows( $container, options ) {
   var cols = options.numColumns,
       $els = $container.children(),
       maxH = 0, j,
       doSize;
   doSize = ( $container.width() != $els.outerWidth(true) );
   $els.each(function( i, p ) {
      var $p = $( p ), h;
      $p.css( 'min-height', '' );
      if ( !doSize ) return;
      maxH = Math.max( $p.outerHeight( true ) + 1, maxH );
      if ( i % cols == cols - 1 || i == cols - 1 ) {
         for ( j=cols;j;j--) {
            $p.css( 'min-height', maxH );
            $p = $p.prev();
         }
         maxH = 0;
      }
   });
}
    
$(window).load(function(){
   var opts = {
      numColumns: 3
   };
    
   
    fitRows( $( '.tiles' ), opts );
    
   $( window ).on( 'resize', function() {
      fitRows( $( '.tiles' ), opts );
   });
});


</script>

@stop