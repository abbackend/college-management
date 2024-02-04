@extends('layouts.app')

@push('styles')
<style>
  .preview-img {
    height: 140px;
    border: 1px solid #a89cb5;
    border-radius: 10px;
    padding: 10px;
    text-align: center;
  }

  .preview-img>img {
    height: 100%;
    width: auto;
  }
</style>
@endpush

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
<div class="box box-primary">
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Enrollment Number</th>
              <td>{{ $user->details->enroll_number }}</td>
            </tr>
            <tr>
              <th>Father Name</th>
              <td>{{ $user->details->father_name }}</td>
            </tr>
            <tr>
              <th>Date of Birth</th>
              <td>{{ $user->details->date_of_birth->format('d F, Y') }}</td>
            </tr>
            <tr>
              <th>Mobile</th>
              <td>{{ $user->details->contact_number }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Candidate Name</th>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <th>Mother Name</th>
              <td>{{ $user->details->mother_name }}</td>
            </tr>
            <tr>
              <th>Gender</th>
              <td>{{ $user->details->gender->name }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{ $user->email }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <table class="table table-striped">
      <tr>
        <td>Photo & Signatue</td>
      </tr>
      <tr>
        <td>
          <div class="row">
            <div class="col-md-6">
              <label>Photo: *</label>
              <div class="preview-img">
                @if($user->details->profile_image)
                <img class="img-responsive" src="{{ route('display.image',$user->details->profile_image) }}" alt="User profile picture">
                @else
                <img class="img-responsive" src="{{ asset('dist/img/avatar6.png') }}" alt="Profile picture">
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <label>Signature: *</label>
              <div class="preview-img">
                @if($user->details->signature_image)
                <img class="img-responsive" src="{{ route('display.image',$user->details->signature_image) }}" alt="Signature">
                @endif
              </div>
            </div>
          </div>
        </td>
      </tr>
    </table>
    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-primary btn-block"><b>Update Details</b></a>
  </div>
</div>
@endsection

@push('scripts')

@endpush