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
                <p class="mg-b-0">تعديل الإعدادات</p>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-12 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-1">تعديل الإعدادات</h4>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('settings.update', 1) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="notificationSettingText" class="form-label">نص إشعارات التطبيق</label>
                            <textarea class="form-control" name="notification_setting_text" id="notificationSettingText" rows="3">{{ old('notification_setting_text', $settings->notification_setting_text) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="aboutApp" class="form-label">حول التطبيق</label>
                            <textarea class="form-control" name="about_app" id="aboutApp" rows="3">{{ old('about_app', $settings->about_app) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                value="{{ old('phone', $settings->phone) }}">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email', $settings->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="fbLink" class="form-label">رابط فيسبوك</label>
                            <input type="text" class="form-control" name="fb_link" id="fbLink"
                                value="{{ old('fb_link', $settings->fb_link) }}">
                        </div>

                        <div class="form-group">
                            <label for="twLink" class="form-label">رابط تويتر</label>
                            <input type="text" class="form-control" name="tw_link" id="twLink"
                                value="{{ old('tw_link', $settings->tw_link) }}">
                        </div>

                        <div class="form-group">
                            <label for="waLink" class="form-label">رابط واتساب</label>
                            <input type="text" class="form-control" name="wa_link" id="waLink"
                                value="{{ old('wa_link', $settings->wa_link) }}">
                        </div>

                        <div class="form-group">
                            <label for="instaLink" class="form-label">رابط إنستغرام</label>
                            <input type="text" class="form-control" name="insta_link" id="instaLink"
                                value="{{ old('insta_link', $settings->insta_link) }}">
                        </div>

                        <div class="form-group mb-0 mt-3 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> حفظ التعديلات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
