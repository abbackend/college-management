@extends('layouts.app')

@push('styles')
<!-- fullCalendar -->
<link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
@endpush

@push('content-header')
<section class="content-header">
  <h1>
    {{ __('Dashboard') }}
    <small>{{ __('Control panel') }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ __('Home') }}</a></li>
    <li class="active">{{ __('Dashboard') }}</li>
  </ol>
</section>
@endpush

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $results }}</h3>
                <p>{{ __('Results') }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="{{ route('student.results.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection
