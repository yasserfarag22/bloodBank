@extends('layouts.master')

@section('css')
    <!-- Morris.js Charts Plugin -->
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet" />
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بك</h2>
                <p class="mg-b-0">الإعدادات</p>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection

@section('content')
    <div class="row">
        @foreach ($settings as $setting)
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-muted">الإعدادات</h5>

                        <p><strong>نص الإشعار:</strong> {{ $setting->notification_setting_text }}</p>
                        <p><strong>حول التطبيق:</strong> {{ $setting->about_app }}</p>
                        <p><strong>رقم الهاتف:</strong> {{ $setting->phone }}</p>
                        <p><strong>البريد الإلكتروني:</strong> {{ $setting->email }}</p>

                        <p>
                            <strong>روابط التواصل الاجتماعي:</strong>
                            <br>
                            <a href="{{ $setting->fb_link }}" class="text-primary" target="_blank">فيسبوك</a> |
                            <a href="{{ $setting->tw_link }}" class="text-info" target="_blank">تويتر</a> |
                            <a href="{{ $setting->wa_link }}" class="text-success" target="_blank">واتساب</a> |
                            <a href="{{ $setting->insta_link }}" class="text-danger" target="_blank">انستجرام</a>
                        </p>
                        @permission('settings-edit')
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-success">
                                    <i class="fa fa-edit"></i> تعديل
                                </a>

                            </div>
                        @endpermission
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!-- Internal Piety js -->
    <script src="{{ URL::asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <!-- Internal Flot js -->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!-- Internal Apexchart js -->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- Internal Chart js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Internal index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
