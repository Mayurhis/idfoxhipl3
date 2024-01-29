@extends('layouts.admin')
@section('content')
	<div class="dash-title">
		<h2 class="main-title">{{__('cruds.customer.title')}} {{__('global.list')}}</h2>
	</div>
	<div class="data-fieldtable">
		<!-- <div class="brand-listing d-flex">
			<div></div>
			<div class="select_brand addExerciseLibrary-wrapper">
				<label for="">Select Brands</label>
				<select name="" id="brandselect" class="selectdrop-qefault">
					<option value="Brand">Brand</option>
					<option value="Brand1">Brand1</option>
					<option value="Brand2">Brand2</option>
					<option value="Brand3">Brand3</option>
				</select>
			</div>
		</div> -->
		<div class="table-responsive">
			{!! $dataTable->table() !!}
		</div>
	</div>
@endsection

@section('scripts')
{!! $dataTable->scripts() !!}
@endsection