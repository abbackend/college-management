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
    {{ __('You are logged in!') }}
</div>
@endsection
