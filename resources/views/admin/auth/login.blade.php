<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>idFox</title>
        <link href="{{asset('assets/admin/images/fav-icon.png')}}" rel="icon">
        <!-- font-awesome Start  -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        <!-- End font-awesome Start  -->
        <!-- Bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" async>
        <!-- Main css -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}" async>
    </head>
    <body class="admin-dashboard">
    
        <div class="login-wrapper">
            <div class="container">
            
                <form class="form_wrapper" id="loginForm" method="POST" action="{{ route('admin.login_submit') }}">
                    <div class="top-content-login">
                        <img src="{{asset('assets/admin/images/logo.png')}}" alt="logo" title="logo-img">
                        <h3 class="login-title">Admin Login</h3>
                    </div>          
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Address<span class="mailstar" style="color: red;">*</span></label>
                        <input type="email" class="form-control" placeholder="Enter Email Address" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword">Password<span class="mailstar" style="color: red;">*</span></label>
                        <div class="input-password-wrap">
                            <input type="password" value="" placeholder="Enter Password" class="form-control" id="loginPassword" name="password">
                            <i class="fa fa-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <button type="submit" class="nbtn nextstepbtn" id="loginSubmit">Submit</button>
            </form>
            </div>
        </div>


        <!-- Jquery Library -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Bootstrap Js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" async integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>      
       <script>


        $(document).ready(function(){
            $('#togglePassword').on('click', function(e) {
                const password = $('#loginPassword');
                const type = password.attr('type') === 'password' ? 'text' : 'password';
                password.attr('type', type);
                $(this).toggleClass('fa-eye');
            });

            $("body").on("submit","#loginForm",function(e){
                e.preventDefault();
                $('body').find('.contactError').remove();
                $('#loginForm').validate({
                    ignore: '.ignore',
                    focusInvalid: false,
                    rules: {
                        'email': {
                            required: true,
                            email:true,
                        },
                        'password': {
                            required: true,
                        },
                    },
            
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        $('body').find('.contactError').remove();
                        error.addClass('invalid-feedback');
                        error.insertAfter(element);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $('body').find('.contactError').remove();
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        {{-- $('body').find('.contactError').remove(); --}}
                        $(element).removeClass('is-invalid');
                    },
                    //submitHandler: function (form) {
                        //  form.submit();
                    //},
                });

                if($("#loginForm").valid()){
                    var url = $(this).attr('action');
                    var email = $('input[name=email]').val();
                    var password = $('input[name=password]').val();
                    $('body').find('.contactError').remove();
                    $('body').find('#loginSubmit').prop('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            email : email,
                            password : password
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        beforeSend:function(){
                            $('.overlay').show();
                        },
                        success: function(response) {
                            $('body').find('.contactError').remove();
                            $("#loginForm")[0].reset();
                            window.location.replace("{{route('admin.dashboard')}}");
                            //toastr.success(response.message, 'Success!');
                            {{-- setTimeout(function() {
                                window.location.reload();
                            }, 500); --}}
                    
                        },
                        error: function(response) {
                            console.log(response);
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
                            } else if (response.responseJSON.code == 403){
                                 var $field = $('[name="email"]');
                                        
                                $field.after('<span class="text-danger contactError">' + response.responseJSON.message + '</span>');
                            }else {
                                console.log(response.responseJSON.message);
                            }
                           
                            // if(response.status == 422){
                            //     $('body').find('.contactError').remove();
                            //     const errorMessage = response.responseJSON.message.validation_errors;
                            //     if (errorMessage) {
                            //         $.each(errorMessage, function(key, value) {
                            //             var $field = $('[name="' + key + '"]');
                            //             $field.addClass('is-invalid');
                            //             $field.after('<span class="text-danger contactError">' + value[0] + '</span>');
                            //         });
                            //     }
                            // } else {
                                
                            //     console.log(response.responseJSON.message);
                            //     var $field = $('[name="email"]');
                                        
                            //     $field.after('<span class="text-danger contactError">' + response.responseJSON.message + '</span>');
                            // }
                            
                            // $('.overlay').hide();
                        },
                        complete: function() {
                        // $('.overlay').hide();
                        $('body').find('#loginSubmit').prop('disabled', false);
                        }
                    });

                };
            });
        });
        </script>
    </body>
</html>

