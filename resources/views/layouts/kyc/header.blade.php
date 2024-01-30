<!--************************************
			Header Start
	*************************************-->
	<header class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header-inner d-flex align-items-center justify-content-between">
						<div class="logo-area">
							<a href="javascript:void(0)">
								<img src="{{asset('assets/kyc/images/flogo.png')}}" class="img-fluid" width="35" alt="" />
							</a>
						</div>
						<div class="head-titlearea text-center">
							<h2>{{__('cruds.customer-front-form.name_of_merchant')}} </h2>
							<span>{{__('cruds.customer-front-form.one_time_id_verification')}}</span>
						</div>
						<div class="select-area">
							<select class="niceCountryInputSelector from_code form-control" id="from_code" name="from_country">
								<option value="USD" data-src="{{asset('assets/kyc/images/flags/AS.png')}}" selected >
									US
								</option>
								<!-- <option value="AFN" data-src="{{asset('assets/kyc/images/flags/AF.png')}}">
									AF
								</option>
							
								<option value="ALL" data-src="{{asset('assets/kyc/images/flags/AL.png')}}">
									AL
								</option>
								<option value="XCD" data-src="{{asset('assets/kyc/images/flags/AQ.png')}}">
									XC
								</option>
								<option value="DZD" data-src="{{asset('assets/kyc/images/flags/DZ.png')}}">
									DZ
								</option>
								<option value="EUR" data-src="{{asset('assets/kyc/images/flags/AD.png')}}">
									EU
								</option> -->
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--************************************
			Header End
	*************************************-->