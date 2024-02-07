@extends('layouts.admin')

@section('content')


	<div class="main-title add_brand_wrapper">
						<div class="dash-title">
							<h2>{{__('cruds.customer.title')}} {{__('global.list')}}</h2>
						</div>
                        <div class="add_brand">
                            <a href="{{ route('admin.customers.create')}}" class="nbtn gap-2"><i class="fi fi-rr-plus"></i> {{__('global.add')}} {{__('cruds.customer.title_singular')}}</a>
                        </div></div>
	<div class="data-fieldtable">
		<div class="brand-listing d-flex">
			<div></div>
			<div class="select_brand addExerciseLibrary-wrapper">
				<label for="brandFilter">{{__('global.select')}} {{__('cruds.brand.title_singular')}}</label>
				<select name="brandFilter" id="brandFilter" class="selectdrop-qefault">
					<option value="">--{{__('global.select')}} {{__('cruds.brand.title_singular')}}--</option>
					@if(!empty($bandList))
						@foreach($bandList as $key=>$value) 
							<option value="{{$value['id']}}">{{$value['title']}}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
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
		var brandFilter = $('#brandFilter');
		var dataTable = window.LaravelDataTables['customer-table'];

		brandFilter.on('change', function () {
			var selectedBrand = brandFilter.val();

			dataTable.ajax.url('{{ route('admin.customers.index') }}?brand=' + selectedBrand).load();
		});


		$(document).on('submit', '.deleteCustomerForm', function(e){
			e.preventDefault();
			var formData = $(this).serialize();
			var url = $(this).attr('action');
			swal.fire({
				title: "Are You Sure ?",
				text: "Once deleted, this record cannot be restored",
				icon: 'question',
				type: "warning",
				showCancelButton: !0,
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel!",
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
									$('#customer-table').DataTable().ajax.reload();
								}
							});
						},
						error: function(response) {
							swal.fire({
                                icon: 'error',
                                title: 'Error!',
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