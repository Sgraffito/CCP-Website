@extends('layouts.default')

@section('content')        
    
<!-- About Section ------------------------------------------>
    <section id="student-single-work">
        <div class="container">
                
                @foreach($projectName as $u)

                <div class="col-md-12 col-lg-12 text-center">
                    
                    <canvas id="mysketchcanvasid" data-processing-sources= 
                            {{ $fileName = 'assets/processing/' . $u->project_file_name; }} > 
                    </canvas>
                    
                </div>
                
                <div class="col-md-12 col-lg-12 info-content">
                    <h3> Title: {{ $u->project_name }} </h3>
                    <h4> Author: {{ $u->username }} </h4>
                    <h4> Created: {{ date("Y",strtotime($u->updated_at)) }} </h4>
                    
                    <!-- Only display the note if it is not empty -->
                    @if($u->project_notes)
                    <h4> Notes: {{ $u->project_notes }} </h4>
                    @endif
                    
                    <div class="edit-code-buttons">
                        <!-- Show Code button -->
                        <button type="button" class="btn btn-info btn-lg" id="show-code"
                                onclick="showCode(' {{ 'assets/processing/' . $u->project_file_name }}');"
                                >
                            <span class="fa fa-code fa-lg"></span>
                            Show Code
                        </button>
                        
                        @if (Auth::check()) 
                            <!-- Only let owner edit & delete a project -->
                            @if ($u->username == Auth::user()->username)

                            <!-- Edit button -->
                            <a href=" {{ route('studentSingleWork', 
                               array('project-name' => $u->project_file_name)) }} " >
                                <button type="button" class="btn btn-info btn-lg">
                                    <span class="fa fa-edit fa-lg"></span>
                                    Edit Project
                                </button>
                            </a>

                            <!-- Delete Project button -->
                            <button type="button" class="btn btn-info btn-lg" 
                                    data-toggle="modal" data-target="#deleteProject">
                                <span class="fa fa-trash-o fa-lg"></span>
                                Delete Project
                            </button>
                            @endif
                        @endif
                    </div>
                    
                    <!-- Processing code -->
                    <pre><code class="processing" id="single-program-code">...</code></pre>
                                        
                </div>
                @endforeach

           
        </div>
    </section>

<!-- Modal Delete Account -->
<div class="modal fade" id="deleteProject" tabindex="-1" role="dialog" 
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
                    Deleting Project
                </h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <div class="alert alert-danger">
                        <p>Are you sure you want to delete your project?</p>
                        <p>This action cannot be undone</p>
                    </div>

                    <!-- Open the form -->
                    {{ Form::open(array('url' => 'deleteProject', 
                    'role' => 'form')) }}

                    <!-- Submit button -->
                    <div>
                        
                        <!-- Hidden form for project-name -->
                        {{ Form::hidden('project-name', $u->project_file_name) }}
                        
                        <!-- Delete button -->
                        {{ Form::submit('Delete Project', 
                        array('class' => 'btn btn-danger',
                        )) }}
                        
                        <!-- Cancel button -->
                        <button type="button" class="btn btn-info"
                            data-dismiss="modal">
                            Cancel
                        </button>  
                    </div>

                    <!-- Close the form -->
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div> <!-- End Modal for adding Processing Project -->


<script>

var click = 0;
 
function showCode(file) {
    click += 1;
    if (click % 2 == 0) {
        document.getElementById('single-program-code').innerHTML = "";
        document.getElementById('show-code').innerHTML = "<span class='fa fa-code fa-lg'></span> Show Code";
        document.getElementById("show-code").style.background='#34495e';
    }
    else {
        readTextFile(file);
        document.getElementById('show-code').innerHTML = "<span class='fa fa-code fa-lg'></span> Hide Code";
        document.getElementById("show-code").style.background='#B62367';
    }
}
    
function readTextFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                document.getElementById('single-program-code').innerHTML = allText;
                
                // For hightlight.js
                hljs.initHighlighting.called = false; // Must do this first
                hljs.initHighlighting();
            }
        }
    }
    rawFile.send(null);
}
    
/* hightlight.js */
$(document).ready(function() {
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });
});


</script>

<script type="text/javascript">
    var bound = false;

    function bindJavascript() {
        var pjs = Processing.getInstanceById('mysketchcanvasid');
        if(pjs!=null) {
            pjs.bindJavascript(this);
            bound = true; }
        if(!bound) setTimeout(bindJavascript, 250); }

    bindJavascript();

    function showXYCoordinates(x, y) {
        document.getElementById('xcoord').value = x;
        document.getElementById('ycoord').value = y; }
</script>

@stop