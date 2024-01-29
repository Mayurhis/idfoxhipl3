@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
	
	<div class="main-title add_brand_wrapper">
		<div class="dash-title">
			<h2>{{__('global.edit')}} {{__('cruds.email-templates.title')}}</h2>
		</div>
		<div class="add_brand">
			<a href="{{route('admin.email-templates.index')}}" class="nbtn gap-2">{{__('global.back')}} </a>
		</div>
    </div>
	<div class="brand-list-area">
		<div class="row">
            <div class="col-12 col-md-8">
				<div class="kyc-configurator-form">	
					<div class="content-form">
						<div class="kyc-form createuser-form">
                            <form id="emailTemplateForm" class="upload-option-detail-form" enctype="multipart/form-data" method="POST" action="{{ route('admin.email-templates.update',$emailTemplate['emailTemplate']['id'])}}">
                                @csrf
                                @method('PATCH') <!-- Use the PATCH method for updating -->

                                <!-- STEP 1 -->
                                <div class="step1">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group detail-fields">
                                                <label>{{__('cruds.email-templates.fields.title')}}</label>
                                                <input type="text" name="title" id="title"  placeholder="{{__('cruds.email-templates.fields.title')}}" value="{{ old('title', isset($emailTemplate) ? $emailTemplate['emailTemplate']['title'] : '') }}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
                                            
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group detail-fields">
                                                <label>{{__('cruds.email-templates.fields.subject')}}</label>
                                                <input type="text" name="subject" id="subject"  placeholder="{{__('cruds.email-templates.fields.subject')}}" value="{{ old('subject', isset($emailTemplate) ? $emailTemplate['emailTemplate']['subject'] : '') }}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        </div>
                                            @php 
                                                $status = config('admin.email_template_status');
                                            @endphp
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group detail-fields">
                                                <label>{{__('cruds.email-templates.fields.status')}}</label>

                                                <select class="upload_type form-control selectinit" id="status" name="status">
                                                  @foreach ($status as $key => $value)
                                                       <option value="{{$value}}" {{($emailTemplate['emailTemplate']['status'] == $value) ? 'selected' : ''}}>{{$key}}</option>
                                                  @endforeach
                                                </select>
                                            
                                            </div>
                                        </div>
                                            
                                        <div class="col-12 col-lg-12">
                                            <div class="form-group detail-fields">
                                                <label>{{__('cruds.email-templates.fields.email_body')}}</label>
                                                <textarea id="emailBody" name="email_body">
                                                        {{ isset($emailTemplate) ? $emailTemplate['emailTemplate']['email_body'] : '' }}    
                                                </textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="configuration_btns">
                                    <div class="back-btn">
                                        <a href="{{route('admin.email-templates.index')}}" class="outline-btn stepback-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                                        <path d="M6.70998 9.88047L2.82998 6.00047L6.70998 2.12047C7.09998 1.73047 7.09998 1.10047 6.70998 0.710469C6.31998 0.320469 5.68998 0.320469 5.29998 0.710469L0.70998 5.30047C0.31998 5.69047 0.31998 6.32047 0.70998 6.71047L5.29998 11.3005C5.68998 11.6905 6.31998 11.6905 6.70998 11.3005C7.08998 10.9105 7.09998 10.2705 6.70998 9.88047Z" fill="#bfc0c0"></path>
                                        </svg>{{__('global.back')}} / {{__('global.cancel')}}</a>
                                    </div>
                                    <div class="save_btn">
                                        <button type="submit" class="nbtn">{{__('global.save')}} {{__('global.configuration')}}</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
            <div class="col-12 col-md-4">
                <div class="kyc-configurator-form">	
					<div class="content-form">
                        @if(!empty($emailTemplate['emailTemplate']['short_codes']))
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Short Code Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <th>Short Code</th>
                                            <th>Description</th>
                                            <tbody>
                                            @php
                                                $short_codes = json_decode($emailTemplate['emailTemplate']['short_codes']);
                                                
                                            @endphp
                                            @forelse($short_codes as $shortcode => $key)
                                            <tr>
                                                <th style="width:50%" class="copy-content">
                                                @php echo "{{". $shortcode ."}}"  @endphp 
                                                <span class="float-right fi fi-rr-copy ml-2 Copy" title="Copy"></span>
                                                </th>
                                                <td>{{ $key }}</td>
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="100%" class="text-muted text-center">No Short Code</td>
                                                </tr>
                                            @endforelse
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
		</div>
	</div>
				
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
<script src="{{ asset('assets/admin/sweetalert2/sweetalert2.all.min.js') }}"></script>   
<script src="{{asset('assets/admin/summernote/summernote-bs4.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#emailBody').summernote({
          height: 150,
          focus: true
        })
        
        $(document).on("submit","#emailTemplateForm",function(e){
            e.preventDefault();
            $('#emailTemplateForm').validate({
                ignore: '.ignore',
                focusInvalid: false,
                rules: {
                    'title': {
                        required: true,                       
                    },
                    'subject': {
                        required: true,
                    },
                    'status': {
                        required: true,
                    },
                    'email_body': {
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
            if($("#emailTemplateForm").valid()){
                var url = $(this).attr('action');
                var formData = new FormData($(this).get(0));

                $.ajax({
                    type: "POST",
                    url: url,
                    //data: JSON.stringify(jsonObject),
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                      
                    },
                    beforeSend:function(){
                       // $('.overlay').show();
                    },
                    success: function(response) { 
                        swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                                window.location.href = '{{route("admin.email-templates.index")}}';
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

        $(".Copy").click(function(event){
            var $tempElement = $("<input>");
            $("body").append($tempElement);
            $tempElement.val($(this).closest('th').text()).select();
            document.execCommand("Copy");
            $tempElement.remove();
            toastr.info("Code Copied Successfully", 'Info!');
        });

        
    });
</script>
@endsection