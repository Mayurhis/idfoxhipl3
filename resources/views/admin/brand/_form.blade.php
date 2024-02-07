<div class="form-group">
    <label>{{__('cruds.brand.fields.domain_name')}}</label>
    <input id="my-input" class="form-control" type="text" placeholder="{{__('global.enter')}} {{__('cruds.brand.fields.domain_name')}}" name="domain" value="{{ old('domain', isset($brand) ? $brand['data']['brand_detail']['domain'] : '') }}" >
</div>
<div class="form-group">
    <label>{{__('cruds.brand.fields.company_name')}}</label>
    <span class="font-sm">{{__('cruds.brand.fields.company_name_heading')}}</span>
    <input  class="form-control" type="text" placeholder="{{__('global.enter')}} {{__('cruds.brand.fields.company_name')}}" name="title" value="{{ old('title', isset($brand) ? $brand['data']['title'] : '') }}" >
    
</div>

<div class="form-group">
    <label>{{__('cruds.brand.fields.audience')}}</label>
    <!-- <span class="font-sm">{{__('cruds.brand.fields.company_name_heading')}}</span> -->
    <input  class="form-control" type="text" placeholder="{{__('global.enter')}} {{__('cruds.brand.fields.audience')}}" name="audience" value="{{ old('audience', isset($brand) ? $brand['data']['audience'] : '') }}" >
    
</div>

<div class="form-group">
    <label>{{__('cruds.brand.fields.display_company')}}</label>
    <span class="font-sm">{{__('cruds.brand.fields.display_company_heading')}}</span>

    <div class="check-list">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="display_name" value="1" id="flexCheckDefault9" {{ (isset($brand) && $brand['data']['brand_detail']['display_name'] == '1' ? 'checked' : '') }} >
            <label class="form-check-label" for="flexCheckDefault9" >
                {{__('global.yes')}}
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="display_name" value="0" id="flexCheckDefault10"  {{ (isset($brand) && $brand['data']['brand_detail']['display_name'] == '0' ? 'checked' : '') }} {{ (!isset($brand) ? 'checked' : '') }}>
            <label class="form-check-label" for="flexCheckDefault10">
                {{__('global.no')}}
            </label>
            </div>
    </div>
</div>

