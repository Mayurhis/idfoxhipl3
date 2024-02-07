@extends('layouts.kyc')
@section('content')
<style>
.swiper-wrapper{
	height:auto;
}

    :root{
    --primary:{{$brand_details['accent_color']}};
   
	}

</style>
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
<section class="main-section">
		<div class="tab-top-block">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="tab-top-blog d-flex align-items-center justify-content-end">
							<ul class="nav nav-tabs border-0">
								<li class="nav-item step-1 active " role="presentation">
									<button class="nav-link">1</button>
								</li>
								<li class="nav-item step-2" role="presentation">
									<button class="nav-link">2</button>
								</li>
								<li class="nav-item step-3" role="presentation">
									<button class="nav-link">3</button>
								</li>
								<li class="nav-item step-4" role="presentation">
									<button class="nav-link">4</button>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-content-block">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="tab-bottom-blog edit-open form-step-1">
							@include("kyc.form_steps.step1")
							@php
						    $configurations = explode(',', $kycConfigurationDetails['configuration']);
							@endphp
							@if($kycConfigurationDetails)
								@includeWhen(in_array('photo_id_image', $configurations), 'kyc.form_steps.step2')
								@includeWhen(in_array('liveliness_image', $configurations), 'kyc.form_steps.step3')
								@includeWhen(in_array('address_image', $configurations), 'kyc.form_steps.step4')
							@else
								@include("kyc.form_steps.step1")
								@include("kyc.form_steps.step2")
								@include("kyc.form_steps.step3")
								@include("kyc.form_steps.step4")
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>

		@include("kyc.information_modal.terms_condition")
		@include("kyc.information_modal.photo_id_info")
		@include("kyc.information_modal.liveliness_info")
		@include("kyc.information_modal.address_info")
		@include("kyc.action_model.upload_address_proof")
		@include("kyc.action_model.switch_to_mobile")
		@include("kyc.action_model.id_verification")
		@include("kyc.action_model.failed_id_verification")
		@include("kyc.action_model.cancel_id_process")
	</section>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
{{-- <script src="{{ asset('assets/admin/sweetalert2/sweetalert2.all.min.js') }}"></script>     --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment-with-locales.min.js"></script>
@include("kyc.index_script")
@endsection