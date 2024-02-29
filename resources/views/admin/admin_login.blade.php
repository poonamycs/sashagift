<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Admin Panel - Grocery Shop </title><meta charset="UTF-8" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/frontend_images/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{asset('assets/admin/css/backend_css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/admin/css/backend_css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/backend_css/matrix-login.css')}}" />
    <link href="{{asset('assets/admin/fonts/backend_css/css/font-awesome.css')}}" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
</head>
    <body style="overflow: ;">
        <div id="loginbox">
            @if(Session::has('flash_message_error'))            
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))            
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
            @endif
            <form id="loginform" class="form-vertical" method="post" action="{{ url('admin') }}">
                {{ csrf_field() }}
				 <div class="control-group normal_text"> 
                    {{-- <h3> <a href="{{ url('/') }}"><img src="{{asset('images/backend_images/logo.png')}}" alt="Logo" /></a></h3> --}}
                    <h2 class="text-center"><a href="{{ url('/') }}" style="color: #fff">                        
                        SASHA | LOGIN
                    </a></h2>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user fa fa-user"> </i></span><input type="email" name="email" id="email" placeholder="E-mail" value="admin@gmail.com" required=""/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock fa fa-lock"></i></span><input type="password" name="password" value="admin@123" placeholder="Password" required="true"/>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn-link" id="to-recover" style="float: right; margin-right: 10px"><b>Forgot Password?</b></a>
                <div class="control-group">
                    <div class="form-actions">
                        <span class="pull-right"><input type="submit" value="Login" class="btn btn-success btn-lg" style="padding: 15px 175px; font-weight: bold" /></span>
                        {{-- <span class="pull-left"><a href="#" class="flip-link btn btn-info">Lost password?</a></span> --}}
                    </div>
                </div>
            </form>
            <form id="recoverform" action="{{ url('admin/forgot-password/') }}" method="post" class="form-vertical">@csrf
				<p class="normal_text">Enter your registered email address to recover a password.</p>				
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="E-mail address" />
                    </div>
                </div>               
                <div class="form-actions">
                    <span class="pull-left"> <a href="#" class="flip-link btn btn-info" id="to-login">&laquo; Back to login</a> </span>
                    <span class="pull-right"> <button type="submit" class="btn btn-success"/>Recover</button> </span>
                </div>
            </form>
        </div>        
        
        <script src="{{asset('assets/admin/js/backend_js/jquery.min.js')}}"></script>  
        <script src="{{asset('assets/admin/js/backend_js/matrix.login.js')}}"></script>
        <script src="{{asset('assets/admin/js/backend_js/bootstrap.min.js')}}"></script> 
    </body>

</html>
