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
                {{ HTML::link("about", "Learn More About Us", array('class'=>'btn btn-warning btn-lg text-center contact-more-button')) }}
            </div>        
        </div>
    </header>
    

    <section id="info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="sectionTitle">Some Programs We Have Made</h2>
                
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center project-description">
                        <canvas data-processing-sources=
                                "assets/processing/CircleColorsDiffShapes/CircleColorsDiffShapes.pde"></canvas>
                        <h4>Bubble Explosion</h4>
                        <p>Author: Jane Doe</p>
                        <p>Grade: 10</p>
                        <p>learn more</p>
                    </div>
                    
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center project-description">
                        <canvas data-processing-sources=
                                "assets/processing/CircleColorsDiffShapes/CircleColorsDiffShapes.pde"></canvas>
                        <h4>Cannon Game</h4>
                    </div>
                    
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center project-description">
                        <canvas data-processing-sources
                                ="assets/processing/CircleColorsDiffShapes/CircleColorsDiffShapes.pde"></canvas>
                        <h4>Target Game</h4>
                    </div>
                    
               

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
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                       <h4>More Hellos</h4> 
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
