<!-- STEP 1 -->
<div class="step1">
	<div class="basicTitle mb-3">
		<h5 class="size-18 customer-title">Basic Details</h5>
	</div>
	<div class="row">
		<div class="col-12 col-xl-3  col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.prefix')}}</label>
				<input type="text" name="prefix" id="prefix" value="{{$customer['prefix'] }}" placeholder="{{__('cruds.customer.fields.prefix_placeholder')}}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
				@error('prefix')
				<br /><br /><span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-3  col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.first_name')}} <span class="text-danger">*</span> </label>
				{{-- <input type="hidden" name="id" id="customerId" value="{{ $customer['id'] }}" > --}}
				{{-- <input type="hidden" name="uuid" id="uuid" value="{{ $customer['uuid'] }}" > --}}
				{{-- <input type="hidden" name="brand_id" id="brand_id" value="{{ $customer['brand_id'] }}" > --}}
				<input type="text" name="first_name" id="first_name" value="{{ $customer['first_name'] }}"  placeholder="{{__('cruds.customer.fields.first_name_placeholder')}}"oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
				@error('first_name')
				<br /><br /><span style="color:red">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-3  col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.middle_name')}}</label>
				<input type="text" name="middle_name" id="middle_name" value="{{ $customer['middle_name'] }}" placeholder="{{__('cruds.customer.fields.middle_name_placeholder')}}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
				@error('middle_name')
				<br /><br /><span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-3  col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.last_name')}} <span class="text-danger">*</span> </label>
				<input type="text" name="last_name" id="last_name" value="{{$customer['last_name'] }}" placeholder="{{__('cruds.customer.fields.last_name_placeholder')}}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
				@error('last_name')
				<br /><br /><span style="color:red">{{ $message }}</span>
				@enderror
			</div>
		</div>
	
		<div class="col-12 col-xl-3  col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.suffix')}}</label>
				<input type="text" name="suffix" id="suffix" value="{{$customer['suffix'] }}" placeholder="{{__('cruds.customer.fields.suffix_placeholder')}}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
				@error('suffix')
				<br /><br /><span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-3  col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.dob')}} <span class="text-danger">*</span> </label>
				<div class="dob-fields ms-0">
					<input type="text" name="dob" id="dob" placeholder="{{__('cruds.customer.fields.dob_placeholder')}}" value="{{date('Y-m-d',strtotime($customer['dob']))}}" autocomplete="off" readonly>

					@error('dob')
					<br /><br /><span style="color:red">{{ $message }}</span>
					@enderror
				</div>
			</div>
		</div>

		<div class="col-12 col-xl-3 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.email')}} <span class="text-danger">*</span> </label>
				<input type="email" name="email" id="email" value="{{ $customer['email'] }}" placeholder="{{__('cruds.customer.fields.email')}}">
				@error('email')
				<br /><br /><span style="color:red">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-3 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.mobile-sms')}}</label>
				<input type="text" name="mobile_number" id="mobile_number" value="{{ $customer['mobile_number'] }}" placeholder="{{__('cruds.customer.fields.mobile-sms')}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
				@error('mobile_number')
				<br /><br /><span style="color:red">{{ $message }}</span>
				@enderror
			</div>
		</div>

		<div class="col-12 col-xl-12  col-lg-12 col-md-12 col-sm-12">
			<div class="form-group">
			    <label>{{__('cruds.customer.fields.gender')}}</label>
			    <div class="check-list">
			    	@php $customerGender = config('admin.gender'); @endphp
					@if(isset($customerGender) && !empty($customerGender))
					@foreach($customerGender as $key => $value)
					<div class="form-check">
		            <input class="form-check-input" type="radio" name="gender"  value="{{$key}}" id="flexCheckDefault9"   {{ (isset($customer) && $customer['gender'] == $key ? 'checked' : '') }}>
		            <label class="form-check-label" for="flexCheckDefault9" >
		                {{__($value)}}
		            </label>
		            </div>
					@endforeach
					@endif
		        	
			    </div>
			</div>
			@error('gender')
				<br /><br /><span class="text-danger">{{ $message }}</span>
			@enderror
		</div>

		<div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.address_line_1')}} <span class="text-danger">*</span> </label>
				<?php
				$address = $customer['address'][0];
				?>
				<input type="text" name="address_line_1" id="address_line_1" value="{{$address['address_line_1'] }}" placeholder="{{__('cruds.customer.fields.address_line_1')}}">
				@error('address_line_1')
				<br /><br /><span style="color:red">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.address_line_2')}}</label>
				<?php
				$address = $customer['address'][0];
				?>
				<input type="text" name="address_line_2" id="address_line_2" value="{{$address['address_line_2'] }}" placeholder="{{__('cruds.customer.fields.address_line_2')}}">
				@error('address_line_2')
				<br /><br /><span style="color:red">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.post_code')}}</label>
				<input type="text" name="post_code" id="post_code" value="{{$address['post_code']}}" placeholder="{{__('cruds.customer.fields.post_code')}}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
				@error('post_code')
				<br /><br /><span style="color:red">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.city')}} <span class="text-danger">*</span> </label>
				<input type="text" name="city" id="city" value="{{ $address['city'] }}" placeholder="{{__('cruds.customer.fields.city')}}">
				@error('city')
				<br /><br /><span style="color:red">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.customer.fields.region')}} <span class="text-danger">*</span> </label>
				<input type="text" name="region" id="region"  value="{{ $address['region'] }}" placeholder="{{__('cruds.customer.fields.region')}}">
				@error('region')
				<br /><br /><span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields select-box-wrap">
				<label>{{__('cruds.customer.fields.country_residence')}} <span class="text-danger">*</span> </label>
				<select class="niceCountryInputSelector from_code2 form-control" id="countryDropDown" name="country_id">
					<option value="" data-src="">--Select Country--</option>
					@if(!empty($countriesList))
					@foreach($countriesList as $countriesList)
					<option value="{{$countriesList['id']}}" data-src="{{asset('assets/admin/images/flags')}}/{{$countriesList['flag']}}" {{$address['country_id'] == $countriesList['id'] ? 'selected' : ''}}>
						{{$countriesList['name']}} <strong>({{$countriesList['iso3']}})</strong>
					</option>
					@endforeach
					@endif
				</select>
			</div>
		</div>
		
		<div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields select-box-wrap">
				<label>{{__('cruds.brand.title_singular')}} {{__('global.name')}} <span class="text-danger">*</span> </label>

				<select class="niceCountryInputSelector selectinit form-control" name="brand_id">
					<option value="">--{{__('global.select')}} {{__('cruds.brand.title_singular')}}--</option>
					@if(!empty($bandList))
					@foreach($bandList as $key=>$value)
					<option value="{{$value['id']}}" {{$customer['brand_id'] == $value['id'] ? 'selected' : ''}}>{{$value['title']}}</option>
					@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields select-box-wrap">
				<label>{{__('cruds.customer.fields.approval_type')}}</label>
				<select class="upload_type form-control selectinit" id="approval_type" name="approval_type">
					<!-- <option value="">--{{__('global.select')}} {{__('cruds.customer.fields.approval_type')}}--</option> -->
					@php $customerApprovalType = config('admin.approval_method'); @endphp
					@if(isset($customerApprovalType) && !empty($customerApprovalType))
					@foreach($customerApprovalType as $key => $value)
					<option value="{{$key}}" {{$key == $customer['approval_type']  ? 'selected' : ''}}>
						{{$value}}
					</option>
					@endforeach
					@endif
					
				</select>
				
			</div>
			@error('approval_type')
				<br /><br /><span class="text-danger">{{ $message }}</span>
			@enderror
		</div>
		<div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-6">
			<div class="form-group detail-fields select-box-wrap">
				<label>{{__('cruds.customer.fields.status')}}</label>
				<select class="upload_type form-control selectinit" id="status" name="status">
					<option value="">--{{__('global.select')}} {{__('cruds.customer.fields.status')}}--</option>
					@php $customerStatus = config('admin')['customer_status']; @endphp
					@if(isset($customerStatus) && !empty($customerStatus))
					@foreach($customerStatus as $key => $value)
					<option value="{{$key}}" {{$key == $customer['status']  ? 'selected' : ''}}>
						{{$value}}
					</option>
					@endforeach
					@endif

				</select>

			</div>
		</div>
	</div>
</div>
<div id="step2">

</div>
<div class="configuration_btns">
	<div class="back-btn">
		<a href="{{route('admin.customers.index')}}" class="outline-btn stepback-btn">
			<svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
				<path d="M6.70998 9.88047L2.82998 6.00047L6.70998 2.12047C7.09998 1.73047 7.09998 1.10047 6.70998 0.710469C6.31998 0.320469 5.68998 0.320469 5.29998 0.710469L0.70998 5.30047C0.31998 5.69047 0.31998 6.32047 0.70998 6.71047L5.29998 11.3005C5.68998 11.6905 6.31998 11.6905 6.70998 11.3005C7.08998 10.9105 7.09998 10.2705 6.70998 9.88047Z" fill="#bfc0c0"></path>
			</svg>{{__('global.back')}} / {{__('global.cancel')}}</a>
	</div>
	<div class="save_btn">
		<button type="submit" class="nbtn">{{__('global.save')}} {{__('global.configuration')}}</button>

	</div>
</div>