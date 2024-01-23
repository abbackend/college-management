@extends('layouts.app')

@push('content-header')
<section class="content-header">
  <h1>
    {{ __('Students') }}
    <small>{{ __('Control panel') }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }}</a></li>
    <li><a href="{{ route('users.index') }}"><i class="fa fa-clock-o"></i>{{ __('Students') }}</a></li>
    <li class="active">{{ __('View') }}</li>
  </ol>
</section>
@endpush

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-body box-profile">
        @if($user->details->profile_image)
          <img class="profile-user-img img-responsive img-circle" src="{{ route('display.image',$user->details->profile_image) }}" alt="User profile picture">
        @else
          <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/avatar6.png') }}" alt="User profile picture">
        @endif
        <h3 class="profile-username text-center">{{ $user->name }}</h3>
        <p class="text-muted text-center">{{ $user->email }}</p>
        <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-primary btn-block"><b>Update Details</b></a>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">About Me</h3>
      </div>
      <div class="box-body">
        <strong><i class="fa fa-file-text-o margin-r-5"></i> Personal details</strong>
        <div class="row text-muted">
          <div class="col-md-6">
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Father's name:</b><span class="pull-right">{{ ucfirst($user->details->father_name) }}</span>
              </li>
              <li class="list-group-item">
                <b>Mother's name:</b><span class="pull-right">{{ ucfirst($user->details->mother_name) }}</span>
              </li>
              <li class="list-group-item">
                <b>Gender:</b><span class="pull-right">{{ $user->details->gender->name }}</span>
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Date of birth:</b><span class="pull-right">{{ $user->details->date_of_birth->format('d F, Y') }} ({{ $user->age }} year's old)</span>
              </li>  
              <li class="list-group-item">
                <b>Enrollment number:</b><span class="pull-right">{{ $user->details->enroll_number }}</span>
              </li>
              <li class="list-group-item">
                <b>Category:</b><span class="pull-right">{{ $user->details->category->name }}</span>
              </li>
            </ul>
          </div>
        </div>
        <hr>
        <strong><i class="fa fa-map-marker margin-r-5"></i> Contact details</strong>
        <div class="row text-muted">
          <div class="col-md-12">
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Email:</b><span class="pull-right">{{ $user->email }}</span>
              </li>
              <li class="list-group-item">
                <b>Phone number:</b><span class="pull-right">{{ $user->details->contact_number }}</span>
              </li>
              <li class="list-group-item">
                <b>Address:</b><span class="pull-right">{{ $user->details->address }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')

@endpush