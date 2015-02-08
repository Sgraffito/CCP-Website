@extends('layouts.default')

@section('content')        
    
<!-- About Section ------------------------------------------>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="sectionTitle">About Copper Country Programmers</h2>
                </div>
            </div>
            
            <div class="row">
                <div id="??" 
                     class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    {{HTML::image('assets/img/Brushes.jpg')}}                                                              
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

@stop