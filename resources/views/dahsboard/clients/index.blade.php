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
                <p class="mg-b-0">العملاء</p>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">جميع الاعملاء</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم العميل</th>
                                <th>رقم الهاتف</th>
                                <th>المدينة</th>
                                <th>الربريد الالكنروني</th>
                                <th>فصيله الدم</th>
                                <th>تاريخ الميلاد</th>
                                <th>اخر تبرع</th>
                                <th>الحاله</th>

                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr id="removable{{ $client->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->city->name }}</td>

                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->bloodType->name }}</td>
                                    <td>{{ $client->date_of_birth }}</td>
                                    <td>{{ $client->last_donation_date }}</td>
                                    @permission('clients-edit')
                                        <td class="text-center">
                                            <a href="{{ route('client.toggleStatus', $client->id) }}"
                                                class="btn btn-{{ $client->is_active == 1 ? 'success' : 'danger' }}">
                                                {{ $client->is_active == 1 ? 'الغاء التفعيل' : 'تفعيل' }}
                                            </a>
                                        </td>
                                    @endpermission
                                    @permission('clients-delete')
                                        <td class="text-center">
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                                class="form-horizontal">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs">حذف</button>
                                            </form>
                                        </td>
                                    @endpermission
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
