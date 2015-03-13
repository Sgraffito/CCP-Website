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

            <div>
            @foreach($studentWork as $u)
                
                <div id="portfolio" class="tiles">
                    <div class=" col-md-4 col-sm-6 portfolio-item">
                        <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-4x"></i>
                                </div>
                            </div>
                            
                            <!-- The canvas -->
                            <canvas data-processing-sources= 
                                    {{ $fileName = 'assets/processing/' . $u->project_file_name; }} > 
                            </canvas>
                        </a>
                        
                        <!-- Caption -->
                        <div class="portfolio-caption">
                            <h4> {{ $u->project_name }} </h4>
                            <p class="text-muted"> {{ $u->username }} </p>
                            <p class="text-muted"> {{ date("Y",strtotime($u->updated_at)) }}</p>
                        </div>
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
<script>
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

          maxH = Math.max( $p.outerHeight( true ), maxH );
          if ( i % cols == cols - 1 || i == cols - 1 ) {
             for ( j=cols;j;j--) {
                $p.css( 'min-height', maxH );
                $p = $p.prev();
             }
             maxH = 0;
          }

       });
    }

    $(function() {

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

 