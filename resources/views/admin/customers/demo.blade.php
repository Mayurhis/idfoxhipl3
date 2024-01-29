@extends('layouts.admin')
@section('content')

    <div class="main-title add_brand_wrapper">
        <div class="dash-title">
            <h2>file Upload demo</h2>
        </div>
        <div class="add_brand">
        <a href="{{route('admin.customers.index')}}" class="nbtn gap-2">{{__('global.back')}} </a>
        </div>
    </div>
    <div class="user-detail-area">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-lg-12">
                <div class="user_profile">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.customers.storeImage')}}">
                    @csrf
                    <input type="file" name="demoFile" name="demoFile">
                    <br/><br/>
                    <input type="submit" value="submit">
                    <br/><br/>
                    <a href="{{ route('admin.customers.copyFile')}}"><input type="button" value="copy file"></a>
                </form>
                </div>
            </div>
           
            
        </div>

    </div>
@endsection