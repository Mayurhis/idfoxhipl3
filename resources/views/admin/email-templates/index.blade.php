@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/sweetalert2/sweetalert2.min.css') }}">
<style>
.table-switch .form-check-input:checked{
    background-color: #08d563;
    border-color: #08d563;
}
.table-switch .form-check-input:checked:focus{
    border-color: #08d563;
}
.table-switch .form-check-input{
    background-color: red;
    border-color: red;
}
.table-switch.form-switch .form-check-input,
.table-switch.form-switch .form-check-input:focus {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
}

.table-switch .form-check-input:focus{
	border-color:red;
	box-shadow:none;
}

.table-switch.form-switch .form-check-input{
	width: 2.1em;
}
.table-switch .form-check-input{
	height: 1.2em;
}
.table-switch.form-switch .form-check-label {
    line-height: 1.4;
}
</style>
@endsection
@section('content')


	<div class="main-title add_brand_wrapper">
        <div class="dash-title">
            <h2>{{__('cruds.email-templates.list_name')}}</h2>
        </div>
        {{-- <div class="add_brand">
            <a href="{{route('admin.email-templates.create')}}" class="nbtn gap-2"><i class="fi fi-rr-plus"></i>{{__('global.add')}} {{__('cruds.upload-options.title')}}</a>
        </div> --}}
                        
    </div>
	<div class="data-fieldtable">
		<div class="table-responsive-">
		{!! $dataTable->table() !!}
		</div>
	</div>
@endsection
@section('scripts')
{!! $dataTable->scripts() !!}
<script src="{{ asset('assets/admin/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
	$(document).ready(function () {
		$(document).on('change click', '.emailTemp_status', function(event) {
			var emailTempId = $(this).attr("data-status-id");
			var status = $(this).val();
			swal.fire({
				title: "{{__('global.areYouSure')}}",
				text: "{{__('global.recordStatusUpdate')}}",
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: "{{__('global.yesUpdateStatus')}}",
				cancelButtonText: "{{__('global.noCancel')}}",
			})
			.then((result) => {
				
				if (!result.isDismissed) {
					$.ajax({
						type: "POST",
						url: "{{route('admin.email-templates.updateStatus')}}",
						data: {
							_token: "{{csrf_token()}}",
							emailTempId: emailTempId,
							status: status,
						},
						headers: {
							'X-CSRF-TOKEN': '{{csrf_token()}}'
						},
						success: function(response) {
							toastr.success(response.message, 'Success!');
							
							$('#emailtemplate-table').DataTable().ajax.reload();
						},
						error: function(response) {
							let errorMessages = '';
							$.each(response.responseJSON.errors, function(key, value) {
								$.each(value, function(i, message) {
									errorMessages += '<li>' + message + '</li>';
								});
							});
							toastr.error(errorMessages);
						},
						complete: function() {
							
						}
					});
				} else {
					$('#emailtemplate-table').DataTable().ajax.reload();
					return false;
				}
			});
    	});
	});
</script>
@endsection