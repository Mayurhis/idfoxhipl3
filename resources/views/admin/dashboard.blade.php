@extends('layouts.admin')
@section('content')
	<div class="dash-title">
		<h2 class="main-title">Dashboard</h2>
	</div>
	<div class="card-box-main">
		<div class="card-box">
			<h6>{{__('cruds.brand.title')}}</h6>
			<p class="card-value">{{$brandCount}}</p>
			<!-- <span class="care-per Mup">+14.4%</span> -->
		</div>
		<div class="card-box">
			<h6>{{__('global.customers')}}</h6>
			<p class="card-value">{{$customerCount}}</p>
			<!-- <span class="care-per Mdown">-10.8%</span> -->
		</div>
	</div>
	<div class="data-fieldtable">
		<div class="brand-listing d-flex">
			<h4 class="table-subtitle">{{__('cruds.kyc_request.last7daysKYC')}}</h4>
			<div class="select_brand">
				<label for="brandFilter">{{__('global.select')}} {{__('cruds.brand.title')}}</label>
				<select name="brandFilter" id="brandFilter">
					<option value="">--{{__('global.select')}} {{__('cruds.brand.title')}}--</option>
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
{!! $dataTable->scripts() !!}
<script>
	$(document).ready(function () {
		var brandFilter = $('#brandFilter');
		var dataTable = window.LaravelDataTables['dashboard-table'];
		brandFilter.on('change', function () {
			var selectedBrand = brandFilter.val();

			dataTable.ajax.url('{{ route('admin.dashboard') }}?brand=' + selectedBrand).load();
		});
	});
</script>
@endsection
