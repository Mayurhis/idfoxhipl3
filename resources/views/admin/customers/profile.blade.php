@extends('layouts.admin')
@section('content')

    <div class="main-title add_brand_wrapper">
        <div class="dash-title">
            <h2>{{__('cruds.customer.title_singular')}} {{__('global.detail')}}</h2>
        </div>
        
    </div>
    <div class="user-detail-area">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-lg-2">
                <div class="user_profile">
                    <img class="img-fluid" src="{{asset('assets/admin/images/u-profile.jpg')}}" alt="profile">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-10">
                <div class="user_content">
                    <div class="mb-3">
                        <div class="name">
                            <h4>{{__('global.name')}}</h4>
                            <span>{{isset($customerProfileData['fullName']) ? $customerProfileData['fullName'] : __('global.N/A')}}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="name">
                            <h4>{{__('cruds.brand.title_singular')}} {{__('global.name')}}</h4>
                            <span>{{isset($customerProfileData['brand']) ? $customerProfileData['brand']['title'] : __('global.N/A')}}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="name">
                            <h4>{{__('cruds.customer.fields.dob')}}</h4>
                            <span>{{isset($customerProfileData['dob']) ? date('d F, Y',strtotime($customerProfileData['dob'])) : __('global.N/A')}}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="name">
                            <h4>{{__('cruds.customer.fields.address')}}</h4>
                            <span>{!! $customerProfileData['address'][0]['fullAddress']!!}</span>
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <div class="name">
                            <h4>{{__('cruds.customer.fields.city')}}</h4>
                            <span>{{$customerProfileData['address'][0]['city']}}</span>
                        </div>
                    </div> -->
                    <div class="mb-3">
                        <div class="name">
                            <h4>{{__('cruds.customer.fields.email')}}</h4>
                            <span>{{isset($customerProfileData['email']) ? $customerProfileData['email'] : __('global.N/A')}}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="name">
                            <h4>{{__('cruds.customer.fields.mobile_number')}}</h4>
                            <span>{{isset($customerProfileData['mobile_number']) ? $customerProfileData['mobile_number'] : __('global.N/A')}}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="name">
                            <h4>{{__('cruds.customer.fields.kyc_status')}}</h4>
                            <span class="{{$customerProfileData['status']}}">
                            {{-- @if($customerProfileData['verification_status'] == 1)
                            Complete
                            @else
                            Not Varified
                            @endif --}}
                            {{isset($customerProfileData['status']) ? ucfirst($customerProfileData['status']) : __('global.N/A')}}
                            
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="name">
                            <h4>{{__('cruds.customer.fields.gender')}}</h4>
                            <span>{{isset($customerProfileData['gender']) ? $customerProfileData['gender'] : __('global.N/A')}}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="name">
                            <h4>{{__('cruds.customer.fields.approval_type')}}</h4>
                            <span> {{config('admin.approval_method')[$customerProfileData['approval_type']] ?? __('global.N/A')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="cardUser-details">
            <div class="user-card-box">
                <div class="brand-listing">
                    <h4 class="table-subtitle">{{__('global.user')}} {{__('global.documents')}}</h4>
                </div>
            </div>
             <div class="row">
                @if(!empty($customerProfileData))
                

                @foreach($customerProfileData['media'] as $media)

                    <?php

                    if($media['upload_type'] != 'liveliness_image'){
                        $docType = ucwords(str_replace("_"," ",$media['upload_type']));
                        $docTitle = '<b>'.$docType.' </b> : ';
                        if(!empty($media['upload_option'])){
                            $docTitle .= $media['upload_option']['title'];
                        }
                    }else{
                        $docTitle = 'Liveliness Image';
                    }
                    ?>
                   
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <div class="user_identity">
                            <div class="identity_name">
                                <span class="pimg-area">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <g clip-path="url(#clip0_334_35)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.92267 5.46899H30.0777C31.1352 5.46899 32.0004 6.33414 32.0004 7.39166V25.9417C32.0004 26.9992 31.1352 27.8648 30.0777 27.8648H1.92267C0.864774 27.8648 -0.000366211 26.9992 -0.000366211 25.9417V7.39166C-0.000366211 6.33414 0.864774 5.46899 1.92267 5.46899ZM14.2735 9.1174H27.8191C28.013 9.1174 28.1709 9.27539 28.1709 9.46928V10.5264C28.1709 10.7203 28.013 10.8787 27.8191 10.8787H14.2735C14.0796 10.8787 13.9216 10.7203 13.9216 10.5264V9.46928C13.9216 9.27539 14.0796 9.1174 14.2735 9.1174ZM14.2735 13.0175H27.8191C28.013 13.0175 28.1709 13.1759 28.1709 13.3698V14.4269C28.1709 14.6208 28.013 14.7792 27.8191 14.7792H14.2735C14.0796 14.7792 13.9216 14.6208 13.9216 14.4269V13.3698C13.9216 13.1759 14.0796 13.0175 14.2735 13.0175ZM14.2735 16.5405H27.8191C28.013 16.5405 28.1709 16.6988 28.1709 16.8927V17.9498C28.1709 18.1437 28.013 18.3021 27.8191 18.3021H14.2735C14.0796 18.3021 13.9216 18.1437 13.9216 17.9498V16.8927C13.9216 16.6988 14.0796 16.5405 14.2735 16.5405ZM4.13901 21.2279H27.542C27.8882 21.2279 28.1709 21.5109 28.1709 21.8568V23.7443C28.1709 24.0901 27.8882 24.3732 27.542 24.3732H4.13901C3.79318 24.3732 3.51009 24.0901 3.51009 23.7443V21.8568C3.51009 21.5109 3.79318 21.2279 4.13901 21.2279ZM3.31279 17.398C3.31279 18.0009 3.61365 18.3021 4.21686 18.3021H11.5787C12.8388 18.3021 13.0187 16.3995 10.9343 15.4591C7.91932 14.0985 3.31279 15.06 3.31279 17.398ZM7.89551 9.1174C9.21533 9.1174 10.2849 10.187 10.2849 11.5065C10.2849 12.8263 9.21533 13.8959 7.89551 13.8959C6.57606 13.8959 5.50607 12.8263 5.50607 11.5065C5.50607 10.187 6.57606 9.1174 7.89551 9.1174Z" fill="#BFC0C0"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_334_35">
                                        <rect width="32" height="32" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                    </svg>
                                </span>
                                <span class="pid-title" >
                                   {!!$docTitle!!}
                                </span>
                            </div>
                            <div class="id-img">
                                <img class="img-fluid" src="{{$media['path']}}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach

                @endif
               
             </div>
        </div>
    </div>
@endsection