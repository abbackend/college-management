<form method="POST" action="{{ $session ? route('sessions.update', $session) : route('sessions.store') }}">
    @if ($session)
        @method('PUT')
    @endif
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('start') has-error @enderror">
                <label for="start">{{ __('Start') }}</label>
                <input type="date" name="start" class="form-control" value="{{ $session ? $session->start->format('Y-m-d') : old('start') }}" required autofocus>
                @error('start')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('end') has-error @enderror">
                <label for="end">{{ __('End') }}</label>
                <input type="date" name="end" class="form-control" value="{{ $session ? $session->end->format('Y-m-d') : old('end') }}" required autofocus>
                @error('end')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $session ? __('Update') : __('Submit') }}</button>
    </div>
</form>
