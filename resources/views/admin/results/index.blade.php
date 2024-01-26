@extends('layouts.app')

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('content-header')
<section class="content-header">
    <h1>
        {{ __('Results') }}
        <small>{{ __('Control panel') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }}</a></li>
        <li class="active">{{ __('Results') }}</li>
    </ol>
</section>
@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ __('Results List') }}</h3>
                @if(Auth::user()->type->value == 'admin')
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-add">Add</button>
                <div class="modal fade" id="modal-add">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Result</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="user_id">{{ __('Student') }}</label>
                                    <select name="user_id" class="form-control select2">
                                        <option value="">
                                            {{ __('Select a student') }}
                                        </option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">
                                                {{ $student->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Student') }}</th>
                                <th>{{ __('Course') }}</th>
                                <th>{{ __('Semester/Year') }}</th>
                                <th>{{ __('Status') }}</th>
                                @if(Auth::user()->type->value == 'admin')
                                <th>{{ __('Published') }}</th>
                                @endif
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $key => $result)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $result->user->name }}</td>
                                <td>{{ $result->course_name }}</td>
                                <td>{{ $result->course_duration }}</td>
                                <td>{{ $result->status->name }}</td>
                                @if(Auth::user()->type->value == 'admin')
                                <td>{{ $result->is_published ? 'Yes' : 'No' }}</td>
                                @endif
                                <td>{{ $result->created_at->format('d F, Y, h:i A') }}</td>
                                <td>
                                    @if(Auth::user()->type->value == 'admin')
                                    <a href="{{ route('results.show', $result) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if (!$result->is_published)
                                    <a href="{{ route('results.publish', $result) }}" class="btn btn-primary">
                                        <i class="fa fa-rocket"></i>
                                    </a>
                                    @endif
                                    <a href="#" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                        <form action="{{ route('results.destroy', $result) }}" method="POST" class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </a>
                                    @else
                                    <a href="{{ route('student.results.view', $result) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @endif
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
    $(function() {
        $('#results_table').DataTable();
        $('a.btn-danger').click(function(event) {
            event.preventDefault();
            if (confirm('Are you sure?')) {
                $(this).find('form').submit();
            }
        });

        $('.modal-footer .btn-primary').click(function () {
            let userId = $('select[name="user_id"]').val();
            if (!userId || userId == '') {
                $('#modal-add').modal('toggle');
                return;
            }
            
            var url = '{{ route("results.generate", ":id") }}';
            url = url.replace(':id', userId);
            window.location.replace(url);
        });
    })
</script>
@endpush