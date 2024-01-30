                            
                            <div class="tab-pane fade">
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
							</div>