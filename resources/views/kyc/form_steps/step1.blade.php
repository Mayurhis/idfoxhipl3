                     
							<div class="tab-pane fade show active">
								<div class="customer-detail">
									<h4 class="top-title">{{__('cruds.customer-front-form.is_this_you')}}</h4>
									<h2 class="text-center  name-detail-wrap position-relative inner-title">
										<span id="nameDetail">
											Bruce Wayne
										</span> 
										<a href="javascript:void(0)" class="detail-edit"><svg class="stencil--easier-to-select " width="32" height="32" x="0.5" y="0.5" style="opacity: 1;"><defs></defs><rect x="0" y="0" width="32" height="32" fill="transparent" class="stencil__selection-helper"></rect><g id="mq-stencil-icon-e6c06acb" fill="rgb(223, 164, 101)" stroke-width="0" stroke="none" stroke-dasharray="none"><svg preserveAspectRatio="none" width="100%" viewBox="0 0 24 24" height="100%" xmlns="http://www.w3.org/2000/svg"><path d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path></svg></g></svg></a>
									</h2>
									<div class="detail-fields">
										<label>{{__('cruds.customer-front-form.born_on')}}</label>
										<p><strong id="dobDetail">January 1981</strong></p>
									</div>
									<div class="detail-fields">
										<label>{{__('cruds.customer.fields.address_line_1')}}</label>
										<p><strong id="addressLine1Detail">345 Batcave Street</strong></p>
									</div>
									<div class="detail-fields">
										<label>{{__('cruds.customer.fields.address_line_2')}}</label>
										<p><strong id="addressLine2Detail">345 Batcave Street</strong></p>
									</div>
									<div class="detail-fields">
										<label>{{__('cruds.customer.fields.post_code')}}</label>
										<p><strong id="postCodeDetail">Gotham</strong></p>
									</div>
									<div class="detail-fields">
										<label>{{__('cruds.customer.fields.city')}}</label>
										<p><strong id="cityDetail">Gotham</strong></p>
									</div>
									<div class="detail-fields">
										<label>{{__('cruds.customer.fields.region')}}</label>
										<p><strong id="regionDetail">Gotham</strong></p>
									</div>
									<div class="detail-fields">
										<label>{{__('cruds.customer.fields.country_residence')}}</label>
											<p class="country-detail-wrap"> <img id="countryflagDetail" src="{{asset('assets/kyc/images/flags/icon-f.png')}}" class="flag-img" alt="" />&nbsp;&nbsp; <span id="countryDetail">United Kingdom </span>&nbsp;&nbsp;<strong id="isoDetail">GB</strong></p>
									</div>
									<div class="detail-fields">
										<label>{{__('cruds.customer.fields.email')}}</label>
										<p><strong id="emailDetail">bruce@batmail.com</strong></p>
									</div>
									<div class="detail-fields">
										<label>{{__('cruds.customer.fields.mobile-sms')}}</label>
										<p><strong  id="mobileNumberDetail">+44 1234 1234</strong></p>
									</div>
									<div class="detail-fields text-center">
										<a href="javascript:void(0)" class="nbtn submit-form-1">{{__('cruds.customer-front-form.yes_correct')}} 
											<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none" style="height: 18px;">
												<path d="M13.0495 25.5793C12.6949 25.5814 12.3477 25.4778 12.0522 25.2818C11.7568 25.0858 11.5263 24.8062 11.3904 24.4787C11.2544 24.1512 11.219 23.7907 11.2888 23.443C11.3585 23.0953 11.5302 22.7763 11.782 22.5266L21.2435 13.083L11.782 3.63931C11.4895 3.2978 11.3367 2.85851 11.3541 2.40922C11.3714 1.95993 11.5577 1.53374 11.8756 1.2158C12.1935 0.89787 12.6197 0.711618 13.069 0.694263C13.5183 0.676909 13.9576 0.829733 14.2991 1.12219L25.0103 11.8333C25.3427 12.1678 25.5294 12.6203 25.5294 13.0919C25.5294 13.5635 25.3427 14.016 25.0103 14.3505L14.2991 25.0616C13.9666 25.3914 13.5178 25.5773 13.0495 25.5793Z" fill="#fff"/>
												<path d="M2.33854 25.5793C1.98396 25.5814 1.63679 25.4778 1.34131 25.2818C1.04583 25.0858 0.81541 24.8062 0.679437 24.4787C0.543465 24.1512 0.508098 23.7907 0.577845 23.443C0.647592 23.0954 0.819292 22.7763 1.07106 22.5266L10.5326 13.083L1.07106 3.63933C0.734898 3.30317 0.546046 2.84724 0.546046 2.37184C0.546046 1.89644 0.734898 1.44051 1.07106 1.10436C1.40721 0.768197 1.86314 0.579346 2.33854 0.579346C2.81394 0.579346 3.26987 0.768197 3.60603 1.10436L14.3172 11.8155C14.6497 12.15 14.8363 12.6024 14.8363 13.0741C14.8363 13.5457 14.6497 13.9981 14.3172 14.3326L3.60603 25.0438C3.44069 25.2124 3.24353 25.3466 3.02596 25.4386C2.80839 25.5305 2.57473 25.5783 2.33854 25.5793Z" fill="#fff"/>
											</svg>
										</a>
									</div>
								</div>
								<div class="customer-detail-edit">
									<h4 class="top-title">Edit</h4>
									<form class="customer-detail-form" id="kycVerifiactionStep1" action="{{ route('kyc.storeStep1')}}">
										@csrf
										<div class="form-group detail-fields text-center">
											<input type="hidden" name="brand_id" value="{{$customerData['brand_id']}}" >
											<input type="hidden" name="id" value="{{$customerData['id']}}" >
											<label>{{__('cruds.customer.fields.prefix')}}</label>
											<input type="text" name="prefix" value="{{isset($customerData['prefix']) ? $customerData['prefix'] : ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.first_name')}} <span class="text-danger">*</span></label>
											<input type="text" name="first_name" value="{{isset($customerData['first_name']) ? $customerData['first_name'] : ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.middle_name')}}</label>
											<input type="text" name="middle_name" value="{{isset($customerData['middle_name']) ? $customerData['middle_name'] : ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.last_name')}} <span class="text-danger">*</span></label>
											<input type="text" name="last_name" value="{{isset($customerData['last_name']) ? $customerData['last_name'] : ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.suffix')}}</label>
											<input type="text" name="suffix" value="{{isset($customerData['suffix']) ? $customerData['suffix'] : ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.dob')}}<span class="text-danger">*</span></label>
											<input type="text" name="dob" id="datepicker" placeholder="yyyy-mm-dd" readonly value="{{isset($customerData['dob']) ? $customerData['dob'] : ''}}">
											{{-- <div class="dob-fields">
												<div class="dbo-innerarea">
													<div class="bob-day">
														<input type="text" value="1">
													</div>
													<div class="bob-month">
														<select>
															<option>January</option>
															<option>February</option>
															<option>March</option>
															<option>April</option>
															<option>May</option>
															<option>June</option>
															<option>July</option>
															<option>August</option>
															<option>September</option>
															<option>October</option>
															<option>November</option>
															<option>December</option>
														</select>
													</div>
													<div class="bob-year">
														<input type="text" value="1981">
													</div>
												</div>
											</div> --}}
										</div>
										
									    <div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.gender')}}</label>
											<select class="niceCountryInputSelector from_code2 form-control" id="gender" name="gender">
												@php $customerGender = config('admin.gender'); @endphp
												@if(isset($customerGender) && !empty($customerGender))
												@foreach($customerGender as $key => $value)
													<option value="{{$key}}" >{{$value}}</option>
												@endforeach
												@endif
											</select>
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.address_line_1')}}<span class="text-danger">*</span></label>
											<input type="text" name="address_line_1" value="{{isset($customerData['address'][0]['address_line_1']) ? $customerData['address'][0]['address_line_1'] : ''}}" >
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.address_line_2')}}</label>
											<input type="text" name="address_line_2" value="{{isset($customerData['address'][0]['address_line_2']) ? $customerData['address'][0]['address_line_2'] : ''}}" >
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.post_code')}}</label>
											<input type="text" name="post_code" value="{{isset($customerData['address'][0]['post_code']) ? $customerData['address'][0]['post_code']: ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.city')}} <span class="text-danger">*</span></label>
											<input type="text" name="city" value="{{isset($customerData['address'][0]['city']) ? $customerData['address'][0]['city'] : ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.region')}} <span class="text-danger">*</span></label>
											<input type="text" name="region" value="{{isset($customerData['address'][0]['region']) ? $customerData['address'][0]['region'] : ''}}" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.country_residence')}}</label>
											<select class="niceCountryInputSelector from_code2 form-control" id="country_id" name="country_id">
												@foreach ($countries as $counry)
													<option value="{{$customerData['address'][0]['country_id']}}" data-src="{{asset('assets/flags/'.$counry['flag'])}}" data-iso="{{$counry['iso']}}" data-country="{{$counry['name']}}" {{$customerData['address'][0]['country_id'] == $counry['id'] ? 'selected' : ''}}>{{$counry['name']}} <strong>({{$counry['iso']}})</strong></option>
												@endforeach
											</select>
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.email')}}</label>
											<input type="email" name="email" value="{{isset($customerData['email']) ? $customerData['email'] : ''}}">
										</div>
										<div class="form-group detail-fields text-center">
											<label>{{__('cruds.customer.fields.mobile-sms')}}</label>
											<input type="text" name="mobile_number" value="{{isset($customerData['mobile_number']) ? $customerData['mobile_number'] : ''}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="detail-fields text-center">
											<button type="submit" class="nbtn">{{__('cruds.customer-front-form.continue')}}</button>
										</div>
									</form>
								</div>
								<div class="tab-footer">
									<div class="t-footertop">
										<div class="container">
											<div class="row">
												<div class="col-12 position-relative">
													<p><strong>{{__('cruds.customer-front-form.continue')}}</strong> {{__('cruds.customer-front-form.to_agree_to_the')}} <a href="javascript:void(0)" class="alink" data-bs-toggle="modal" data-bs-target="#termscondition"><strong>{{__('cruds.customer-front-form.terms_n_conditions')}}</strong></a><span class="d-block">{{__('cruds.customer-front-form.verify_identity')}}</span></p>
													<a href="javascript:void(0)" class="help-icon" data-bs-toggle="modal" data-bs-target="#termscondition">
														<svg xmlns="http://www.w3.org/2000/svg" width="492" height="492" viewBox="0 0 492 492" fill="none">
															<path d="M18.5 246.001C18.5 371.758 120.259 473.5 245.999 473.5C371.757 473.5 473.499 371.74 473.499 246.001C473.499 120.243 371.739 18.5015 245.999 18.5015C120.242 18.5015 18.5 120.26 18.5 246.001Z" stroke="#BFC0C0" stroke-width="37" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M275 141C275 157.017 262.017 170 246 170C229.983 170 217 157.017 217 141C217 124.983 229.983 112 246 112C262.017 112 275 124.983 275 141Z" fill="#BFC0C0"/>
															<path d="M275 381H217V201H275V381Z" fill="#BFC0C0"/>
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="t-footerbottom text-center">
										<a href="javascript:void(0)" class="alink" data-bs-toggle="modal" data-bs-target="#cancel-process">{{__('cruds.customer-front-form.cancel_verification')}}</a>
									</div>
								</div>
							</div>