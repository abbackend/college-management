@extends('layouts.app')

@push('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('content-header')
<section class="content-header">
  <h1>
    {{ __('Courses') }}
    <small>{{ __('Control panel') }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }}</a></li>
    <li><a href="{{ route('courses.index') }}"><i class="fa fa-users"></i>{{ __('Courses') }}</a></li>
    <li class="active">{{ __('Add') }}</li>
  </ol>
</section>
@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ __('Add Course') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.courses._form', ['course' => null])
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@push('scripts')
<!-- InputMask -->
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script>
    $(function () {
      //Money Euro
      $('[data-mask]').inputmask()
      $('.select2').select2()
    });
</script>
@endpush
