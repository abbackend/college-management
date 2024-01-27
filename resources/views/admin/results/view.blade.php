@extends('layouts.app')

@push('content-header')
<section class="content-header">
  <h1>
    {{ __('Results') }}
    <small>{{ __('Control panel') }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }}</a></li>
    <li><a href="{{ route('results.index') }}"><i class="fa fa-file"></i>{{ __('Results') }}</a></li>
    <li class="active">{{ __('View') }}</li>
  </ol>
</section>
@endpush

@section('content')
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> {{ config('app.college.name') }}
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-bordered">
        <tr>
          <td>{{ __('COURSE NAME :') }}</td>
          <td>{{ $result->course_name }} ({{$result->student_status->name}})</td>
        </tr>
        <tr>
          <td>{{ __('SEMESTER/YEAR :') }}</td>
          <td>{{ $result->course_duration }}</td>
        </tr>
        <tr>
          <td>{{ __('ROLL NO :') }}</td>
          <td>{{ $result->user->details->roll_number }}</td>
        </tr>
        <tr>
          <td>{{ __('STUDENT NAME :') }}</td>
          <td>{{ $result->user->name }}</td>
        </tr>
        <tr>
          <td>{{ __('FATHER NAME :') }}</td>
          <td>{{ $result->user->details->father_name }}</td>
        </tr>
      </table>
    </div>
  </div>
  <!-- /.row -->
  <p class="text-muted well well-sm no-shadow text-center" style="margin-top: 10px;">
    !!! NOTE : This Information should not be treated as Marksheet !!!
  </p>
  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th rowspan="2" style="vertical-align: middle;">SNo.</th>
            <th rowspan="2" style="vertical-align: middle;">Subject Code & Name</th>
            <th colspan="2" style="text-align: center;">Theory</th>
            <th colspan="2" style="text-align: center;">Practical</th>
            <th rowspan="2" style="vertical-align: middle;">Total</th>
          </tr>
          <tr>
            <th>Max</th>
            <th>Obt</th>
            <th>Max</th>
            <th>Obt</th>
          </tr>
        </thead>
        <tbody>
          @foreach($result->marks as $key => $mark)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>[{{ $mark->subject_code }}] {{ $mark->subject_name }}</td>
            <td>{{ $mark->theory_max_marks }}</td>
            <td>{{ $mark->theory_marks }}</td>
            <td>{{ $mark->practical_max_marks }}</td>
            <td>{{ $mark->practical_marks }}</td>
            <td>{{ $mark->total }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-bordered">
        <tr>
          <td>{{ __('MARKS OBTAINED :') }}</td>
          <td>{{ $result->obt_marks }}</td>
        </tr>
        <tr>
          <td>{{ __('MAXIMUM MARKS :') }}</td>
          <td>{{ $result->max_marks }}</td>
        </tr>
        <tr>
          <td>{{ __('RESULT :') }}</td>
          <td>{{ $result->status->name }}</td>
        </tr>
        <tr>
          <td>{{ __('PERCENTAGE :') }}</td>
          <td>{{ $result->percentage }}%</td>
        </tr>
      </table>
    </div>
  </div>
  <!-- /.row -->
  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
    NOTE: {{ config('app.college.university.name') }}, {{ config('app.college.university.location') }} is not responsible for any inadvertent error that may have crept in the results being published on NET are for immediate information to the examinees. These cannot be treated as original marks sheets. Original marks are being issued by the University separately.
  </p>
  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <button type="button" class="btn btn-primary pull-right" onclick="window.print();">
        <i class="fa fa-print"></i> Print
      </button>
    </div>
  </div>
</section>
@endsection

@push('scripts')

@endpush