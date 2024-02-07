<!-- STEP 1 -->
<div class="step1">
	<div class="row">
		
		<div class="col-12 col-lg-6">
			<div class="form-group detail-fields select-box-wrap">
				<label>{{__('cruds.kyc-configurations.fields.country_residence')}}</label>

				<select class="niceCountryInputSelector from_code2 form-control" id="from_code2" name="country_id">
					<option value="" data-src="" >--{{__('global.select')}} {{__('global.country')}}--</option>
					@if(!empty($countriesList))


					@foreach($countriesList as $countriesList)

					<option value="{{$countriesList['id']}}" data-src="{{asset('assets/admin/images/flags')}}/{{$countriesList['flag']}}" {{ (isset($kycConfiguration) && $kycConfiguration['kycConfigurations']['country_id'] == $countriesList['id'] ? 'selected' : '') }}>
						{{$countriesList['name']}} <strong>({{$countriesList['iso3']}})</strong>
					</option>

					@endforeach

					@endif

				</select>
				@error('country_id')
					<br/><br/><span class="text-danger">{{ $message }}</span>
				@enderror
				
			</div>
		</div>
		<div class="col-12 col-lg-6">
			<div class="form-group detail-fields select-box-wrap">
				<label>{{__('cruds.kyc-configurations.fields.status')}}</label>

				<select class="status form-control selectinit" id="status" name="status">
					<option value="" >--{{__('global.select')}} {{__('cruds.kyc-configurations.fields.status')}}--</option>
					@php $status = config('admin')['kyc_configuration_status'];  @endphp
					@if(isset($status) && !empty($status))
						@foreach($status as $key => $value)
							<option value="{{$key}}" {{ (isset($kycConfiguration) && $kycConfiguration['kycConfigurations']['status'] == $key ? 'selected' : '') }}>
								{{$value}}
							</option>
						@endforeach
					@endif

				</select>
				@error('status')
					<br/><br/><span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
		</div>
		
		<div class="col-12 col-lg-12 check-list default-check step_form_checkbox">
			<div class="flex">
				<span><div class="step-form-checkbox-title">{{__('cruds.kyc-configurations.fields.configuration')}}</div></span>
			</div>
			
			<div class="form-check detail-fields select-box-wrap ">
				
				@php 
				$kyc_configurations_checkboxes = config('admin')['kyc_configurations'];  
				@endphp
				@if(isset($kyc_configurations_checkboxes) && !empty($kyc_configurations_checkboxes))
						
						 @foreach($kyc_configurations_checkboxes as $key => $value)
					        <div>
					        	<label for="{{ $key }}">{{ $value }}</label>
					            <input type="checkbox" name="configuration[]" id="{{ $value }}" class="form-check-input" {{ $key === 'basic_details' ? 'checked disabled' : '' }}   value="{{ $key }}" {{ isset($kycConfiguration)  ? (in_array($key, explode(',', $kycConfiguration['kycConfigurations']['configuration'])) ? 'checked' : '' ) : ''}}>
					            
					        </div>
					    @endforeach
					@endif

					
				
			</div>
			@error('configuration')
					<br/><br/><span class="text-danger">{{ $message }}</span>
					@enderror
		</div>
	</div>
</div>
<div class="configuration_btns">
	<div class="back-btn">
		<a href="{{route('admin.kyc-configurations.index')}}" class="outline-btn stepback-btn">
			<svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
		<path d="M6.70998 9.88047L2.82998 6.00047L6.70998 2.12047C7.09998 1.73047 7.09998 1.10047 6.70998 0.710469C6.31998 0.320469 5.68998 0.320469 5.29998 0.710469L0.70998 5.30047C0.31998 5.69047 0.31998 6.32047 0.70998 6.71047L5.29998 11.3005C5.68998 11.6905 6.31998 11.6905 6.70998 11.3005C7.08998 10.9105 7.09998 10.2705 6.70998 9.88047Z" fill="#bfc0c0"></path>
		</svg>{{__('global.back')}} / {{__('global.cancel')}}</a>
	</div>
	<div class="save_btn">
		<button type="submit" class="nbtn">{{__('global.save')}} {{__('global.configuration')}}</button>
		
	</div>
</div>
