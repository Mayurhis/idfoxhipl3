@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<div class="main-title add_brand_wrapper">
						<div class="dash-title">
							<h2>{{__('cruds.brand.title')}}</h2>
						</div>
						<div class="add_brand">
							<a href="{{route('admin.brands.create')}}" class="nbtn gap-2"><i class="fi fi-rr-plus"></i> {{__('global.add')}} {{__('cruds.brand.title_singular')}}</a>
						</div>
					</div>
					<div class="brand-list-area">
						<div class="row">
						 @foreach ($brand['data'] as $key => $value )
							<div class="col-12 col-lg-6 col-xl-4 mb-4">
								<div class="inner-brandde">
									<div class="Bimage">
										@if(isset($value) && count($value['brand_media']) > 0)
										<img src="{{$value['brand_media'][0]['upload_path']}}" alt="brand image" class="img-fluid">
										@else
										<img src="{{asset('assets/admin/images/folder.svg')}}" alt="brand image" class="img-fluid">
										@endif
									</div>
									<div class="Bdetails">
										<h5 class="mb-2"><a class="brand_link" href="{{route('admin.brands.customerlist',['brand' => $value['id']])}}" >{{$value['title']}}</a></h5>
										<!-- <span>KYC status: <strong>Complete</strong></span> -->
									</div>
									<div class="b-options">
										<div class="dropdown">
											<button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="100" viewBox="0 0 24 100" fill="none">
													<path d="M0 50C0 56.3615 5.17692 61.5385 11.5385 61.5385C17.9 61.5385 23.0769 56.3615 23.0769 50C23.0769 43.6385 17.9 38.4615 11.5385 38.4615C5.17692 38.4615 0 43.6385 0 50ZM0 88.4615C0 94.8231 5.17692 100 11.5385 100C17.9 100 23.0769 94.8231 23.0769 88.4615C23.0769 82.1 17.9 76.9231 11.5385 76.9231C5.17692 76.9231 0 82.1 0 88.4615ZM0 11.5385C0 17.9 5.17692 23.0769 11.5385 23.0769C17.9 23.0769 23.0769 17.9 23.0769 11.5385C23.0769 5.17692 17.9 0 11.5385 0C5.17692 0 0 5.17692 0 11.5385Z" fill="#606060"/>
												</svg>
											</button>
											<ul class="dropdown-menu dropdown-menu-end">
												<li><a class="dropdown-item" href="{{route('admin.brands.edit',$value['id'])}}">{{__('global.edit')}}</a></li>
												<li><form action="{{route('admin.brands.destroy', $value['id'])}}" method="POST" class="deleteBrandForm">
													<input type="hidden" name="_method" value="DELETE"> 
													<input type="hidden" name="_token" value="{{csrf_token()}}">
													<button class="dropdown-item" title="{{__('global.delete')}}">Delete</button></form>
													<!-- <a class="dropdown-item" href="javascript:void(0)">Delete</a> -->
												</li>

												<li><a class="dropdown-item" href="{{route('admin.brands.customerlist',['brand' => $value['id']])}}">{{__('cruds.customer.title')}} {{__('global.list')}}</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							
						</div>
					</div>


@endsection

@section('scripts')
@section('scripts')
	<script src="{{ asset('assets/admin/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
	$(document).ready(function () {
		$(document).on('submit', '.deleteBrandForm', function(e){
			e.preventDefault();
			var formData = $(this).serialize();
			var url = $(this).attr('action');
			swal.fire({
				title: "{{__('global.areYouSure')}}",
				text: "{{__('global.recordCannotBeRestored')}}",
				icon: 'question',
				//type: "warning",
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
									location.reload();
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