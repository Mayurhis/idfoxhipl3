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
            <h2>{{__('global.edit')}} {{__('cruds.customer.title_singular')}}</h2>
        </div>
        <div class="add_brand">
            <a href="{{route('admin.customers.index')}}" class="nbtn gap-2">{{__('global.back')}} </a>
        </div></div>
    <div class="brand-list-area">
        <div class="row">
            <div class="col-12">
                <div class="kyc-configurator-form">
                    
                    <div class="content-form">
                        <div class="kyc-form createuser-form">
                            <form id="customerForm" class="customer-detail-form" enctype="multipart/form-data" method="POST" action="{{ route('admin.customers.update',$customer['id'])}}">
                                @csrf
                                @method('PATCH') <!-- Use the PATCH method for updating -->
                                @include('admin/customers/edit_form')
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
    function getUplaodOptions(countryID,customerID=null){
        $.ajax({
            type: "GET",
            url: '/admin/customers/getUploadOptions/'+countryID+'/'+<?php echo $customer['id'];?>,
            contentType: false,
            success: function(ajaxResponse) {
                $("#step2").html(ajaxResponse);
                $("#step2").css("display", "block");

            },
            error: function(response) {
                // console.log(response.responseJSON.message);
                $("#step2").html('');
                $("#step2").css("display", "none");
                toastr.error(response.responseJSON.message);
            }
        })
        return true;  
    }

    $(document).ready(function(){

        $("#step2").css("display", "none");
        getUplaodOptions("<?php echo $customer['address']['0']['country_id'];?>");

        $("#countryDropDown").change(function() {
            var countryID = $(this).val();
            getUplaodOptions(countryID);

        })
        
        $(document).on("submit","#customerForm",function(e){
            e.preventDefault();
            $('body').find('.contactError').remove();
            var addressPhotoRadio = $('input[name="AddressPhotoRadio"]:checked');
            var photoIdRadio = $('input[name="PhotoIdRadio"]:checked');
            if($('#brandListSelect').find(':selected').prop('disabled')){
                toastr.error('Selected brand has been deleted. Please select another brand', 'Error!');
                return false;
            }
            if (photoIdRadio.hasClass('uploadOption-changed')) {
                toastr.error('Selected photo image upload option has been either deleted or removed as default upload option. Please select another one and upload new image', 'Error!');
                return false;
            }
            if (addressPhotoRadio.hasClass('uploadOption-changed')) {
                toastr.error('Selected address image upload option has been either deleted or removed as default upload option. Please select another one and upload new image', 'Error!');
                 return false;
            }
            $('#customerForm').validate({
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
                                window.location.href = '{{route("admin.customers.index")}}';
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

         $('body').on('click', '#   ', function() {
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
</script>
@endsection