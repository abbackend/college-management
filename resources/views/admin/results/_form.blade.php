<form method="POST" action="{{ route('results.store') }}">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ __('Student Name') }}</label>
                <input type="text" class="form-control" value="{{ $user->name }}" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ __('Course') }}</label>
                <input type="text" class="form-control" value="{{ $user->details->course->name }}" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{{ __('Semester/Year') }}</label>
                <input type="text" class="form-control" value="{{ $user->details->course_duration }}" readonly>
            </div>
        </div>
    </div>
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
                    </tr>
                    <tr>
                        <th>Max</th>
                        <th>Obt</th>
                        <th>Max</th>
                        <th>Obt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->details->course->subjects as $key => $subject)
                    <tr>
                        <input type="hidden" name="marks[{{ $key }}][subject]" value="{{ $subject->subject->id }}" />
                        <td>{{ $key + 1 }}</td>
                        <td>[{{ $subject->subject->code }}] {{ $subject->subject->name }}</td>
                        <td>{{ $subject->subject->theory_marks }}</td>
                        <td>
                            <div class="form-group @error('marks.'.$key.'.theory_marks') has-error @enderror">
                                <input name="marks[{{ $key }}][theory_marks]" type="number" value="0" class="form-control">
                                @error('marks.'.$key.'.theory_marks')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                        <td>{{ $subject->subject->practical_marks }}</td>
                        <td>
                            <div class="form-group @error('marks.'.$key.'.practical_marks') has-error @enderror">
                                <input name="marks[{{ $key }}][practical_marks]" type="number" value="0" class="form-control">
                                @error('marks.'.$key.'.practical_marks')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</form>