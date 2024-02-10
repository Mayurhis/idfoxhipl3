@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    <div class="pageloader d-none">
        <div class="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="main-title add_brand_wrapper">
        <div class="dash-title">
            <h2>{{__('cruds.kyc_request.kyc_theme')}}</h2>
        </div>
    </div>
    <div class="brand-list-area">
        <div class="row">
            <div class="col-12">
                <div class="kyc-configurator-form">
                    <div class="head-form">
                        <div class="title">
                            <h3>
                                {{__('cruds.kyc_request.kyc_theme_configurator')}}
                            </h3>
                        </div>
                    </div>
                    <div class="content-form">
                        <div class="subtitle">
                            <span>
                                {{__('cruds.kyc_request.kyc_subtitle_1')}}
                            </span>
                            <p>
                                {{__('cruds.kyc_request.kyc_subtitle_2')}}
                            </p>
                        </div>
                        <div class="kyc-form">
                            <form id="brandForm" method="POST" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
                                @csrf
                                @include('admin/brand/_form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
<script src="{{ asset('assets/admin/sweetalert2/sweetalert2.all.min.js') }}"></script>    
<script type="text/javascript">
    $(document).ready(function(){
         {{-- $('.selectinit').select2({
            
	    }); --}}
        $('#uploadlogo').change(function() {
            $('#uploadlogo').removeData('imageWidth');
            $('#uploadlogo').removeData('imageHeight');
            var file = this.files[0];
            var tmpImg = new Image();
            tmpImg.src=window.URL.createObjectURL( file ); 
            tmpImg.onload = function() {
                width = tmpImg.naturalWidth,
                height = tmpImg.naturalHeight;
                $('#uploadlogo').data('imageWidth', width);
                $('#uploadlogo').data('imageHeight', height);
            }
        });

        $.validator.addMethod('domain_check', function(value, element) {
            var domainRegex = /^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return this.optional(element) || domainRegex.test(value);
        }, '{{__("validation.domain_name_validation")}}');

        $.validator.addMethod('imageDimensions', function(value, element, param) {
            if(element.files.length == 0){
                return true; 
            }
            var width = $(element).data('imageWidth');
            var height = $(element).data('imageHeight');
            if(width <= param[0] && height <= param[1]){
                return true;
            }else{
                return false;
            }
        }, `{{ __("validation.logo_dimension_validation", ["0" => "{0}", "1" => "{1}"]) }}`);

        $(document).on("submit","#brandForm",function(e){
            e.preventDefault();
            $('#brandForm').validate({
                ignore: '.ignore',
                focusInvalid: false,
                rules: {
                    'domain': {
                        required: true,
                        domain_check: true,
                    },
                    'display_logo': {
                        required: true,
                    },
                    'title': {
                        required: true,
                    },
                    'audience': {
                        required: true,
                    },
                   
                    'theme': {
                        required: true,
                    },
                    'accent_color': {
                        required: true,
                    },
                    'button_color': {
                        required: true,
                    },
                    'defaul_language': {
                        required: true,
                    },
                   
                    'display_name': {
                        required: true,
                    },
                    'approval_method': {
                        required: true,
                    },
                    'logo': {
                        imageDimensions: [70, 70],
                    },
                    
                    
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
                //submitHandler: function (form) {
                    //  form.submit();
                //},
            });
            if($("#brandForm").valid()){
                var url = $(this).attr('action');
                var formData = new FormData($(this).get(0));

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
                      
                        swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                                window.location.href = '{{route("admin.brands.index")}}';
                            }
                        });
                        
                       
                        
                    },
                    error: function(response) {
                        
                        if(response.responseJSON.code == 422){
                            $('.pageloader').removeClass('d-block');
                            $('.pageloader').addClass('d-none');

                            $('body').find('.contactError').remove();
                            const errorMessage = response.responseJSON.message;
                            if (errorMessage && errorMessage.errors) {
                                $.each(errorMessage.errors, function(key, value) {
                                    var $field = $('[name="' + key + '"]');
                                    $field.addClass('is-invalid');
                                    $field.after('<span class="text-danger contactError">' + value[0] + '</span>');
                                });
                            }
                        } else {
                            swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.responseJSON.message,
                                confirmButtonText: 'OK'
                            });
                            
                        }
                    },
                    complete: function() {
                        //$('.overlay').hide();
                    }
                });
            }
        });
    });
</script>
@endsection