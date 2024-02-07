<script type="text/javascript">
	updateRootVariables("{{$brand_details['accent_color']}}");
	function updateRootVariables(primaryColor) {
            $(':root').css('--primary', primaryColor);
    }

  var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent.toLowerCase());

	if (isMobile)
	{
		$(".take_photo_id_pic").show();
		$(".take_address_pic").show();
	}else{
		$(".take_photo_id_pic").hide();
		$(".take_address_pic").hide();
	}
    $(document).ready(function(){
    	$(document).on("submit","#kycVerifiactionStep1",function(e){
            e.preventDefault();
            var form1Next = $('.submit-form-1');
            $('#kycVerifiactionStep1').validate({
                ignore: '.ignore',
                focusInvalid: false,
                rules: {
                    'first_name': {
                        required: true,
                    },
                    'last_name': {
                        required: true,
                    },
                    'dob': {
                        required: true,
                    },
                   
                    'email': {
                        required: true,
						email: true,
                    },
                    'address_line_1': {
                        required: true,
                    },
                    'city': {
                        required: true,
                    },
                    'region': {
                        required: true,
                    },
                   
                    'country_id': {
                        required: true,
                    }
                },
                
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                
            });
            if($("#kycVerifiactionStep1").valid()){
                var url = $(this).attr('action');
                var formData = new FormData($(this).get(0));
				$('body').find('.contactError').remove();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    beforeSend:function(){
                    	$('.pageloader').removeClass('d-none');
                        $('.pageloader').addClass('d-block');
                    },
                    success: function(response) { 
						$('.pageloader').removeClass('d-block');
                        $('.pageloader').addClass('d-none');
						putDataInDetail(response.data);
					   
					   $('.tab-bottom-blog').removeClass('edit-open');
					   $('body').find('.contactError').remove();

					  	$.ajax({
			                type: "GET",
			                url: 'get-upload-options/'+response.data.country_id,
			                contentType: false,
			                success: function(ajaxResponse) {
			                	$("#photoUplaodOptions").html(ajaxResponse['htmlPhotoIdListing']);
			                    $("#addressUplaodOptions").html(ajaxResponse['htmlAddressListing']);

			                    
			                },
			                error: function() {}
			            })

			            
			            
                    },
                    error: function(response) {
                        $('.pageloader').removeClass('d-block');
						$('.pageloader').addClass('d-none');
                        
                        if(response.status == 422){
                        	$('body').find('.contactError').remove();
                            $.each(response.responseJSON.errors, function(key, value) {
									var $field = $('[name="' + key + '"]');
									$field.addClass('is-invalid');
									$field.after('<span class="text-danger d-block contactError">' + value[0] + '</span>');
							});
                        } else {
                            
                        }
                    },
                    complete: function() {
                        
                    }
                });
            }
        });

		
		
		$(document).on('click', '.submit-form-2', function(e){ 

      		var formId = 'kycVerifiactionStep2';
			var formSelector = 'submit-form-2';
			var fieldSelector = 'photoIdImage';
			var rules = {fieldSelector : {required: true,},}
			submitStepForm(formId,formSelector,fieldSelector,rules);

        });

    	$(document).on('click', '.submit-form-3', function(e){ 
    		var formId = 'kycVerifiactionStep3';
			var formSelector = 'submit-form-3';
			var fieldSelector = 'liveImage';
			var rules = {fieldSelector : {required: true,},}
			submitStepForm(formId,formSelector,fieldSelector,rules);

        });

		$(document).on('click', '.submit-form-4', function(e){ 
			
			var formId = 'kycVerifiactionStep4';
			var formSelector = 'submit-form-4';
			var fieldSelector = 'addressImage';
			var rules = {fieldSelector : {required: true,},}
			submitStepForm(formId,formSelector,fieldSelector,rules);
    		
        });

        $(document).on('click', '.submit-form-1', function(e){ 
        	var form1Next = $('.submit-form-1');
        	getNextStep(form1Next);
        });

        $(document).on('click', '.form-2-back', function(e){ 
        	var bac2kStep = $('.form-2-back');
        	getBackStep(bac2kStep);
        });

        $(document).on('click', '.form-3-back', function(e){ 
        	var back3Step = $('.form-3-back');
        	getBackStep(back3Step);
        });
        
        $(document).on('click', '.form-4-back', function(e){ 
        	var back4Step = $('.form-4-back');
        	getBackStep(back4Step);
        });

		$("#form2Continue").click(function () {
			var formId = 'kycVerifiactionStep2';
			var fieldSelector = 'PhotoIdRadio';
			var elementSelector= 'photoIdAnchor';
			var rules = { 'PhotoIdRadio': {required: true,}};
			var nextModal = 'uploadidPic';
			formStepsValidation(formId,fieldSelector,elementSelector,rules,nextModal);

		});

		
		$(document).on('click', ".take_photo_id_pic",function(e){
			e.preventDefault();
        	addCaptureAttributeOnPhotoIdImage();
		});

		
		$('#photoIdImage,.take_photo_id_pic').focusout(function(){
			$('#photoIdImage').removeAttr('capture');
		});

		$('#photoIdImage').change(function () {
			$('#photoIdImage').removeAttr('capture');		
		});	

		function addCaptureAttributeOnPhotoIdImage() {
	        $('#photoIdImage').val('');
	        $('.step2pimg img').attr("src", "{{asset('assets/kyc/images/default-img.png')}}");
	        $('.image-name').text("abcd.jpg");
	        $('#photoIdImage').attr("capture", "camera");
	        $('#photoIdImage').trigger('click');
	        $('#upload_submit').html('Upload <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.35 6.04C18.67 2.59 15.64 0 12 0C9.11 0 6.6 1.64 5.35 4.04C2.34 4.36 0 6.91 0 10C0 13.31 2.69 16 6 16H19C21.76 16 24 13.76 24 11C24 8.36 21.95 6.22 19.35 6.04ZM14 9V13H10V9H7L11.65 4.35C11.85 4.15 12.16 4.15 12.36 4.35L17 9H14Z" fill="black"/></svg>');
	        $('#upload_submit').addClass('btn');
	    }



	    $(document).on('click', ".take_address_pic",function(e){
			e.preventDefault();
        	addCaptureAttributeOnAddressImage();
		});

		
		$('#addressImage,.take_photo_id_pic').focusout(function(){
			$('#addressImage').removeAttr('capture');
		});

		$('#addressImage').change(function () {
			$('#addressImage').removeAttr('capture');		
		});	

		function addCaptureAttributeOnAddressImage() {
	        $('#addressImage').val('');
	        $('.step2pimg img').attr("src", "{{asset('assets/kyc/images/default-img.png')}}");
	        $('.image-name').text("abcd.jpg");
	        $('#addressImage').attr("capture", "camera");
	        $('#addressImage').trigger('click');
	        $('#upload_submit').html('Upload <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.35 6.04C18.67 2.59 15.64 0 12 0C9.11 0 6.6 1.64 5.35 4.04C2.34 4.36 0 6.91 0 10C0 13.31 2.69 16 6 16H19C21.76 16 24 13.76 24 11C24 8.36 21.95 6.22 19.35 6.04ZM14 9V13H10V9H7L11.65 4.35C11.85 4.15 12.16 4.15 12.36 4.35L17 9H14Z" fill="black"/></svg>');
	        $('#upload_submit').addClass('btn');
	    }

	    


		// $(document).on('click', '#photoIdImage', function(e){ 

		// 	if($("#photoIdImage").hasAttribute("capture")){
		// 		alert('dassdsds');
		// 	}	

  //       });


		$("#form4Continue").click(function () {

			var formId = 'kycVerifiactionStep4';
			var fieldSelector = 'addressRadio';
			var elementSelector= 'addressAnchor';
			var rules = { 'addressRadio': {required: true,}};
			var nextModal = 'uploadaddproof';
			formStepsValidation(formId,fieldSelector,elementSelector,rules,nextModal);
    	
		});

    	function getNextStep(button){

			  
			  var currentSection = button.parents(".tab-pane");
			  var currentSectionIndex = currentSection.index();
			  var headerSection = $('.nav-tabs li').eq(currentSectionIndex);
			  currentSection.removeClass("active").next().addClass("active");
			  currentSection.removeClass("show").next().addClass("show");
			  headerSection.removeClass("active").next().addClass("active");
		  
			  if(currentSectionIndex === 4){
				$(document).find(".tab-bottom-blog .tab-pane").first().addClass("active");
				$(document).find(".nav-tabs li").first().addClass("active");
			  }
			
    	}

    	function getBackStep(button){
    		var currentSection = button.parents(".tab-pane");
			var currentSectionIndex = currentSection.index();
			var headerSection = $('.nav-tabs li').eq(currentSectionIndex);
			currentSection.removeClass("active").prev().addClass("active");
			currentSection.removeClass("show").prev().addClass("show");
			headerSection.removeClass("active").prev().addClass("active");
		
			if(currentSectionIndex === 4){
			  $(document).find(".tab-bottom-blog .tab-pane").first().addClass("active");
			  $(document).find(".nav-tabs li").first().addClass("active");
			}
    	}

    	/******************************************/
		function submitStepForm(formId,formSelector,fieldSelector,rules){
			var formDetail = $('#'+formId);
			var formNext = $('.'+formSelector);
			$('#'+formId).validate({
				ignore: '.ignore',
				focusInvalid: false,
				rules:rules,
				errorElement: 'span',
				errorPlacement: function (error, element) {
					error.addClass('invalid-feedback');
					if (element.attr("name") == fieldSelector) {
						error.insertAfter(element.parent()); 
					} else {
						error.insertAfter(element);
					}
				},
				
				highlight: function (element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function (element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				},
			});

			if ($("#"+formId).valid()) {
				var url = formDetail.attr('action');
				var formData = new FormData(formDetail.get(0));

				$('body').find('.contactError').remove();
				$.ajax({
					type: "POST",
					url: url,
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					headers: {
						'X-CSRF-TOKEN': "{{ csrf_token() }}",
					},
					beforeSend: function () {
						$('.pageloader').removeClass('d-none');
						$('.pageloader').addClass('d-block');
					},
					success: function (response) {
						$('.pageloader').removeClass('d-block');
						$('.pageloader').addClass('d-none');

						if(response.message == "form submitted"){
							getNextStep(formNext);
						}else{
							$('#id-vercomplete').modal('show');
						} 

					},
					error: function (response) {
						$('.pageloader').removeClass('d-block');
						$('.pageloader').addClass('d-none');
						
						if (response.status == 422) {
							console.log('errorResponse :' + response );

							$('body').find('.contactError').remove();
							$.each(response.responseJSON.errors, function (key, value) {
								var $field = $('[name="' + key + '"]');
								$field.addClass('is-invalid');

								switch (formId) {
								  case 'kycVerifiactionStep1':
								  		$field.after('<span class="text-danger d-block contactError">' + value[0] + '</span>');
								    
								    break;
								  case 'kycVerifiactionStep2':
								  case 'kycVerifiactionStep3':
								  case 'kycVerifiactionStep4':
								    	var fileField =  $('.file-search');
										fileField.after('<span class="text-danger d-block contactError">' + value[0] + '</span>');
								    break;

								  default:
								    	$field.after('<span class="text-danger d-block contactError">' + value[0] + '</span>');
								}

							});
						} else {


						}
					},
					complete: function () {
						
					}
				});
			}

		}

		function formStepsValidation(formId,fieldSelector,elementSelector,rules,nextModal){
			var form = $("#"+formId);
			form.validate({
				errorElement: 'span',
				errorClass: 'invalid-feedback',
				errorPlacement: function (error, element) {
					if (element.attr("name") == fieldSelector) {
						var $liElement = element.closest('li');
						$liElement.find('.error-message').remove(); 
						error.insertAfter($liElement.find('.'+elementSelector));
					} else {
						error.insertAfter(element);
					}
				},
				highlight: function (element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function (element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				},
				rules: rules,
			});

			if ($("#"+formId).valid() === false) {
				$.each(response.responseJSON.errors, function (key, value) {
					form.find('[name="' + key + '"]').addClass('is-invalid');
				});
			} else {
				if ($('[name="'+fieldSelector+'"]:checked').length === 0) {
					var $liElement = $('[name="'+fieldSelector+'"]:checked').closest('li');
					$liElement.find('.error-message').remove(); 
					$liElement.append('<span class="text-danger d-block error-message">Please select a photo option.</span>');
				} else {
					//$('.photoIdValidationMessage').hide();
					$('#'+nextModal).modal('show');
				}
			}
		}

		/******************************************/

    	
		function putDataInDetail(data)
		{

			var nameDetail = '';
			if (data.prefix !== null) {
				nameDetail += data.prefix + ' ';
			}

			if (data.first_name !== null) {
				nameDetail += data.first_name + ' ';
			}

			if (data.middle_name !== null) {
				nameDetail += data.middle_name + ' ';
			}

			if (data.last_name !== null) {
				nameDetail += data.last_name + ' ';
			}

			if (data.suffix !== null) {
				nameDetail += data.suffix;
			}


			var momentObj = moment(data.dob);
			var formattedDob = momentObj.format("DD MMM YYYY");
			$('#nameDetail').text(nameDetail);
			$('#dobDetail').text(formattedDob);
			$('#addressLine1Detail').text(data.address_line_1);
			$('#addressLine2Detail').text(data.address_line_2);
			$('#postCodeDetail').text(data.post_code);
			$('#cityDetail').text(data.city);
			$('#regionDetail').text(data.region);
			$('#emailDetail').text(data.email);
			$('#mobileNumberDetail').text(data.mobile_number);
			
        	var dataSrcValue = $('#country_id').find('option:selected').data('src');
			var dataIsoValue = $('#country_id').find('option:selected').data('iso');
			var dataCountryValue = $('#country_id').find('option:selected').data('country');
			
			if("{{ env('APP_URL') }}"+'assets/flags' == dataSrcValue){
				dataSrcValue = "{{asset('assets/kyc/images/flags/icon-f.png')}}";
			}
			$('#countryflagDetail').attr('src', dataSrcValue);
			$('#countryDetail').text(dataCountryValue);
			$('#isoDetail').text(dataIsoValue);
			
			return true;


		}


		
    });
</script>