<form method="POST" enctype="multipart/form-data" action="{{ $user ? route('users.update', $user) : route('users.store') }}">
    @if ($user)
        @method('PUT')
    @endif
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('first_name') has-error @enderror">
                <label for="first_name">{{ __('First name') }}</label>
                <input type="text" name="first_name" class="form-control" value="{{ $user ? $user->details->first_name : old('first_name') }}" required autofocus>
                @error('first_name')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('last_name') has-error @enderror">
                <label for="last_name">{{ __('Last name') }}</label>
                <input type="text" name="last_name" class="form-control" value="{{ $user ? $user->details->last_name : old('last_name') }}" required>
                @error('last_name')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('email') has-error @enderror">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control" value="{{ $user ? $user->email : old('email') }}" required>
                @error('email')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('password') has-error @enderror">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                @error('password')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('father_name') has-error @enderror">
                <label for="father_name">{{ __("Father's name") }}</label>
                <input type="text" name="father_name" class="form-control" value="{{ $user ? $user->details->father_name : old('father_name') }}" required>
                @error('father_name')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('mother_name') has-error @enderror">
                <label for="mother_name">{{ __("Mother's name") }}</label>
                <input type="text" name="mother_name" class="form-control" value="{{ $user ? $user->details->mother_name : old('mother_name') }}" required>
                @error('mother_name')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('gender') has-error @enderror">
                <label for="gender">{{ __('Gender') }}</label>
                <select name="gender" class="form-control select2">
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->value }}" @if($user ? $user->details->gender == $gender->value : old('gender') == $gender->value) selected @endif>
                            {{ $gender->name }}
                        </option>
                    @endforeach
                </select>
                @error('gender')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('date_of_birth') has-error @enderror">
                <label for="date_of_birth">{{ __('Date of birth') }}</label>
                <input type="date" name="date_of_birth" class="form-control" value="{{ $user ? $user->details->date_of_birth->format('Y-m-d') : old('date_of_birth') }}" required>
                @error('date_of_birth')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('enroll_number') has-error @enderror">
                <label for="enroll_number">{{ __('Enrollment number') }}</label>
                <input type="text" name="enroll_number" class="form-control" value="{{ $user ? $user->details->enroll_number : old('enroll_number') }}" required>
                @error('enroll_number')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('category') has-error @enderror">
                <label for="category">{{ __('Category') }}</label>
                <select name="category" class="form-control select2">
                    @foreach ($categories as $category)
                        <option value="{{ $category->value }}" @if($user ? $user->details->category == $category->value : old('category') == $category->value) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('contact_number') has-error @enderror">
                <label for="contact_number">{{ __('Contact number') }}</label>
                <input type="number" name="contact_number" class="form-control" value="{{ $user ? $user->details->contact_number : old('contact_number') }}" required>
                @error('contact_number')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('profile_image') has-error @enderror">
                <label for="profile_image">{{ __('Profile image') }}</label>
                <input type="file" name="profile_image" class="form-control" value="{{ $user ? $user->details->profile_image : old('profile_image') }}">
                @error('profile_image')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group @error('address') has-error @enderror">
                <label for="address">{{ __('Address') }}</label>
                <textarea name="address" class="form-control">{{ $user ? $user->details->address : old('address') }}</textarea>
                @error('address')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $user ? __('Update') : __('Submit') }}</button>
    </div>
</form>
