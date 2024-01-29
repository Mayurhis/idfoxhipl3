<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Error</title>
	 <link href="{{asset('assets/kyc/images/fav-icon.png')}}" rel="icon">
	<!-- Bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" async>
	<!-- Owl slider css -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" async>
	<!-- Select2 css -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" async>
	<!-- Main css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/kyc/css/style.css')}}" async>
    <!-- Error css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/kyc/css/error.css')}}" async>
   
</head>
<body>
    <!-- Error Section  -->
    <section class="error-wrapper login-wrapper">
        <div class="container">
            <div class="error_box text-center py-5 mt-3">
                <div class="logo mb-4">
                    <a href="javascript:void(0)">
                        <img class="img-fluid" src="{{asset('assets/kyc/images/logo.png')}}" width="120" alt="">
                    </a>
                </div>
                <div class="error-content">
                    <div class="title">
                        <h5>
                            Sorry, Url is expired. Please get a new url to add KYC details.
                        </h5>
                    </div>
                    <div class="description mt-4">
                        <p>
                            <a href="javascript:void(0)">Go back</a> and try again. <br></a>
                            {{-- if the issue continues, check out our <a href="javascript:void(0)">Status Page. --}}
                        </p>
                    </div>
                </div>
                <div class="error-image mt-5 pt-5">
                    <img class="img-fluid" src="{{asset('assets/kyc/images/error.svg')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--End Error Section  -->


<!-- Jquery Library -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Owl slider Js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Select2 Js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Custom Js -->
<script src="{{asset('assets/kyc/js/custom.js')}}"></script>

<script>

</script>
</body>
</html>