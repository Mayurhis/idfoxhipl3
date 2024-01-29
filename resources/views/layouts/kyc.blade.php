<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>idFox</title>
        <link href="{{asset('assets/kyc/images/fav-icon.png')}}" rel="icon">
        <!-- Bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" async>
        <!-- Owl slider css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" async>
        <!-- Select2 css -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" async>
        <!-- Date picker css  -->
	    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <!-- Main css -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/kyc/css/style.css')}}" async>
        @yield('styles')
    </head>
    <body>
    @include("layouts.kyc.header")
	@yield('content')
    <!-- Jquery Library -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Owl slider Js -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<!-- Select2 Js -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- datepicker  -->
	<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<!-- Custom Js -->
	<script src="{{asset('assets/kyc/js/custom.js')}}"></script>
     @yield('scripts')
    </body>
</html>
