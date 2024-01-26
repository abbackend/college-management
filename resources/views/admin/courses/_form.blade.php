<form method="POST" action="{{ $course ? route('courses.update', $course) : route('courses.store') }}">
    @if ($course)
        @method('PUT')
    @endif
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ $course ? $course->name : old('name') }}" required autofocus>
                @error('name')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('code') has-error @enderror">
                <label for="code">{{ __('Code') }}</label>
                <input type="text" name="code" class="form-control" value="{{ $course ? $course->code : old('code') }}" required>
                @error('code')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('duration') has-error @enderror">
                <label for="duration">{{ __('Duration') }}</label>
                <input type="number" name="duration" class="form-control" value="{{ $course ? $course->duration : old('duration') }}" required>
                @error('duration')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('duration_type') has-error @enderror">
                <label for="duration_type">{{ __('Duration type') }}</label>
                <select name="duration_type" class="form-control select2">
                    @foreach ($types as $type)
                        <option value="{{ $type->value }}" @if($course ? $course->duration_type->value == $type->value : old('duration_type') == $type->value) selected @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('duration_type')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('subjects') has-error @enderror">
                <label for="subjects">{{ __('Subjects') }}</label>
                <select class="form-control select2" name="subjects[]" multiple="multiple" data-placeholder="Select subjects">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" @if($course && in_array($subject->id, $course->subjects()->pluck('subject_id')->toArray())) selected @endif>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
                @error('subjects')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $course ? __('Update') : __('Submit') }}</button>
    </div>
</form>