<div class="form-group">
    <label>{{__('cruds.brand.fields.company_logo')}}</label>
    <span class="font-sm">{{__('cruds.brand.fields.company_logo_heading')}}</span>

    <div class="check-list">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="display_logo" value="1" id="flexCheckDefault" {{ (isset($brand) && $brand['data']['brand_detail']['display_logo'] == '1' ? 'checked' : '') }} >
            <label class="form-check-label" for="flexCheckDefault" >
                {{__('global.yes')}}
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="display_logo" value="0" id="flexCheckDefault1"  {{ (isset($brand) && $brand['data']['brand_detail']['display_logo'] == '0' ? 'checked' : '') }} {{ (!isset($brand) ? 'checked' : '') }}>
            <label class="form-check-label" for="flexCheckDefault1">
                {{__('global.no')}}
            </label>
            </div>
    </div>
    <div class="logo-upload-wrapper">
        <div class="logo-upload">
            <label for="uploadlogo" class="d-flex upload_brand_logo">
                <div class="link-icon">
                    <svg width="10" height="19" viewBox="0 0 10 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63636 4.96449V14.1005C8.63636 15.9052 7.24546 17.5114 5.35455 17.6841C3.18182 17.8827 1.36364 16.2679 1.36364 14.2473V3.57423C1.36364 2.44303 2.21818 1.41545 3.4 1.30319C4.76364 1.17366 5.90909 2.18398 5.90909 3.45334V12.5202C5.90909 12.9952 5.5 13.3838 5 13.3838C4.5 13.3838 4.09091 12.9952 4.09091 12.5202V4.96449C4.09091 4.61045 3.78182 4.31686 3.40909 4.31686C3.03636 4.31686 2.72727 4.61045 2.72727 4.96449V12.3994C2.72727 13.5306 3.58182 14.5581 4.76364 14.6704C6.12727 14.7999 7.27273 13.7896 7.27273 12.5202V3.60014C7.27273 1.79539 5.88182 0.189256 3.99091 0.0165531C1.82727 -0.182055 0 1.43272 0 3.45334V14.0487C0 16.527 1.90909 18.7462 4.50909 18.9793C7.5 19.2384 10 17.0278 10 14.2473V4.96449C10 4.61045 9.69091 4.31686 9.31818 4.31686C8.94545 4.31686 8.63636 4.61045 8.63636 4.96449Z" fill="#DFA465"/>
                    </svg>                                                                    
                </div>
                {{__('cruds.brand.fields.upload_logo')}}
                <!-- <div></div> -->
                <div class="submit-file d-none">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="25" height="25" rx="4" fill="#3AA537"></rect>
                        <path d="M9.18178 18.5852C8.72623 18.5853 8.28933 18.4043 7.96748 18.0819L4.29627 14.412C3.90124 14.0169 3.90124 13.3763 4.29627 12.9812C4.69142 12.5862 5.33196 12.5862 5.72711 12.9812L9.18178 16.4359L18.3214 7.29627C18.7165 6.90124 19.3571 6.90124 19.7522 7.29627C20.1472 7.69142 20.1472 8.33196 19.7522 8.72711L10.3961 18.0819C10.0742 18.4043 9.63733 18.5853 9.18178 18.5852Z" fill="white"></path>
                    </svg>
                </div>
                <div class="addbtn">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_280_24)">
                        <path d="M4.76837e-07 9.16667H9.16667V0H10.8333V9.16667H20V10.8333H10.8333V20H9.16667V10.8333H4.76837e-07V9.16667Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_280_24">
                        <rect width="20" height="20" fill="white" transform="matrix(-1 0 0 1 20 0)"/>
                        </clipPath>
                        </defs>
                    </svg>                                                                    
                </div>
            </label>
            <div class="filename_upload">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="25" height="25" rx="4" fill="#3AA537"></rect>
                    <path d="M9.18178 18.5852C8.72623 18.5853 8.28933 18.4043 7.96748 18.0819L4.29627 14.412C3.90124 14.0169 3.90124 13.3763 4.29627 12.9812C4.69142 12.5862 5.33196 12.5862 5.72711 12.9812L9.18178 16.4359L18.3214 7.29627C18.7165 6.90124 19.3571 6.90124 19.7522 7.29627C20.1472 7.69142 20.1472 8.33196 19.7522 8.72711L10.3961 18.0819C10.0742 18.4043 9.63733 18.5853 9.18178 18.5852Z" fill="white"></path>
                </svg>
                <input type="file" id="uploadlogo" name="logo" class="uploadlogo_text"  accept="image/png, image/svg, image/PNG, image/SVG">
            </div>
        </div>
        <span class="font-sm"><em style="font-weight: bold;">{{__('global.note')}} </em>- {{__('cruds.brand.fields.upload_logo_note')}}</span>
        @if(isset($brand) && count($brand['data']['brand_media']) > 0)
            <img class="brandLogo mt-2" src="{{$brand['data']['brand_media'][0]['upload_path']}}" alt="Logo Image" > 
        @endif
    </div>
</div>

<div class="form-group">
    <label>{{__('cruds.brand.fields.theme')}}</label>
    <span class="font-sm">{{__('cruds.brand.fields.theme_heading')}}</span>
    <div class="check-list">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="theme" value="dark" id="flexCheckDefault3" {{ (isset($brand) && $brand['data']['brand_detail']['theme'] == 'dark' ? 'checked' : '') }} >
            <label class="form-check-label" for="flexCheckDefault3"  >
                {{__('global.dark')}} {{__('cruds.brand.fields.theme')}}
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="theme" value="light" id="flexCheckDefault4"  {{ (isset($brand) && $brand['data']['brand_detail']['theme'] == 'light' ? 'checked' : '') }} {{ (!isset($brand) ? 'checked' : '') }}>
            <label class="form-check-label" for="flexCheckDefault4">
                {{__('global.light')}} {{__('cruds.brand.fields.theme')}}
            </label>
            </div>
    </div>
    <span class="font-sm"><em style="font-weight: bold;">{{__('global.note')}} </em>- {{__('cruds.brand.fields.theme_note')}}</span>
</div>

<div class="form-group">
    <label>{{__('cruds.brand.fields.accent_colour')}}</label>
    <span class="font-sm">
        {{__('cruds.brand.fields.accent_colour_heading')}}
    </span>
    <div class="colorpicker_wrapper">
        <div class="colorpicker_inner">
            <input type="text" name="accent_color" value="{{ old('accent_color', isset($brand) ? $brand['data']['brand_detail']['accent_color'] : '#dfa465') }}" data-coloris>
            {{-- <div class="apply-btn">
                <a href="javascript:void(0)" class="nbtn applybtn-box">
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 11.0025C3.34 11.0025 2 12.3425 2 14.0025C2 15.3125 0.84 16.0025 0 16.0025C0.92 17.2225 2.49 18.0025 4 18.0025C6.21 18.0025 8 16.2125 8 14.0025C8 12.3425 6.66 11.0025 5 11.0025ZM18.71 1.6325L17.37 0.2925C16.98 -0.0975 16.35 -0.0975 15.96 0.2925L7 9.2525L9.75 12.0025L18.71 3.0425C19.1 2.6525 19.1 2.0225 18.71 1.6325Z" fill="#DFA465"/>
                    </svg>                                                                        
                    {{__('cruds.brand.fields.apply_hex_colour')}}
                </a>
            </div> --}}
        </div>
    </div>
    <span class="font-sm">
        {{__('cruds.brand.fields.select_other_color')}}
    </span>
