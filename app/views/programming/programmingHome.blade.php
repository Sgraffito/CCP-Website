@extends('layouts.default')

@section('content')        
    <!-- Header ------------------------------------------>
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">
                    Hello!
                </div>
                {{ HTML::link("#location", "Learn More About Us", array('class'=>'btn btn-primary btn-lg text-center contact-more-button')) }}
            </div>        
        </div>
    </header>

@stop

