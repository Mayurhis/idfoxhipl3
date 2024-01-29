<hr class="my-3">
<!-- STEP 2 -->
<div class="step2">

	<div class="photo_id photoDiv">
		<h5 class="size-18 customer-title">{{__('cruds.customer.id_photograph_heading')}}</h5>
		
		<ul class="photo-fields">
			<?php 
			$defaultImagePath 			= asset('assets/admin/images/default-img.png');
			$photoIdMediaPath 			= $defaultImagePath;
			$addressMediaPath 			= $defaultImagePath;
			$liveMediaPath 	  			= $defaultImagePath;
			$photoIdDisabledClass 	  	= 'disabled-file';
			$addressDisabledClass 	  	= 'disabled-file';
			
			
			$addressDataArray = '';
			$liveDataAarray = '';

			$photoRadioChecked = 0;
			$addressRadioChecked = 0;
			if(isset($customer) && !empty($customer) && !empty($customer['media'])){
				
				foreach($customer['media'] as $media){

					switch ($media['upload_type']) {
					  case 'photo_id_image':
					  	$photoIdDisabledClass = '';
					    $photoIdDataArray = $media;
					    $photoIdMediaPath = $media['path'];
					    $photoRadioChecked = $photoIdDataArray['upload_option_id'];
					    break;
					  case 'address_proof_image':
					  	$addressDisabledClass = '';
					    $addressDataArray = $media;
					    $addressMediaPath = $media['path'];
					    $addressRadioChecked = $addressDataArray['upload_option_id'];
					    break;
					  case 'liveliness_image':
					  	
					    $liveDataAarray = $media;
					    $liveMediaPath = $media['path'];
					    break;
					  default:
					    
					}

				}

			}
			?>
			@foreach($photoIdListing as $photoIdData)
			
			<li>
			@if($photoIdData['status'] == '0')
				<div class="info-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30"><g id="_01_align_center" data-name="01 align center"><path d="M12,24A12,12,0,1,1,24,12,12.013,12.013,0,0,1,12,24ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Z"/><path d="M14,19H12V12H10V10h2a2,2,0,0,1,2,2Z"/><circle cx="12" cy="6.5" r="1.5"/></g></svg>
				</div>
				<div class="note-box document-proof-info">
					<span>
						Selected address image upload option has been either deleted or removed as default upload option. Please select another one and upload new image
					</span>
				</div>
			@endif
				<input type="radio" name="PhotoIdRadio"  data-type="photo" id="{{$photoIdData['id']}}" value="{{$photoIdData['id']}}" {{($photoIdData['id'] == $photoRadioChecked) ? 'checked' : ''}} class="{{($photoIdData['status'] == '0') ? 'uploadOption-changed' : ''}}" >
				<a href="javascript:void(0)"><span class="pimg-area">
					<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
						<g clip-path="url(#clip0_334_35)">
						  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92267 5.46899H30.0777C31.1352 5.46899 32.0004 6.33414 32.0004 7.39166V25.9417C32.0004 26.9992 31.1352 27.8648 30.0777 27.8648H1.92267C0.864774 27.8648 -0.000366211 26.9992 -0.000366211 25.9417V7.39166C-0.000366211 6.33414 0.864774 5.46899 1.92267 5.46899ZM14.2735 9.1174H27.8191C28.013 9.1174 28.1709 9.27539 28.1709 9.46928V10.5264C28.1709 10.7203 28.013 10.8787 27.8191 10.8787H14.2735C14.0796 10.8787 13.9216 10.7203 13.9216 10.5264V9.46928C13.9216 9.27539 14.0796 9.1174 14.2735 9.1174ZM14.2735 13.0175H27.8191C28.013 13.0175 28.1709 13.1759 28.1709 13.3698V14.4269C28.1709 14.6208 28.013 14.7792 27.8191 14.7792H14.2735C14.0796 14.7792 13.9216 14.6208 13.9216 14.4269V13.3698C13.9216 13.1759 14.0796 13.0175 14.2735 13.0175ZM14.2735 16.5405H27.8191C28.013 16.5405 28.1709 16.6988 28.1709 16.8927V17.9498C28.1709 18.1437 28.013 18.3021 27.8191 18.3021H14.2735C14.0796 18.3021 13.9216 18.1437 13.9216 17.9498V16.8927C13.9216 16.6988 14.0796 16.5405 14.2735 16.5405ZM4.13901 21.2279H27.542C27.8882 21.2279 28.1709 21.5109 28.1709 21.8568V23.7443C28.1709 24.0901 27.8882 24.3732 27.542 24.3732H4.13901C3.79318 24.3732 3.51009 24.0901 3.51009 23.7443V21.8568C3.51009 21.5109 3.79318 21.2279 4.13901 21.2279ZM3.31279 17.398C3.31279 18.0009 3.61365 18.3021 4.21686 18.3021H11.5787C12.8388 18.3021 13.0187 16.3995 10.9343 15.4591C7.91932 14.0985 3.31279 15.06 3.31279 17.398ZM7.89551 9.1174C9.21533 9.1174 10.2849 10.187 10.2849 11.5065C10.2849 12.8263 9.21533 13.8959 7.89551 13.8959C6.57606 13.8959 5.50607 12.8263 5.50607 11.5065C5.50607 10.187 6.57606 9.1174 7.89551 9.1174Z" fill="#BFC0C0"/>
						</g>
						<defs>
						  <clipPath id="clip0_334_35">
							<rect width="32" height="32" fill="white"/>
						  </clipPath>
						</defs>
					  </svg>
				</span><span class="pid-title">{{$photoIdData['title']}}</span></a>
			</li>
			@endforeach
			
		</ul>
	</div>
	<div class="modal-middledata">
		<div class="row">
			<div class="col-12">
				<div class="modal-body text-center">
					<div class="file-selectarea">
						<div class="fileForm">
							<div class="upload-new-item fileForm">
								<div class="upload-imgarea">
									<div class="step2pimg">
										<img src="{{$defaultImagePath}}" alt="image" id="photoId"/>
									</div>
									<span class="image-name" id="photoIdName">abcd.jpg</span>
									<a class="action-btn bg-dark d-none" id="photoIdActionButton"  title="Delete"  position:absolute; top:0; left:80px"><i class="fi fi-rr-trash"></i></a>
								</div>
								<div class="file-search">
									<input type="file" class="input-file {{$photoIdDisabledClass}} " id="photoIdImage" name="photoIdImage" accept="image/png, image/jpeg" value="{{$photoIdMediaPath}}"  >
									<label class="bgray-btn" for="file-upload">{{__('global.select')}} {{__('global.file')}} </label>
								</div>
							</div>
							<?php 
							if($photoIdMediaPath != $defaultImagePath){
							?>	
							<div class="upload-imgarea">
								<div class="step2pimg" >
									<img src="{{$photoIdMediaPath}}" alt="image" />
								</div>
								<span class="image-name">{{$photoIdMediaPath == $defaultImagePath ?  'abcd.jpg' : ''}} </span>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  -->
<hr class="my-3">
<div class="step2">
	<div class="photo_id addressDiv">
		<h5 class="size-18 customer-title">{{__('cruds.customer.address_proof_heading')}}</h5>
		
		<ul class="photo-fields">
			@foreach($addressListing as $addressData)
			<li>
			@if($addressData['status'] == '0')	
				<div class="info-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30"><g id="_01_align_center" data-name="01 align center"><path d="M12,24A12,12,0,1,1,24,12,12.013,12.013,0,0,1,12,24ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Z"/><path d="M14,19H12V12H10V10h2a2,2,0,0,1,2,2Z"/><circle cx="12" cy="6.5" r="1.5"/></g></svg>
				</div>
				<div class="note-box document-proof-info">
					<span>
						Selected address image upload option has been either deleted or removed as default upload option. Please select another one and upload new image
					</span>
				</div>
			@endif
				<input type="radio" name="AddressPhotoRadio" data-type="address"  id="{{$addressData['id']}}" value="{{$addressData['id']}}" {{($addressData['id'] == $addressRadioChecked) ? 'checked' : ''}} class="{{($addressData['status'] == '0') ? 'uploadOption-changed' : ''}}" >
				<a href="javascript:void(0)"><span class="pimg-area">
					<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
						<g clip-path="url(#clip0_334_35)">
						  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92267 5.46899H30.0777C31.1352 5.46899 32.0004 6.33414 32.0004 7.39166V25.9417C32.0004 26.9992 31.1352 27.8648 30.0777 27.8648H1.92267C0.864774 27.8648 -0.000366211 26.9992 -0.000366211 25.9417V7.39166C-0.000366211 6.33414 0.864774 5.46899 1.92267 5.46899ZM14.2735 9.1174H27.8191C28.013 9.1174 28.1709 9.27539 28.1709 9.46928V10.5264C28.1709 10.7203 28.013 10.8787 27.8191 10.8787H14.2735C14.0796 10.8787 13.9216 10.7203 13.9216 10.5264V9.46928C13.9216 9.27539 14.0796 9.1174 14.2735 9.1174ZM14.2735 13.0175H27.8191C28.013 13.0175 28.1709 13.1759 28.1709 13.3698V14.4269C28.1709 14.6208 28.013 14.7792 27.8191 14.7792H14.2735C14.0796 14.7792 13.9216 14.6208 13.9216 14.4269V13.3698C13.9216 13.1759 14.0796 13.0175 14.2735 13.0175ZM14.2735 16.5405H27.8191C28.013 16.5405 28.1709 16.6988 28.1709 16.8927V17.9498C28.1709 18.1437 28.013 18.3021 27.8191 18.3021H14.2735C14.0796 18.3021 13.9216 18.1437 13.9216 17.9498V16.8927C13.9216 16.6988 14.0796 16.5405 14.2735 16.5405ZM4.13901 21.2279H27.542C27.8882 21.2279 28.1709 21.5109 28.1709 21.8568V23.7443C28.1709 24.0901 27.8882 24.3732 27.542 24.3732H4.13901C3.79318 24.3732 3.51009 24.0901 3.51009 23.7443V21.8568C3.51009 21.5109 3.79318 21.2279 4.13901 21.2279ZM3.31279 17.398C3.31279 18.0009 3.61365 18.3021 4.21686 18.3021H11.5787C12.8388 18.3021 13.0187 16.3995 10.9343 15.4591C7.91932 14.0985 3.31279 15.06 3.31279 17.398ZM7.89551 9.1174C9.21533 9.1174 10.2849 10.187 10.2849 11.5065C10.2849 12.8263 9.21533 13.8959 7.89551 13.8959C6.57606 13.8959 5.50607 12.8263 5.50607 11.5065C5.50607 10.187 6.57606 9.1174 7.89551 9.1174Z" fill="#BFC0C0"/>
						</g>
						<defs>
						  <clipPath id="clip0_334_35">
							<rect width="32" height="32" fill="white"/>
						  </clipPath>
						</defs>
					  </svg>
				</span><span class="pid-title">{{$addressData['title']}}</span></a>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="modal-middledata">
		<div class="row">
			<div class="col-12">
				<div class="modal-body text-center">
					<div class="file-selectarea">
						<div class="fileForm">
							<div class="upload-new-item fileForm">
								<div class="upload-imgarea">
									<div class="step2pimg" id="CustomersPic" name="CustomersPic">
										<img src="{{ $defaultImagePath }}"  alt="image" id="addressId"/>
									</div>
									<span class="image-name" id="addressIdName">abcd.jpg</span>
									<a class="action-btn bg-dark d-none" id="addressIdActionButton"  title="Delete"  position:absolute; top:0; left:80px"><i class="fi fi-rr-trash"></i></a>
								</div>
								<div class="file-search">
									<input type="file" class="input-file {{$addressDisabledClass}}" id="addressImage" name="addressImage" accept="image/png, image/jpeg" value="{{ $addressMediaPath }}"  >

									<label class="bgray-btn" for="file-upload">{{__('global.select')}} {{__('global.file')}} </label>
								</div>
							</div>
							<?php 
							if($addressMediaPath != $defaultImagePath){
							?>	
							<div class="upload-imgarea">
								<div class="step2pimg" >
									<img src="{{$addressMediaPath}}" alt="image" />
								</div>
								<span class="image-name">{{$addressMediaPath == $defaultImagePath ?  'abcd.jpg' : ''}} </span>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr class="my-3">
<!--  -->
<div class="step2">
	<div class="photo_id liveDiv">
		<h5 class="size-18 customer-title">{{__('cruds.customer.live_photo')}} </h5>
	</div>
	<div class="modal-middledata">
		<div class="row">
			<div class="col-12">
				<div class="modal-body text-center">
					<div class="file-selectarea">
						<div class="fileForm">
							<div class="upload-new-item fileForm">
								<div class="upload-imgarea">
									<div class="step2pimg" id="documentsImage" name="documentsImage">
										<img src="{{ $defaultImagePath }}" alt="image" id="liveId"/>
									</div>
									<span class="image-name" id="liveIdName">abcd.jpg</span>
									<a class="action-btn bg-dark d-none" id="liveIdActionButton"  title="Delete"  position:absolute; top:0; left:80px"><i class="fi fi-rr-trash"></i></a>
								</div>
								<div class="file-search">
									<input type="file" class="input-file" id="liveImage" name="liveImage" accept="image/png, image/jpeg">
									<label class="bgray-btn" for="file-upload">{{__('global.select')}} {{__('global.file')}} </label>
								</div>
							</div>
							<?php 
							if($liveMediaPath != $defaultImagePath){
							?>	
							<div class="upload-imgarea">
								<div class="step2pimg" >
									<img src="{{$liveMediaPath}}" alt="image" />
								</div>
								<span class="image-name">{{$liveMediaPath == $defaultImagePath ?  'abcd.jpg' : ''}} </span>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>