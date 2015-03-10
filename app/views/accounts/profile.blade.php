@extends('layouts.default')

@section('content')        
    
<!-- About Section ------------------------------------------>
    <section id="profile">
        <div class="container">
            
            <div class="row welcome">
                <div class="col-lg-12 text-center">
                    <div> 
                        <h3>
                            Welcome back 
                            {{ isset(Auth::user()->username) ? Auth::user()->username :  '' }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- MAIN CONTENT ================================================== -->
            <div class="col-lg-9 col-md-9 col-sm-12"> 
                 
                <!-- TABS -->
                <ul class="nav nav-tabs profile-tabs" role="tablist" id="myTab">
                    <li role="presentation">
                        <a a data-toggle="tab" href="#profile">My Profile</a></li>
                    <li role="presentation">
                        <a data-toggle="tab" href=".tab-kids">Kids</a></li>
                    <li role="presentation">
                        <a data-toggle="tab" href=".tab-resources">Favorite Resources</a></li>
                    <li role="presentation">
                        <a data-toggle="tab" href=".tab-photos">Photos</a></li>
                </ul>
                
                <!-- TAB CONTENT -->
                <div class="tab-content">
                    
                    <!-- KIDS TAB PANE -->
                    <div class="tab-kids tab-pane fade in active">
                        
                        <div class="row">
                                <h3>My Kids
                                <button type="button" class="btn btn-primary pull-right kid-buttons"
                                        data-toggle="modal" data-target="#removeKid">
                                    <span class="fa fa-remove"></span>
                                    Remove Kid
                                </button>
                                <button type="button" class="btn btn-primary pull-right kid-buttons"
                                        data-toggle="modal" data-target="#addKid">
                                    <span class="fa fa-plus"></span>
                                    Add Kid
                                </button>
                            </h3>
                        </div>
                        
                       <hr>

                        <div>                            
                        <ul class="media-list">
                           <li class="media">
                              <a class="pull-left" href="#">
                                 <img class="media-object comment-img" src="http://web-helper.gopagoda.com/assets/img/friends/fr-12.jpg"
                                 alt="Generic placeholder image">
                              </a>
                              <div class="media-body">
                                <h4 class="media-heading media-heading-kids-name">Jimmy Grant</h4>
                                  <span class="bold">Age:</span> 3 </br>
                                  <span class="bold">Special Needs: </span>  blind </br>
                                  <span class="bold">About: </span>
                                    This is some sample text. This is some sample text. 
                                    This is some sample text. This is some sample text.
                                    This is some sample text. This is some sample text. 
                                    This is some sample text. This is some sample text.
                                </span>
                            </div>
                            </li>
                        </ul>
                        
                        </div>
                    </div>
                    
                    <!-- RESOURCE TAB PANE -->
                    <div class="tab-resources tab-pane fade">
                        resources


                    </div>
                    
                    <!-- PROFILE TAB PANE -->
                    <div id="profile" class="tab-pane fade showback">
                        <div class="row, posted_message_header"> 
                            <!-- DROP DOWN MENU for LIKES -->
                            <button type="button" id="example" class="btn btn-default
                                                                      posted_message_heart_button" 
                                    data-container="body" data-toggle="popover" data-html="true"
                                    data-placement="bottom" title="Likes"
                                    data-content='<div class="row likes_popup">
                                                      <div class="col-md-3">
                                                        {{HTML::image("assets/img/friends/fr-03.jpg", "user photo", 
                                                        array("class" => "img-rounded", "height" => "90",
                                                        "width" => "90"))}}</div>
                                                     <div class="col-md-9">KittenRules</div>
                                                 </div>
                                                 <div class="row likes_popup">
                                                      <div class="col-md-3">
                                                        {{HTML::image("assets/img/friends/fr-01.jpg", "user photo", 
                                                        array("class" => "img-rounded", "height" => "90",
                                                        "width" => "90"))}}</div>
                                                     <div class="col-md-9">Funny Head</div>
                                                 </div>
                                                 <div class="row likes_popup">
                                                      <div class="col-md-3">
                                                        {{HTML::image("assets/img/friends/fr-02.jpg", "user photo", 
                                                        array("class" => "img-rounded", "height" => "90",
                                                        "width" => "90"))}}</div>
                                                     <div class="col-md-9">LongChamp</div>
                                                </div>'
                                    > <!-- end button -->

                            <span class="fa fa-heart"></span>
                            <span class="posted_message_number_of_likes">155</span>
                            </button>
                        </div>

                        <div class=row>
                            <div class="col-md-2">
                            <img class="media-object posted_message_photo" src="http://web-helper.gopagoda.com/assets/img/friends/fr-06.jpg">

                                <div class="posted_message_usr_name">Cary Grant</div>
                            </div>
                            <div class="col-md-10">
                                {{HTML::image('assets/img/lucern.jpg', 
                                'user photo', array('class' => 'img-rounded'))}}   
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10">
                                <div class="posted_message_caption">
                                <h4 class="posted_message_caption_text">
                                    Snow in the mountains in Switzerland. Almost Christmas!</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row posted_message_footer goleft posted_message_footer_spacing">
                            <div class="col-md-2">
                            </div>
                            <button type="button" class="btn posted_message_footer_button disabled">
                                <span class="comment_button">October 30, 2014</span>
                            </button>

                            
                            <button type="button" class="btn posted_message_footer_button" 
                                    data-toggle="collapse" data-target="#demo" 
                                    aria-expanded="false" aria-controls="demo">
                                13 Comments
                            </button>

                            <button type="button" class="btn posted_message_footer_button"
                                    data-toggle="modal" data-target="#deletePost">
                                <span class="fa fa-trash"></span>
                            </button>

                            

                            <button type="button" class="btn posted_message_footer_button">
                                <span class="fa fa-question-circle"></span>
                            </button>
                        </div>

                        <!-- Drop Down Comments -->
                        <div id="demo" class="collapse">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title">
                                      Comments
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" 
                                     role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        
                                        <!-- media list comments -->
                                        <ul class="media-list">
                                           <li class="media">
                                              <a class="pull-left" href="#">
                                                 <img class="media-object comment-img" src="http://web-helper.gopagoda.com/assets/img/friends/fr-12.jpg"
                                                 alt="Generic placeholder image">
                                              </a>
                                              <div class="media-body">
                                                 <h4 class="media-heading">Media heading</h4>
                                                 <p>This is some sample text. This is some sample text. 
                                                    This is some sample text. This is some sample text.
                                                    This is some sample text. This is some sample text. 
                                                    This is some sample text. This is some sample text.</p>
                                               </div>
                                            </li>
                                            
                                            <li class="media">
                                              <a class="pull-left" href="#">
                                                 <img class="media-object comment-img" src="http://web-helper.gopagoda.com/assets/img/friends/fr-12.jpg"
                                                 alt="Generic placeholder image">
                                              </a>
                                              <div class="media-body">
                                                 <h4 class="media-heading">Media heading</h4>
                                                 <p>This is some sample text. This is some sample text. 
                                                    This is some sample text. This is some sample text.
                                                    This is some sample text. This is some sample text. 
                                                    This is some sample text. This is some sample text.
                                                    This is some sample text. This is some sample text. 
                                                    This is some sample text. This is some sample text.</p>
                                               </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div><!-- /showback -->

                    <!-- ADD PHOTOS -->
                    <!-- http://bootsnipp.com/snippets/featured/bootstrap-drag-and-drop-upload -->
                    <div class="tab-photos tab-pane fade in active showback">
                      <div class="panel panel-default">
                        <div class="drop-down-add-photo" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" 
                               data-parent="#accordion" href="#collapseTwo" 
                               aria-expanded="false" aria-controls="collapseTwo">
                              <span class="fa fa-plus"></span>
                              <span class="add-photos">Add Photos</span>  
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" 
                             aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <div class="bottom-buffer">
                              <h2>Upload Photos, Video, or Audio</h2>
                              <h4>Select files from your computer<h4>
                            </div>
                            <div class="bottom-buffer">
<!--
                              {{ Form::open(array('id' => 'uploads', 'url' => 'user/upload', 'files' => true, 'class' => 'dropzone')) }}
                              {{ Form::close() }}
-->
                            </div>
                          </div>
                        </div>
                      </div>

                      <h3> Photos </h3>
                      <div class="photo-bucket top1">
                        <ul class="row photo-bucket-row">

                        </ul>
                      </div>

                    </div><!--/showback -->
                </div>
            </div>
        </div>
            
            
        </div>
    </section>

@stop