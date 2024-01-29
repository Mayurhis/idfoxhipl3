<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>idFox</title>
        <link href="{{asset('assets/admin/images/fav-icon.png')}}" rel="icon">
        <!-- Bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" async>
        <!-- Data table -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <!-- Main css -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}" async>
        <!-- Select2 css -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" async>
         <!-- Date picker css  -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
         <!-- sticky css  -->
        <link rel="stylesheet" href="{{asset('assets/admin/css/sticky.css')}}">
        <!-- coloris  -->
        <link rel="stylesheet" href="{{asset('assets/admin/css/coloris.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/toastr/toastr.min.css')}}">

        <!-- Main css -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}" async>
         @yield('styles')
    </head>
    <body class="admin-dashboard">
        <div class="pageloader d-none">
            <div class="loader">
                <div class="line-scale">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <section class="dash-section">
		<div class="dashboard-blog">
            @include('layouts.admin.sidebar')
			<div class="dash-right-area">
					<div class="mobile-header d-md-none">
						<div class="mob-logo">
							<a href="{{route('admin.dashboard')}}" title="logo"><img src="{{asset('assets/admin/images/logo.png')}}" alt="logo" class="img-fluid"></a>
						</div>
						<div class="humberger-icon">
							<img src="{{asset('assets/admin/images/humberger-icon.svg')}}" alt="humberger-icon">
						</div>
					</div>
					@yield('content')
				</div>
			</div>
		</div>
	</section>

        <!-- Jquery Library -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Bootstrap Js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Data table  -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <!-- color js  -->
        <script src="{{asset('assets/admin/js/color.js')}}"></script>
        <!-- CustomHexColorPicker -->
        <script src="{{asset('assets/admin/js/CustomHexColorPicker.lib.js')}}"></script>
        
        <script src="{{asset('assets/admin/toastr/toastr.min.js')}}"></script>
        <!-- Select2 Js -->
	    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>  
    
        <!-- Custom Js -->
        <script src="{{asset('assets/admin/js/custom.js')}}"></script>
        <script>
            $(document).ready(function(){
                @if(Session::has('message'))
                
                    var type = "{{ Session::get('alert-type', 'info') }}";
                
                    switch (type) {
                        case 'info':
                            toastr.info("{{ Session::get('message') }}", 'Info!');
                            break;

                        case 'warning':
                            toastr.warning("{{ Session::get('message') }}", 'Warning!');
                            break;
                        case 'success':
                            toastr.success("{{ Session::get('message') }}", 'Success!');
                            break;
                        case 'error':
                            toastr.error("{{ Session::get('message') }}", 'Error');
                            break;
                    }
                @endif
            });
            $(function() {
                var datepicker = $( "#dob" ).datepicker({
                    yearRange: "-100:+0",
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'yy-mm-dd',
                    maxDate: 0,
                });
            });

            
        </script>
        @yield('scripts')
    </body>
</html>