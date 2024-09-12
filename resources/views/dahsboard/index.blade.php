@extends('layouts.master')

@section('css')
    <!-- Morris.js Charts Plugin -->
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet" />
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بك</h2>
                <p class="mg-b-0">إحصائيات النظام</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm mb-3">
                <a href="{{ route('cities.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">عدد المدن</h5>
                        <h3 class="text-info">{{ $citiesCount }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm mb-3">
                <a href="{{ route('governorates.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">عدد المحافظات</h5>
                        <h3 class="text-primary">{{ $governoratesCount }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm mb-3">
                <a href="{{ route('categories.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">عدد الأقسام</h5>
                        <h3 class="text-warning">{{ $categoriesCount }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm mb-3">
                <a href="{{ route('posts.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">عدد المقالات</h5>
                        <h3 class="text-success">{{ $postsCount }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm mb-3">
                <a href="{{ route('settings.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">الإعدادات</h5>
                        <h3 class="text-secondary">{{ $settingCount }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm mb-3">
                <a href="{{ route('contacts.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">الرسائل الواردة</h5>
                        <h3 class="text-danger">{{ $contactsCount }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm mb-3">
                <a href="{{ route('donations.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">طلبات التبرع</h5>
                        <h3 class="text-danger">{{ $donationsCount }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm mb-3">
                <a href="{{ route('clients.index') }}" class="text-decoration-none">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted">العملاء</h5>
                        <h3 class="text-success">{{ $clientsCount }}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Chart.js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
@endsection
