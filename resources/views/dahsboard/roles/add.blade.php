@inject('perm', 'App\Models\Permission')
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
                <p class="mg-b-0">الرتب</p>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection

@section('content')
    <div class="">
        <div class="card box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">أضف رتبة</h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body pt-0">
                <form action="{{ route('roles.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="inputName">اسم الرتبة</label>
                        <input type="text" class="form-control" name="name" id="inputName"
                            placeholder="ادخل اسم الرتبة" required>
                    </div>
                    <div class="form-group">
                        <label for="inputDisplayName">الاسم المعروض</label>
                        <input type="text" class="form-control" name="display_name" id="inputDisplayName"
                            placeholder="ادخل الاسم المعروض" required>
                    </div>
                    <div class="form-group">
                        <label for="permissions">الصلاحيات</label><br>
                        <input id="select-all" type="checkbox" onclick="toggleCheckboxes(this)">
                        <label for="select-all">اختيار الكل</label>
                        <br>
                        <div class="row">
                            @foreach ($permissions as $permission)
                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="permissions_list[]" value="{{ $permission->id }}"
                                                {{ old('permissions_list') && in_array($permission->id, old('permissions_list')) ? 'checked' : '' }}>
                                            {{ $permission->display_name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <div>
                            <button type="submit" class="btn btn-primary">إضافة الرتبة</button>
                        </div>
                    </div>
                </form>
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

    <script>
        function toggleCheckboxes(source) {
            const checkboxes = document.querySelectorAll('input[name="permissions_list[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = source.checked;
            });
        }
    </script>
@endsection
