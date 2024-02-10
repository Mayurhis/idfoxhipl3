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
            <h2>{{__('global.create')}} {{__('cruds.kyc-configurations.title')}}</h2>
        </div>
        <div class="add_brand">
            <a href="{{route('admin.kyc-configurations.index')}}" class="nbtn gap-2"> {{__('global.back')}} </a>
        </div>
    </div>
    <div class="brand-list-area">
        <div class="row">
            <div class="col-12">
                <div class="kyc-configurator-form">
                    
                    <div class="content-form">
                        <div class="kyc-form createuser-form">
                            <form id="kycConfigurationForm" class="kyc-configuration-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.kyc-configurations.store')}}">
                                @csrf
                                @include('admin/kyc_configurations/_form')
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
        // $('.selectinit').select2({
            
	    // });
        $(document).on("submit","#kycConfigurationForm",function(e){
            e.preventDefault();
            $('#kycConfigurationForm').validate({
                ignore: '.ignore',
                focusInvalid: false,


                rules: {
                   'country_id': {
                        required: true,
                    },
                    'status': {
                        required: true,
                    },
                    'configuration': {
                        required: true,
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
            if($("#kycConfigurationForm").valid()){
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
                        //'Content-Type' : 'application/json',
                        //'Accept' : 'application/json',
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
                                window.location.href = '{{route("admin.kyc-configurations.index")}}';
                            }
                        });

                    },
                    error: function(response) {
                        if(response.responseJSON && response.responseJSON.code == 422){
                            $('.pageloader').removeClass('d-block');
                            $('.pageloader').addClass('d-none');

                            $('body').find('.contactError').remove();
                            const errorMessage = response.responseJSON.message;
                            if (errorMessage && errorMessage.errors) {
                                $.each(errorMessage.errors, function(key, value) {
                                    if(key == 'configuration'){
                                         var $field = $('.step_form_checkbox');
                                    }else{
                                         var $field = $('[name="' + key + '"]');
                                    }
                                   
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