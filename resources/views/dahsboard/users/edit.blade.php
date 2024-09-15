@extends('layouts.master')
@section('css')
    @inject('role', 'App\Models\Role')
    <?php
    $roles = $role->pluck('display_name', 'id')->toArray();
    ?>
    <!-- Morris.js Charts Plugin -->
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">

        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بك</h2>
                <p class="mg-b-0">المشرفين</p>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <div class="">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1"> تعديل المشرف </h4>
                <h5 class="card-title mb-1"> {{ $user->name }}</h5>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('users.update', $user->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputName">اسم المشرف</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="inputName"
                        required>
                </div>

                <div class="form-group">
                    <label for="inputEmail">البريد الإلكتروني</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="inputEmail"
                        required>
                </div>

                <div class="form-group">
                    <label for="inputPassword">كلمة المرور</label>
                    <input type="password" class="form-control" name="password" id="inputPassword" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword"> تأكيد كلمة المرور </label>
                    <input type="password" class="form-control" name="password_confirmation" id="inputPassword" required>
                </div>

                <div class="form-group">
                    <label for="roles_list">رتب المستخدمين</label>
                    <select name="roles_list[]" class="form-control select2" multiple="multiple" id="roles_list">
                        @foreach ($roles as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-0 mt-3 justify-content-end">
                    <div>
                        <button type="submit" class="btn btn-primary">تحديث المشرف</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!-- Internal Piety js -->
    <script src="{{ URL::asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- Internal Chart js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
