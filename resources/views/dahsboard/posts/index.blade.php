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
                <p class="mg-b-0">المقالات</p>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    @if (session('success'))
        <div class="allert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">جميع المقالات</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>

                </div>
                <p class="tx-12 tx-gray-500 mb-2">افعل ما شئت بهم<a href=""></a></p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>المقال</th>
                                <th>الصورة</th>
                                <th>المحتوى</th>
                                <th>الفئة</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr id="removable{{ $post->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        @if ($post->image)
                                            <img src="{{ asset('/img/posts/' . $post->image) }}" alt="صورة المقال"
                                                style="width: 50px; height: 50px;">
                                        @else
                                            لا توجد صورة
                                        @endif
                                    </td>
                                    <td>{{ \Str::limit($post->content, 50) }}</td>
                                    <td>{{ $post->category->name ?? 'غير محدد' }}</td>
                                    @permission('posts.edit')
                                        <td class="text-center">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    @endpermission
                                    @permission('posts.delete')
                                        <td class="text-center">
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                class="form-horizontal">
                                                @csrf
                                                @method('delete')
                                                <div>
                                                    <button type="submit" class="destroy btn btn-danger">حذف</button>
                                                </div>
                                            </form>
                                        </td>
                                    @endpermission
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                @permission('posts.create')
                    <a href="{{ route('posts.create') }}" class="btn btn-dark">
                        <i class="fa fa-edit"> اضافه مقاله</i>
                    </a>
                @endpermission
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
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.posts.js') }}"></script>
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
