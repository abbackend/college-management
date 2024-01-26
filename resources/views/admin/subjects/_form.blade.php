<form method="POST" action="{{ $subject ? route('subjects.update', $subject) : route('subjects.store') }}">
    @if ($subject)
        @method('PUT')
    @endif
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ $subject ? $subject->name : old('name') }}" required autofocus>
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
                <input type="text" name="code" class="form-control" value="{{ $subject ? $subject->code : old('code') }}" required>
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
            <div class="form-group @error('theory_marks') has-error @enderror">
                <label for="theory_marks">{{ __('Theory marks') }}</label>
                <input type="number" name="theory_marks" class="form-control" value="{{ $subject ? $subject->theory_marks : old('theory_marks') }}" required>
                @error('theory_marks')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('practical_marks') has-error @enderror">
                <label for="practical_marks">{{ __('Practical marks') }}</label>
                <input type="number" name="practical_marks" class="form-control" value="{{ $subject ? $subject->practical_marks : old('practical_marks') }}" required>
                @error('practical_marks')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('type') has-error @enderror">
                <label for="type">{{ __('Type') }}</label>
                <select name="type" class="form-control select2">
                    @foreach ($types as $type)
                        <option value="{{ $type->value }}" @if($subject ? $subject->type->value == $type->value : old('type') == $type->value) selected @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $subject ? __('Update') : __('Submit') }}</button>
    </div>
</form>
