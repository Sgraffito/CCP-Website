@extends('layouts.default')

@section('content')        
    <!-- Header ------------------------------------------>
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">
                    Welcome To The Copper Country Programmers Site!</div>
                <div class="intro-heading">
                    CCP is a programming group for middle and high school kids in Michigan's Copper Country
                </div>
                {{ HTML::link("#location", "Learn More About Us", array('class'=>'btn btn-primary btn-lg text-center contact-more-button')) }}
            </div>        
        </div>
    </header>
    

    <!-- About Section ------------------------------------------>
    <section id="about">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="sectionTitleInverse">About CCP</h2>
                </div>
            </div>
            
            <div class="row">
                <div id="??" 
                     class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h4>Have you ever wondered how websites are built, how video games are created, or how apps for smartphones are designed? They were all created using programming languages, which are special languages that allow people to communicate with computers. </h4>
                    <p>Every Saturday we teach middle and high school students how to program.
                        Classes are taugh by MTU professors and students. Currently we have three groups of students: beginners, intermediate, and advance. </p>
                    <h4>Beginner Group</h4>
                    <i class="fa fa-check-circle"> <b>HTML</b>: build your own website</i>
                    <i class="fa fa-check-circle"> <b>LOGO</b>: make cool art</i>
                    <i class="fa fa-check-circle"> <b>Processing</b>: create video games</i>

                    <h4>Intermediate Group </h4>
                    <i class="fa fa-check-circle"> <b>LOGO</b>: do more advance coding with LOGO</i>
                    <i class="fa fa-check-circle"> <b>Processing</b>: create advance video games</i>
                    
                    <h4>Advance Group</h4>
                    <i class="fa fa-check-circle"> <b>Java</b>: learn how to use the coding language used by professionals</i>
                    <i class="fa fa-check-circle"> <b>Contests</b>: put your Java skills to use when you participate in Bonzai Brawl</i>
                </div>
            </div>
        </div>
    </section>


    <!-- Hours & Location Section ------------------------------------------>
    <section id="location">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="sectionTitle">Hours &amp Location</h2>
                </div>
            </div>
            
            <!-- Map -->
            <div class="row">
                <div id="map-container" 
                     class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h4>We meet in the Michigan Tech Library every 
                    Saturday afternoon for two hours. All students are welcome.</h4>
                    <p>January through May 2015</br>
                        Saturdays: 11:00am-1:00pm </br>
                        Room 244 of the MTU Library</p>
                    <p class="smaller">
                        Michigan Technologial University</br>
                        1400 Townsend Drive
                        Houghton, MI 49931
                    </p>
                </div>
            </div>
        </div>
    </section>
        
    
    
    <!-- Services Section ------------------------------------------>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact</h2>
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
