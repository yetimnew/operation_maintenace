@extends( 'master.app' )
@section( 'title', 'TIMS | Operation' )

@section('content')

<div class="col-lg-12 bg-white">
    <div class="card">
        <div class="card-header text-center"><strong> Edit Your Profile</strong>
        </div>

        <div class="col-6">
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group required">
                        <label class="control-label">Full Name</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name" value="{{ old('name') ?? $user->name }}" required autofocus>
                        @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="form-group required">
                        <label for="email"
                            class="control-label col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') ?? $user->email  }}" required>
                        @if($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group required">
                        <label for="password"
                            class="control-label  col-form-label text-md-right">{{ __('Password') }}</label>

                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            value="{{ old('password') }}" valuerequired>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group required">
                        <label for="password-confirm"
                            class="control-label  col-form-label text-md-right">{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>

                    <div class="form-group required">
                        <label for="image" class="control-label  col-form-label text-md-right">Upload Image</label>

                        <input id="image" type="file"
                            class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" required>
                        @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>

                        </div>
                    </div>
            </div>
        </div>
        </form>


    </div>



    @endsection