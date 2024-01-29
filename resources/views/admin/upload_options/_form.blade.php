<!-- STEP 1 -->
<div class="step1">
	<div class="row">
		<div class="col-12 col-lg-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.upload-options.fields.title')}}</label>
				<input type="text" name="title" id="title"  placeholder="{{__('cruds.upload-options.fields.title')}}" value="{{ old('title', isset($uploadOption) ? $uploadOption['uploadOptions']['title'] : '') }}">
				@error('title')
					<br/><br/><span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-lg-6">
			<div class="form-group detail-fields">
				<label>{{__('cruds.upload-options.fields.country_residence')}}</label>

				<select class="niceCountryInputSelector from_code2 form-control" id="from_code2" name="country_id">
					<option value="" data-src="" >--{{__('global.select')}} {{__('global.country')}}--</option>
					@if(!empty($countriesList))


					@foreach($countriesList as $countriesList)

					<option value="{{$countriesList['id']}}" data-src="{{asset('assets/admin/images/flags')}}/{{$countriesList['flag']}}" {{ (isset($uploadOption) && $uploadOption['uploadOptions']['country_id'] == $countriesList['id'] ? 'selected' : '') }}>
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
			<div class="form-group detail-fields">
				<label>{{__('cruds.upload-options.fields.upload_type')}}</label>

				<select class="upload_type form-control selectinit" id="upload_type" name="upload_type">
					<option value="" >--{{__('global.select')}} {{__('cruds.upload-options.fields.upload_type')}}--</option>
					@php $uploadType = config('admin')['upload_option_type'];  @endphp
					@if(isset($uploadType) && !empty($uploadType))
						@foreach($uploadType as $key => $value)
							<option value="{{$key}}" {{ (isset($uploadOption) && $uploadOption['uploadOptions']['upload_type'] == $key ? 'selected' : '') }}>
								{{$value}}
							</option>
						@endforeach
					@endif

				</select>
				@error('upload_type')
					<br/><br/><span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="col-12 col-lg-12">
			<div class="modal-body text-center">
				<div class="file-selectarea">
					<div class="fileForm default-upload-wrap">
						<div class="upload-imgarea">
							<div class="step2pimg" id="previewImg1">
								<img src="{{(isset($uploadOption) && $uploadOption['uploadOptions']['image']) ? $uploadOption['uploadOptions']['image'] : asset('assets/admin/images/default-img.png')}}" alt="image" id="image-preview"/>
							</div>
							<span class="image-name" id="image-name">{{(isset($uploadOption) && $uploadOption['uploadOptions']['image']) ? basename($uploadOption['uploadOptions']['image']) : 'abcd.jpg'}}</span>
						
							<a class="action-btn bg-dark" title="Delete" style="display:{{(isset($uploadOption) && $uploadOption['uploadOptions']['image']) ? 'block' : 'none'}}; position:absolute; top:0; left:80px"><i class="fi fi-rr-trash"></i></a>		
							@if(isset($uploadOption) && $uploadOption['uploadOptions']['image'])
								<input type="hidden" name="delete_existing_image" value="0">
							@endif
						</div>
						<div class="file-search">
							<input type="file" id="image" name="image" style="display:none;">
							<label class="bgray-btn" for="image">{{__('global.select')}} {{__('global.image')}}</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 check-list default-check">
			<div class="form-check detail-fields">
				<input type="hidden" name="is_default_document" value="0">
				<input type="checkbox" class="form-check-input" name="is_default_document" id="is_default_document" {{(isset($uploadOption) && $uploadOption['uploadOptions']['is_default_document'] == 1 ? 'checked' : '')}} value="1">
				<label for="is_default_document">{{__('cruds.upload-options.fields.default_document')}}</label>
				
			</div>
		</div>
	</div>
</div>
<div class="configuration_btns">
	<div class="back-btn">
		<a href="{{route('admin.upload-options.index')}}" class="outline-btn stepback-btn">
			<svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
		<path d="M6.70998 9.88047L2.82998 6.00047L6.70998 2.12047C7.09998 1.73047 7.09998 1.10047 6.70998 0.710469C6.31998 0.320469 5.68998 0.320469 5.29998 0.710469L0.70998 5.30047C0.31998 5.69047 0.31998 6.32047 0.70998 6.71047L5.29998 11.3005C5.68998 11.6905 6.31998 11.6905 6.70998 11.3005C7.08998 10.9105 7.09998 10.2705 6.70998 9.88047Z" fill="#bfc0c0"></path>
		</svg>{{__('global.back')}} / {{__('global.cancel')}}</a>
	</div>
	<div class="save_btn">
		<button type="submit" class="nbtn">{{__('global.save')}} {{__('global.configuration')}}</button>
		
	</div>
</div>
