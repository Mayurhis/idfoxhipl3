
<div class="tab-pane fade" id="formStep4">
	<form class="fileForm customer-detail-form" id="kycVerifiactionStep4" action="{{ route('kyc.storeStep4')}}">
	<h4 class="top-title">{{__('cruds.customer-front-form.proof_of_address')}}</h4>
	<div class="back-btn">
		<a href="javascript:void(0)" class="outline-btn stepback-btn form-4-back"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
		<path d="M6.70998 9.88047L2.82998 6.00047L6.70998 2.12047C7.09998 1.73047 7.09998 1.10047 6.70998 0.710469C6.31998 0.320469 5.68998 0.320469 5.29998 0.710469L0.70998 5.30047C0.31998 5.69047 0.31998 6.32047 0.70998 6.71047L5.29998 11.3005C5.68998 11.6905 6.31998 11.6905 6.70998 11.3005C7.08998 10.9105 7.09998 10.2705 6.70998 9.88047Z" fill="black"></path>
		</svg>{{__('global.back')}}</a>
	</div>
	<div class="address_id">
		<h5 class="text-center size-18">{{__('cruds.customer-front-form.upload_any_of_these')}}:</h5>
		<ul class="photo-fields" id="addressUplaodOptions">
		</ul>

		<div class="photo-idslide width-autoarea position-relative">
			<div class="">
				<div class="item">
					<img src="{{asset('assets/kyc/images/proof-address.png')}}" class="d-block w-100" alt="slide-image">
				</div>
			</div>
			<div class="id-info">
				<div class="info-left">
					<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#address-proofinfo"><svg xmlns="http://www.w3.org/2000/svg" width="492" height="492" viewBox="0 0 492 492" fill="none">
						<path d="M18.5 246.001C18.5 371.758 120.259 473.5 245.999 473.5C371.757 473.5 473.499 371.74 473.499 246.001C473.499 120.243 371.739 18.5015 245.999 18.5015C120.242 18.5015 18.5 120.26 18.5 246.001Z" stroke="#BFC0C0" stroke-width="37" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
						<path d="M275 141C275 157.017 262.017 170 246 170C229.983 170 217 157.017 217 141C217 124.983 229.983 112 246 112C262.017 112 275 124.983 275 141Z" fill="#BFC0C0"></path>
						<path d="M275 381H217V201H275V381Z" fill="#BFC0C0"></path>
					</svg> {{__('global.more_info')}}</a>
				</div>
				<div class="info-right">
					<em>#name-address</em>
				</div>
			</div>
		</div>
		<div class="multi-btn mt-4 pt-3">
			<!-- <a href="javascript:void(0)" class="bgray-btn">{{__('cruds.customer-front-form.upload_image')}}<svg preserveAspectRatio="none" width="100%" viewBox="0 0 24 24" height="100%" xmlns="http://www.w3.org/2000/svg" style="height: 28px;"><path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z" fill="#fff"></path></svg></a> -->
			<a href="javascript:void(0)" class="nbtn" id="form4Continue">{{__('cruds.customer-front-form.continue')}}</a>
		</div>
	</div>

	<div class="modal fade" id="uploadaddproof" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-fullscreen">
				<div class="modal-content">
					<div class="modal-topdata">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<div class="modal-header p-0 border-0">
										<button type="button" class="outline-btn" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
											<path d="M6.70998 9.88047L2.82998 6.00047L6.70998 2.12047C7.09998 1.73047 7.09998 1.10047 6.70998 0.710469C6.31998 0.320469 5.68998 0.320469 5.29998 0.710469L0.70998 5.30047C0.31998 5.69047 0.31998 6.32047 0.70998 6.71047L5.29998 11.3005C5.68998 11.6905 6.31998 11.6905 6.70998 11.3005C7.08998 10.9105 7.09998 10.2705 6.70998 9.88047Z" fill="black"/>
											</svg>{{__('global.back')}}</button>
										<h5>{{__('global.upload')}} {{__('cruds.customer-front-form.proof_of_address')}}</h5>
										<span><svg class="stencil--easier-to-select " width="27" height="27.000000000000004" x="0.5" y="0.5" style="opacity: 1;"><defs></defs><rect x="0" y="0" width="27" height="27.000000000000004" fill="transparent" class="stencil__selection-helper"></rect><style>#mq-stencil-icon-07cb3bce * { vector-effect: non-scaling-size; }</style><g id="mq-stencil-icon-07cb3bce" fill="rgb(223, 164, 101)" stroke-width="0" stroke="none" stroke-dasharray="none"><svg preserveAspectRatio="none" width="100%" viewBox="0 0 24 24" height="100%" xmlns="http://www.w3.org/2000/svg"><path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l4.65-4.65c.2-.2.51-.2.71 0L17 13h-3z"></path></svg></g></svg></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-middledata">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<div class="modal-body text-center">
										<p>{{__('cruds.customer-front-form.address_proof_following_part_1')}} <strong>{{__('cruds.customer-front-form.address_proof_following_part_2')}}</strong></p>
										<p class="line-height13"><strong>{{__('cruds.customer-front-form.bank_statement')}}</strong><br><strong>{{__('cruds.customer-front-form.utility_bill')}}</strong><br><small>{{__('cruds.customer-front-form.gas_water_phone')}}</small><br><strong>{{__('cruds.customer-front-form.photographic_id')}}</strong><br><strong>{{__('cruds.customer-front-form.tax_assessment')}}</strong><br><strong>{{__('cruds.customer-front-form.mortgage_statement')}}</strong><br><strong>{{__('cruds.customer-front-form.voter_registration_document')}}</strong><br><strong>{{__('cruds.customer-front-form.receipt_of_benefits')}}</strong><br><small>{{__('cruds.customer-front-form.pension_unemployment')}}</small></p>
										<p>{{__('cruds.customer-front-form.our_verification_system_supports')}}<br><strong>{{__('global.jpg')}} </strong>and <strong>{{__('global.png')}}</strong> {{__('global.file_format')}}</p>
										<div class="file-selectarea pt-2">
											
												<div class="file-search">
													<input type="file" class="input-file" name="addressImage" id="addressImage"  accept="image/png, image/jpeg">
													<label class="bgray-btn">{{__('global.select_file')}} <svg preserveAspectRatio="none" width="100%" viewBox="0 0 24 24" height="100%" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 14h-.79l-.28-.27c1.2-1.4 1.82-3.31 1.48-5.34-.47-2.78-2.79-5-5.59-5.34-4.23-.52-7.79 3.04-7.27 7.27.34 2.8 2.56 5.12 5.34 5.59 2.03.34 3.94-.28 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg></label>
												</div>
												<div class="upload-imgarea mt-4 pt-2">
													<div class="step2pimg" id="previewImg3">
														<img src="{{asset('assets/kyc/images/default-img.png')}}" alt="image"/>
													</div>
													<span class="image-name">{{__('cruds.customer-front-form.default_pic_name')}}</span>
												</div>
											
										</div>
										<div class="multi-btn mt-5 pt-2">
											<!-- <a href="javascript:void(0)" class="bgray-btn" data-bs-toggle="modal" data-bs-target="#switchmobile" data-bs-dismiss="modal">Switch to mobile<svg xmlns="http://www.w3.org/2000/svg" width="77" height="134" viewBox="0 0 77 134" fill="none" style="height: 28px;">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M60.3678 -0.000366211H16.9644C7.95927 -0.000366211 0.68782 8.11997 0.68782 18.1811V115.151C0.68782 125.212 7.95625 133.333 16.9644 133.333H60.3678C69.3726 133.333 76.6448 125.213 76.6448 115.152V18.1811C76.6448 8.11997 69.3749 -0.000366211 60.369 -0.000366211H60.3678ZM17.2127 66.6416L17.2135 84.2436H34.8148L28.2138 77.6427L36.748 69.1089L32.3479 64.7087L23.8137 73.2425L17.2127 66.6416ZM56.817 40.2392L41.6826 55.3736L46.0831 59.7742L61.2179 44.6401L56.817 40.2392ZM34.8148 40.2392L17.2127 40.24V57.8413L23.8137 51.24L56.817 84.2436L61.2179 79.8427L28.2138 46.8402L34.8148 40.2392ZM11.4931 11.381H65.9298V111.614H11.4931V11.381ZM30.528 120.486H46.8042C48.2964 120.486 49.5183 121.849 49.5183 123.517C49.5183 125.184 48.2964 126.549 46.8042 126.549H30.528C29.0355 126.549 27.8139 125.184 27.8139 123.517C27.8139 121.849 29.0355 120.486 30.528 120.486Z" fill="white"/></svg></a> -->
											<a href="javascript:void(0)" class="nbtn submit-form-4" id="upload_submit3">{{__('global.upload')}} <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M19.35 6.04C18.67 2.59 15.64 0 12 0C9.11 0 6.6 1.64 5.35 4.04C2.34 4.36 0 6.91 0 10C0 13.31 2.69 16 6 16H19C21.76 16 24 13.76 24 11C24 8.36 21.95 6.22 19.35 6.04ZM14 9V13H10V9H7L11.65 4.35C11.85 4.15 12.16 4.15 12.36 4.35L17 9H14Z" fill="black"/>
											</svg>	</a>
											<a href="javascript:void(0)" class="nbtn take_address_pic">{{__('cruds.customer-front-form.take_photo')}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="height: 28px;"><path d="M14.1117 1.33669C14.31 0.986692 14.1117 0.520025 13.7033 0.473358C10.6467 0.0416918 7.51999 0.800025 5.02332 2.64336C4.80166 2.81836 4.73166 3.14503 4.88332 3.40169L8.39499 9.49169C8.61666 9.87669 9.17665 9.87669 9.40999 9.49169L14.1117 1.33669ZM22.85 7.71836C21.7067 4.83669 19.4433 2.51503 16.6083 1.30169C16.34 1.18503 16.025 1.30169 15.8733 1.55836L12.3617 7.63669C12.14 8.01003 12.42 8.50003 12.875 8.50003H22.3017C22.71 8.50003 23.0017 8.09169 22.85 7.71836ZM22.9317 9.66669H15.6983C15.255 9.66669 14.9633 10.1567 15.1967 10.5417L20.1667 19.1634C20.365 19.5134 20.8667 19.5717 21.1233 19.2567C23.1533 16.7134 24.0167 13.3884 23.515 10.1684C23.48 9.87669 23.2233 9.66669 22.9317 9.66669ZM2.87665 4.75503C0.858322 7.31003 -0.0166779 10.6117 0.484989 13.8434C0.519989 14.1234 0.776655 14.3334 1.06832 14.3334H8.30166C8.74499 14.3334 9.03666 13.8434 8.80332 13.4584L3.83332 4.84836C3.62332 4.49836 3.12165 4.44003 2.87665 4.75503ZM1.14999 16.2817C2.29332 19.1634 4.55666 21.485 7.39166 22.6984C7.65999 22.815 7.97499 22.6984 8.12666 22.4417L11.6383 16.3634C11.86 15.9784 11.58 15.4884 11.1367 15.4884H1.69832C1.28999 15.5 0.998322 15.9084 1.14999 16.2817ZM10.285 23.5384C13.3417 23.97 16.4683 23.2117 18.965 21.3684C19.1983 21.1934 19.2683 20.855 19.1167 20.5984L15.605 14.5084C15.3833 14.1234 14.8233 14.1234 14.59 14.5084L9.87666 22.6634C9.67832 23.0134 9.88832 23.48 10.285 23.5384Z" fill="black"/></svg>	</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>




