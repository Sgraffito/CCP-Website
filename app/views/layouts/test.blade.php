@extends('layouts.default')

@section('content')        
   
 

<!-- About Section ------------------------------------------>
    <section id="student-work">
        
         <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="sectionTitle">Student Work</h2>
            </div>
        </div>
        
        <div class="container">
            
            <div class="tiles">

            @foreach($studentWork as $u)

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
                                <p class="text-muted"> {{ $u->username }} </p>
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
            </div>

            <!--
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 
                            project-description">
                    <canvas data-processing-sources= 
                            {{ $fileName = 'assets/processing/' . $u->project_file_name; }} > 
                    </canvas>
                    <p> Name: {{$u->username }} </p>
                    <p> Title: {{ $u->project_name }} </p>
                    <p> Created: {{ $u->updated_at }}</p>
                </div>
            -->
            
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

 