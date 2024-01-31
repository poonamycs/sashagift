<?php 
	use App\Models\Admin; 
	$auth = Admin::where('email', session('adminSession'))->first(); 
?>

<!--Header-part-->
<div id="header">
	<h1><a href="{{ url('/admin/dashboard') }}">@if(session('adminSession')=='admin@gmail.com') Superadmin Panel | Veggi Mart @else Vendor admin Panel | Veggi Mart  @endif</a></h1>
</div>
<!--close-Header-part--> 
<?php date_default_timezone_set('Asia/Kolkata'); $date = date('D, dS M Y'); $time=date("h:i A"); ?>

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
	<ul class="nav">   
		<li class="respo" style="background: #000"><a title="" href="{{ url('/admin/dashboard') }}"> <span class="text" style="font-weight: bold;font-size: 14.5px; color: #fff;"><i class="fa fa-user"></i> @if(session('adminSession')=='admin@gmail.com') <b>Superadmin Panel</b> | Veggi Mart @else Vendor Admin Panel | Veggi Mart @endif</span></a></li>
		<li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text" title="<?php echo session('adminSession'); ?>">Welcome <b><?php echo $auth->vname; ?></span><b class="caret"></b></b></a>
	      <ul class="dropdown-menu">
	        <li><a title="Settings" href="{{ url('/admin/settings') }}"><i class="icon icon-cog"></i> Settings</a></li>
	        <li class="divider"></li>
	        <li><a title="Logout" href="{{url('/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
	      </ul>
	    </li>
	</ul>
</div>

<div id="search">
	<h6 style="color: #27a9e3; padding: 0px 12px 0px 12px; margin-top: 5px;"><i class="fa fa-clock"></i> <?php echo $date.' |'; ?> <span id="clock"></span></h6>
</div>
<style>
	@media screen and (max-width: 667px){
		.respo{
			margin-left: -80px !important;
		}
	}
	.clock {
    	top: 50%;
    	left: 50%;
    	transform: translateX(-50%) translateY(-50%);
    	color: #17D4FE;
    	font-size: 15px;
    	font-family: Orbitron;
    	letter-spacing: 2px;
    	margin-top: 12px;
	}
</style>

<script>
	var myVar = setInterval(function() {
	  myTimer();
	}, 1000);

	function myTimer() {
	  var d = new Date();
	  document.getElementById("clock").innerHTML = d.toLocaleTimeString();
	}
</script>