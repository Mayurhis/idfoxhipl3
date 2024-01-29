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
													<label class="bgray-btn" for="addressImage">{{__('global.select_file')}} <svg preserveAspectRatio="none" width="100%" viewBox="0 0 24 24" height="100%" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 14h-.79l-.28-.27c1.2-1.4 1.82-3.31 1.48-5.34-.47-2.78-2.79-5-5.59-5.34-4.23-.52-7.79 3.04-7.27 7.27.34 2.8 2.56 5.12 5.34 5.59 2.03.34 3.94-.28 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg></label>
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