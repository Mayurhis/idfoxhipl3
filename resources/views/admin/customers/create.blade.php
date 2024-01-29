@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')

    <div class="mobile-header d-md-none">
        <div class="mob-logo">
            <a href="javascript:void(0)" title="logo"><img src="images/logo.png" alt="logo" class="img-fluid"></a>
        </div>
        <div class="humberger-icon">
            <img src="images/humberger-icon.svg" alt="humberger-icon">
        </div>
    </div>
    <div class="main-title add_brand_wrapper">
        <div class="dash-title">
            <h2>{{__('global.create')}} {{__('cruds.customer.title_singular')}}</h2>
        </div>
        <div class="add_brand">
            <a href="{{route('admin.customers.index')}}" class="nbtn gap-2"> {{__('global.back')}} </a>
        </div>
    </div>
    <div class="brand-list-area">
        <div class="row">
            <div class="col-12">
                <div class="kyc-configurator-form">
                    
                    <div class="content-form">
                        <div class="kyc-form createuser-form">
                            
                            <form id="customerForm" class="customer-detail-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.customers.store')}}">
                                @csrf
                                @include('admin/customers/_form')
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
<script src="https://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script src="{{ asset('assets/admin/sweetalert2/sweetalert2.all.min.js') }}"></script> 
<script type="text/javascript">
     function getUplaodOptions(countryID){
         $.ajax({
                type: "GET",
                url: '/admin/customers/getUploadOptions/'+countryID+'/0',
                contentType: false,
                success: function(ajaxResponse) {
                    $("#step2").html(ajaxResponse);
                    $("#step2").css("display", "block");

                },
                error: function() {}
            })
           return true;  
    }

    $(document).ready(function(){

        $("#step2").css("display", "none");
        $("#countryDropDown").change(function() {
            var countryID = $(this).val();
            getUplaodOptions(countryID);
        });

        $(document).on("submit","#customerForm",function(e){
            e.preventDefault();
            var rules = {
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
                },
                'brand_id': {
                    required: true,
                },
                'status': {
                    required: true,
                }
            };
    
            validateForm(rules);
            if($("#customerForm").valid()){
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
                      
                    },
                    success: function(response) { 
                        swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            confirmButtonText: '{{__("global.ok")}}'
                        }).then((result) => {
                            if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                                window.location.href = '{{route("admin.customers.index")}}';
                            }
                        });
                    },
                    error: function(response) {
                        if(response.responseJSON.code == 422){
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
                                confirmButtonText: '{{__("global.ok")}}'
                            });
                        }
                    },
                    complete: function() {
                       
                    }
                });
            }
        });


        $(document).on('change', '#photoIdImage', function(){ 
            var file = $(this)[0].files[0]; 
            if (file) {
                var reader = new FileReader();
                $('#photoIdActionButton').removeClass('d-none');
                reader.onload = function(e) { 
                    $('#photoId').attr('src', e.target.result);
                    $('#photoIdName').html(file.name);
                };

                reader.readAsDataURL(file);
            } else {
                $('#photoIdActionButton').addClass('d-none');
                $('#photoId').attr('src','{{asset("assets/admin/images/default-img.png")}}');
                $('#photoIdName').html('abcd.jpg');
            }
        });


        $(document).on('click', '#photoIdActionButton', function(e){ 
            e.preventDefault();
            $('#photoIdImage').val('');
            $('#photoIdActionButton').addClass('d-none');
            $('#photoId').attr('src','{{asset("assets/admin/images/default-img.png")}}');
            $('#photoIdName').html('abcd.jpg');
        });


        $(document).on('change', '#addressImage', function(){ 
            var file = $(this)[0].files[0]; 
            if (file) {
                var reader = new FileReader();
                $('#addressIdActionButton').removeClass('d-none');
                reader.onload = function(e) { 
                    $('#addressId').attr('src', e.target.result);
                    $('#addressIdName').html(file.name);
                };

                reader.readAsDataURL(file);
            } else {
                $('#addressIdActionButton').addClass('d-none');
                $('#addressId').attr('src','{{asset("assets/admin/images/default-img.png")}}');
                $('#addressIdName').html('abcd.jpg');
            }
        });

        $(document).on('click', '#addressIdActionButton', function(e){ 
            e.preventDefault();
            $('#addressImage').val('');
            $('#addressIdActionButton').addClass('d-none');
            $('#addressId').attr('src','{{asset("assets/admin/images/default-img.png")}}');
            $('#addressIdName').html('abcd.jpg');
        });

        $(document).on('change', '#liveImage', function(){ 
            var file = $(this)[0].files[0]; 
            if (file) {
                var reader = new FileReader();
                $('#liveIdActionButton').removeClass('d-none');
                reader.onload = function(e) { 
                    $('#liveId').attr('src', e.target.result);
                    $('#liveIdName').html(file.name);
                };

                reader.readAsDataURL(file);
            } else {
                $('#liveIdActionButton').addClass('d-none');
                $('#liveId').attr('src','{{asset("assets/admin/images/default-img.png")}}');
                $('#liveIdName').html('abcd.jpg');
            }
        });

        $(document).on('click', '#liveIdActionButton', function(e){ 
            e.preventDefault();
            $('#liveImage').val('');
            $('#liveIdActionButton').addClass('d-none');
            $('#liveId').attr('src','{{asset("assets/admin/images/default-img.png")}}');
            $('#liveIdName').html('abcd.jpg');
        });


       
        $('body').on('change', 'input[name="PhotoIdRadio"]:radio', function() {
            $('#photoIdImage').removeClass('disabled-file');
        });

        $('body').on('change', 'input[name="AddressPhotoRadio"]:radio', function() {
            $('#addressImage').removeClass('disabled-file');
        });

        $('body').on('click', '#photoIdImage', function() {
            if($('#photoIdImage').hasClass('disabled-file')){
                toastr.error('Please select above options', 'Error!');
            }
        });


        $('body').on('click', '#addressImage', function() {
            if($('#addressImage').hasClass('disabled-file')){
                toastr.error('Please select above options', 'Error!');
            }
        });
    });

    function validateForm(rules){
        $('#customerForm').validate().destroy();
        $('#customerForm').validate({
            debug: true,
            ignore: '.ignore',
            focusInvalid: false,
            rules: rules,
            errorElement: 'span',
            errorPlacement: function(error, element) {
                console.log(element);
                error.addClass('invalid-feedback');
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            // submitHandler: function (form) {
            //      form.submit();
            // }
        });
    }
</script>
@endsection