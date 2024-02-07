@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')


	<div class="main-title add_brand_wrapper">
						<div class="dash-title">
							<h2>{{__('cruds.upload-options.list_name')}}</h2>
						</div>
                        <div class="add_brand">
                            <a href="{{route('admin.upload-options.create')}}" class="nbtn gap-2"><i class="fi fi-rr-plus"></i>{{__('global.add')}} {{__('cruds.upload-options.title')}}</a>
                        </div></div>
	<div class="data-fieldtable">
		<div class="table-responsive-">
		{!! $dataTable->table() !!}
		</div>
	</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script src="{{ asset('assets/admin/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
	$(document).ready(function () {
		$(document).on('submit', '.deleteUploadOptionForm', function(e){
			e.preventDefault();
			var formData = $(this).serialize();
			var url = $(this).attr('action');
			swal.fire({
				title: "{{__('global.areYouSure')}}",
				text: "{{__('global.recordCannotBeRestored')}}",
				icon: 'question',
				type: "warning",
				showCancelButton: !0,
				confirmButtonText: "{{__('global.yesDelete')}}",
				cancelButtonText: "{{__('global.noCancel')}}",
				reverseButtons: !0
			}).then(function (e) {
				if (e.value === true) {
					$.ajax({
						type: 'delete',
						url: url,
						data: formData,
						dataType: 'JSON',
						success: function (response) {
							swal.fire({
								icon: 'success',
								title: 'Success!',
								text: response.message,
								confirmButtonText: 'OK'
							}).then((result) => {
								if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
									$('#upload-options-table').DataTable().ajax.reload();
								}
							});
						},
						error: function(response) {
							swal.fire({
                                icon: 'error',
                                title: "{{__('global.error')}}",
                                text: response.responseJSON.message,
                                confirmButtonText: 'OK'
                            });
						},
						complete: function() {
						
						}
					});
				} else {
					e.dismiss;
				}
			});
		});
	});
</script>
@endsection