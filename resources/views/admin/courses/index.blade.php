@extends('layouts.app')

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('content-header')
<section class="content-header">
  <h1>
    {{ __('Courses') }}
    <small>{{ __('Control panel') }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }}</a></li>
    <li class="active">{{ __('Courses') }}</li>
  </ol>
</section>
@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ __('Courses List') }}</h3>
                <a href="{{ route('courses.create') }}" class="btn btn-primary pull-right">Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="courses_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Code') }}</th>
                                <th>{{ __('Duration') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $key => $course)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->code }}</td>
                                <td>{{ $course->duration }} {{ $course->duration_type->value }}</td>
                                <td>{{ $course->created_at->format('d F, Y, h:i A') }}</td>
                                <td>
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                        <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
  $(function () {
    $('#courses_table').DataTable();

    $('a.btn-danger').click(function (event) {
        event.preventDefault();
        if (confirm('Are you sure?')) {
            $(this).find('form').submit();
        }
    });
  })
</script>
@endpush
