@extends('layouts.app')

@section('content')


<div class="container bootstrap snippet">
    <div class="row text-center">
  		<div class="col-10 text-white-50"><h1>{{ Auth::user()->name }}</h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center profile-edit-btn btn btn-outline-info center-block file-upload">
      </div></hr><br>

               
          <div class="panel panel-default text-white-50">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
          </div>
          
          
          <ul class="list-group py-3">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item"><span><strong>Posts</strong></span> 37</li>
          </ul> 
               
          <div class="panel panel-default text-center py-3">
            <div class="panel-heading text-white-50">Social Media</div>
            <div class="panel-body text-info py-2">
            	<i class="fab fa-facebook-f fa-2x"></i> <i class="fab fa-github fa-2x"></i> <i class="fab fa-twitter fa-2x"></i> <i class="fab fa-pinterest fa-2x"></i> <i class="fab fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
    	<div class="col-9">
    		<ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                	<a href="#bio" class="nav-link" id="bio-tab" data-toggle="tab" role="tab" aria-controls="bio" aria-selected="false">Bio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                </li>
            </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                <form class="form" action="" method="post" id="registrationForm">
                    <div class="form-group text-center">
                    	<div class="form-group">
                        <div class="col-6 offset-3 text-white">
                             <label for="name" class="col-form-label"><h4>Username</h4></label>
                             <input type="text" class="form-control bg-transparent text-white" name="name" id="name" placeholder="{{ $user->name }}" title="Enter your user name.">
                         </div>
                    </div>

                      <div class="form-group">
                          <div class="col-6 offset-3 text-white">
                              <label for="email" class="col-form-label"><h4>Email</h4></label>
                              <input type="email" class="form-control bg-transparent text-white" name="email" id="email" placeholder="{{ $user->email }}" title="Enter your email.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="col-6 offset-3 text-white">
                              <label for="password" class="col-form-label"><h4>{{ __('Password') }}</h4></label>
                              <input type="password" class="form-control bg-transparent text-white" name="password" id="password" placeholder="password" title="Enter your password.">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-6 offset-3 text-white">
                            <label for="password-confirm" class="col-form-label"><h4>{{ __('Confirm Password') }}</h4></label>
                              <input type="password" class="form-control bg-transparent text-white" name="password_confirmation" id="password-confirm" placeholder="password_confirmation" title="Enter your password_confirmation.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-12 text-center">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                  </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="bio">
               
               <h2></h2>
               
               <hr>
                  <form class="form" action="" method="post" id="registrationForm">
                      <div class="form-group text-center">
                          
                          <div class="col-6 text-white">
                              <label for="name" class="col-form-label"><h4>Bio</h4></label>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-10 offset-1 text-white">
                              <textarea class="form-control bg-transparent text-white" name="bio" id="bio" rows="6" title="enter your bio if any."></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                           <div class="col-12 text-center">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
            		
               	
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group text-center">
          
                      <div class="form-group">
                          <div class="col-6 offset-3 text-white">
                              <label for="phone" class="col-form-label"><h4>Phone</h4></label>
                              <input type="text" class="form-control bg-transparent text-white" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-6 offset-3 text-white">
                              <label for="profession" class="col-form-label"><h4>Profession</h4></label>
                              <input type="text" class="form-control bg-transparent text-white" id="profession" placeholder="web dev/chef" title="enter a profession">
                          </div>

                      </div><div class="form-group">
                          <div class="col-6 offset-3 text-white">
                              <label for="experience" class="col-form-label"><h4>Expertise</h4></label>
                              <input type="text" class="form-control bg-transparent text-white" id="experience" placeholder="expert/pro/noob" title="enter a level">
                          </div>
                      </div>

                      <div class="form-group">
                           <div class="col-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->


@endsection