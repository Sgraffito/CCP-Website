@extends('layouts.default')

@section('content')        

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
                <div id="map-container" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
        

@stop