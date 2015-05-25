@extends('layouts.default')

@section('content')        
    <!-- Header ------------------------------------------>
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">
                    Welcome To The Copper Country Programmers Site!</div>
                <div class="intro-heading">
                    CCP is a programming group for middle and high school kids in Michigan's Keweenaw Peninsula
                </div>
                {{ HTML::link("about", "Learn More About Us", 
                array('class'=>'btn btn-warning btn-lg text-center contact-more-button')) }}
            </div>        
        </div>
    </header>
    

    <section id="info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="sectionTitle">Some Programs We Have Made</h2>
                
                    @foreach($exampleWorks as $u)

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
            </div>
        </div>
    </section>

    
    <!-- Services Section ------------------------------------------>
    <section id="classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="sectionTitle">Our Classes</h2>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        {{ HTML::image('assets/img/Class2014.png') }}
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">                        
                        
                            <h4>Have you ever wondered how websites are built, how video games are created, or how apps for smartphones are designed? They were all created using programming languages, which are special languages that allow people to communicate with computers. </h4>
                            <h4>Every Saturday we teach middle and high school students how to program.
                                Classes are taugh by MTU professors and students. Currently we have three groups of students: beginners, intermediate, and advance. </h4>
                            <h4>Beginner Group</h4>
                            <i class="fa fa-check-circle"> <b>HTML</b>: build your own website</i> <br>
                            <i class="fa fa-check-circle"> <b>LOGO</b>: make cool art</i> <br>
                            <i class="fa fa-check-circle"> <b>Processing</b>: create video games</i> <br>

                            <h4>Intermediate Group </h4>
                            <i class="fa fa-check-circle"> <b>LOGO</b>: do more advance coding with LOGO</i> <br>
                            <i class="fa fa-check-circle"> <b>Processing</b>: create advance video games</i> <br>

                            <h4>Advance Group</h4>
                            <i class="fa fa-check-circle"> <b>Java</b>: learn how to use the coding language used by professionals</i> <br>
                            <i class="fa fa-check-circle"> <b>Contests</b>: put your Java skills to use when you participate in Bonzai Brawl</i> <br>
                        
                    </div>

                </div>
            </div>
        </div>

    </section>
    
<!--
     About Section ----------------------------------------
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                </div>
            </div>
        </div>
    </section>
-->
@stop
