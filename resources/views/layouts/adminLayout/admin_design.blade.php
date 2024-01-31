<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel | Sasha</title>
	<meta charset="UTF-8" />
	<link rel="shortcut icon" type="image/png" href="{{ asset('assets/admin/images/frontend_images/favicon.png') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/bootstrap-responsive.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/datepicker.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/uniform.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/fullcalendar.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/select2.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/matrix-style.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/matrix-media.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/admin/fonts/backend_fonts/css/font-awesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/jquery.gritter.css') }}" />
	{{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/bootstrap-wysihtml5.css') }}" /> --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.0/sweetalert.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/font-awesome.css') }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
	<link rel="stylesheet" href="{{ asset('assets/admin/css/backend_css/all.css') }}" />
</head>
<body>

	@include('layouts.adminLayout.admin_header')
	@include('layouts.adminLayout.admin_sidebar')

	@yield('content')

	<!-- main-container-part -->

	@include('layouts.adminLayout.admin_footer')

	<script src="{{ asset('assets/admin/js/backend_js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/admin/js/backend_js/jquery.ui.custom.js') }}"></script> 
	<script src="{{ asset('assets/admin/js/backend_js/bootstrap.min.js') }}"></script> 
	<script src="{{ asset('assets/admin/js/backend_js/jquery.uniform.js') }}"></script> 
	<script src="{{ asset('assets/admin/js/backend_js/select2.min.js') }}"></script> 
	<script src="{{ asset('assets/admin/js/backend_js/jquery.validate.js') }}"></script> 
	<script src="{{ asset('assets/admin/js/backend_js/matrix.js') }}"></script> 
	<script src="{{ asset('assets/admin/js/backend_js/matrix.form_validation.js') }}"></script>
	<script src="{{ asset('assets/admin/js/backend_js/matrix.tables.js') }}"></script>
	<script src="{{ asset('assets/admin/js/backend_js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/admin/js/backend_js/matrix.popover.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.0/sweetalert.js"></script>
	<script src="{{ asset('assets/admin/js/backend_js/bootstrap-datepicker.js') }}"></script>
	<!-- <script src="{{ asset('js/backend_js/wysihtml5-0.3.0.js') }}"></script> -->
	<!-- <script src="{{ asset('js/backend_js/bootstrap-wysihtml5.js') }}"></script> -->
	<script>function goBack(){ window.history.back(); } </script>	
    <script>function reload(){ window.location.reload(); }</script>

	<script src="{{ asset('assets/admin/js/backend_js/jquery.flot.min.js') }}"></script> 
	<script src="{{ asset('assets/admin/js/backend_js/jquery.flot.pie.min.js') }}"></script> 
	<script src="{{ asset('assets/admin/js/backend_js/matrix.charts.js') }}"></script> 
	<script src="{{ asset('assets/admin/js/backend_js/jquery.flot.resize.min.js') }}"></script>
	<script src="{{ asset('assets/admin/js/backend_js/jquery.peity.min.js') }}"></script>

	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script>
	    CKEDITOR.replace('description');
	    CKEDITOR.replace('description1');
	    CKEDITOR.replace('description2');
	    CKEDITOR.replace('information');
	    CKEDITOR.replace('care');
	</script>

	{{-- <script src="{{ asset('assets/admin/js/backend_js/matrix.dashboard.js')}}"></script> --}}

    {{-- <script>
	  window.setTimeout(function(){
	    $(".alert").fadeTo(800, 0).slideUp(800, function(){
	        $(this).remove(); 
	    });
	}, 3500);
	</script> --}}
</body>
</html>
