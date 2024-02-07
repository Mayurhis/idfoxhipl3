<div class="nav-area">
				<aside class="dash-sidebar">
							<a href="{{route('admin.dashboard')}}" title="logo" class="sidebar-logo"><img src="{{asset('assets/admin/images/logo.png')}}" alt="logo" class="img-fluid"></a>
							<h6>WELCOME</h6>
							<ul class="nav-items">

								<li>
									<a href="{{route('admin.dashboard')}}"  title="{{__('global.dashboard')}}" class="{{request()->is("admin/dashboard") ? 'active' :''}}">
										<div class="menu-img">
											<img src="{{asset('assets/admin/images/dashaboard.svg')}}" alt="{{__('global.dashboard')}}">
										</div>
										{{__('global.dashboard')}}
									</a>
								</li>

								<li>
									<a href="{{route('admin.brands.index')}}" title="{{__('cruds.brand.title')}}" class="{{request()->is("admin/brands")  || request()->is("admin/brands*")? 'active' :''}}">
										<div class="menu-img">
											<img src="{{asset('assets/admin/images/brand.svg')}}" alt="{{__('cruds.brand.title')}}">
										</div>
										{{__('cruds.brand.title')}}
									</a>
								</li>

								<li>
									<a href="{{route('admin.customers.index')}}" title="{{__('cruds.customer.title')}}" class="{{request()->is("admin/customers")  || request()->is("admin/customers*")? 'active' :''}}">
										<div class="menu-img">
											<img src="{{asset('assets/admin/images/profile-white.svg')}}" alt="{{__('cruds.customer.title')}}">
										</div>
										{{__('cruds.customer.title')}}
									</a>
								</li>

								<li>
									<a href="{{route('admin.kyc_request')}}" title="{{__('cruds.kyc_request.title')}}"   class="{{request()->is("admin/kyc-request")  || request()->is("admin/kyc-request*")? 'active' :''}}" >
										<div class="menu-img">
											<img src="{{asset('assets/admin/images/profile-white.svg')}}" alt="{{__('cruds.kyc_request.title')}}">
										</div>
										{{__('cruds.kyc_request.title')}}
									</a>
								</li>

								<li>
									<a href="{{route('admin.upload-options.index')}}" title="{{__('cruds.upload-options.sidebar_title')}}"   class="{{request()->is("admin/upload-options")  || request()->is("admin/upload-options*")? 'active' :''}}" >
										<div class="menu-img">
											<img src="{{asset('assets/admin/images/profile-white.svg')}}" alt="{{__('cruds.upload-options.sidebar_title')}}">
										</div>
										{{__('cruds.upload-options.sidebar_title')}}
									</a>
								</li>

								<li>
									<a href="{{route('admin.kyc-configurations.index')}}" title="{{__('cruds.kyc-configurations.sidebar_title')}}"   class="{{request()->is("admin/kyc-configurations")  || request()->is("admin/kyc-configurations*")? 'active' :''}}" >
										<div class="menu-img">
											<img src="{{asset('assets/admin/images/profile-white.svg')}}" alt="{{__('cruds.upload-options.sidebar_title')}}">
										</div>
										{{__('cruds.kyc-configurations.sidebar_title')}}
									</a>
								</li>

								{{-- <li>
									<a href="{{route('admin.email-templates.index')}}" title="{{__('cruds.email-templates.title')}}"   class="{{request()->is("admin/email-templates")  || request()->is("admin/email-templates*")? 'active' :''}}" >
										<div class="menu-img">
											<img src="{{asset('assets/admin/images/profile-white.svg')}}" alt="{{__('cruds.email-templates.title')}}">
										</div>
										{{__('cruds.email-templates.title')}}
									</a>
								</li> --}}

								<li>
									<a href="{{route('logout')}}" title="{{__('global.logout')}}">
										<div class="menu-img">
											<img src="{{asset('assets/admin/images/log-out.svg')}}" alt="{{__('global.logout')}}">
										</div>
										{{__('global.logout')}}
									</a>
								</li>
							</ul>
							<!-- <div class="sidebar-bottom">
								<p><strong>LIFT EACH OTHER © 2020 - 2023</strong><br>91 High Street, Orpington, BR6 0LF</p>
							</div> -->
						</aside>
				
			</div>