</div>

<div class="form-group">
    <label>{{__('cruds.brand.fields.button_colour')}}</label>
    <span class="font-sm">{{__('cruds.brand.fields.button_colour_heading')}} </span>
    <div class="check-list">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="button_color" value="light" id="flexCheckDefault5" {{ (isset($brand) && $brand['data']['brand_detail']['button_color'] == 'light' ? 'checked' : '') }} {{ (!isset($brand) ? 'checked' : '') }}>
            <label class="form-check-label" for="flexCheckDefault5" >
                {{__('global.light')}}
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="button_color" value="dark" id="flexCheckDefault6" {{ (isset($brand) && $brand['data']['brand_detail']['button_color'] == 'dark' ? 'checked' : '') }} >
            <label class="form-check-label" for="flexCheckDefault6">
                {{__('global.dark')}}
            </label>
            </div>
    </div>
</div>

<div class="form-group">
    <label>{{__('cruds.brand.fields.default_language')}}</label>
    <span class="font-sm">{{__('cruds.brand.fields.default_language_heading')}}
    </span>
    <div class="select-area brand-lang">
        <select class="niceCountryInputSelector selectinit  form-control" id="from_code" name="defaul_language">
        @foreach ($languageData['data'] as $key => $value )
            <option value="{{$value['id']}}" {{ (isset($brand) && $brand['data']['brand_detail']['defaul_language'] == $value['id'] ? 'selected' : '') }}>{{$value['name']}}</option>
        @endforeach
            {{-- <option value="AFN" data-src="images/flags/AF.png">
                AF
            </option> --}}
        </select>
    </div>
</div>
@php 
$approvalMethod = config('admin.approval_method');
@endphp
<div class="form-group">
    <label>{{__('cruds.brand.fields.approval_method')}}</label>
    <span class="font-sm">
        {{__('cruds.brand.fields.approval_method_heading')}}
    </span>
    <div class="select-area brand-lang">
        <select class="niceCountryInputSelector selectinit form-control"  name="approval_method">
        @foreach ($approvalMethod as $key => $value )
            <option value="{{$key}}" {{ (isset($brand) && $brand['data']['brand_detail']['approval_method'] == $key ? 'selected' : '') }}>{{$value}}</option>
        @endforeach
           
        </select>
    </div>
    {{-- <label>Image Avatar</label>
    <span class="font-sm">Elisa Fox helps keep customer's attention and leads them through the KYC fast. Turning this off 
        removes instructional images from the module. We recommend leaving it on
    </span>
    <div class="check-list">
        <div class="form-check">
            <input class="form-check-input" type="radio" value="foxy" name="image_avatar_type" id="flexCheckDefault7" {{ (isset($brand) && $brand['data']['brand_detail']['image_avatar_type'] == 'foxy' ? 'checked' : '') }} {{ (!isset($brand) ? 'checked' : '') }}>
            <label class="form-check-label" for="flexCheckDefault7" >
                Foxy 
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" value="neutral" name="image_avatar_type" id="flexCheckDefault8"  {{ (isset($brand) && $brand['data']['brand_detail']['image_avatar_type'] == 'neutral' ? 'checked' : '') }}>
            <label class="form-check-label" for="flexCheckDefault8">
                Neutral
            </label>
            </div>
    </div> --}}
</div>

<div class="configuration_btns">
    <div class="back-btn">
        <a href="{{route('admin.brands.index')}}" class="outline-btn stepback-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
        <path d="M6.70998 9.88047L2.82998 6.00047L6.70998 2.12047C7.09998 1.73047 7.09998 1.10047 6.70998 0.710469C6.31998 0.320469 5.68998 0.320469 5.29998 0.710469L0.70998 5.30047C0.31998 5.69047 0.31998 6.32047 0.70998 6.71047L5.29998 11.3005C5.68998 11.6905 6.31998 11.6905 6.70998 11.3005C7.08998 10.9105 7.09998 10.2705 6.70998 9.88047Z" fill="#bfc0c0"></path>
        </svg>{{__('global.back')}} / {{__('global.cancel')}}</a>
    </div>
    <div class="save_btn">
        <button type="submit" class="nbtn">{{__('global.save')}} {{__('global.configuration')}}</button>
        {{-- <a href="javascript:void(0)" class="nbtn">
            Save Configuration
        </a> --}}
    </div>
</div>
