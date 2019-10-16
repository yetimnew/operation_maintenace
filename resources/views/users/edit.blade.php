@extends( 'master.app' )
@section( 'title', 'TIMS | Customer Edit' )

@section( 'content' )
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer Edit</li>
</ol>

<div class="col-md-12">
	@include('master.error')
	{{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Customer Update</h2>
		</div>
		{{-- {{dd($user)}} --}}
		<div class="card-body">
			<form method="post" action="{{route('user.update',['id'=>$user->id])}}" class="form-horizontal"
				id="user_reg">
				@csrf
				<div class="form-group required">
					<label class="control-label">Full Name</label>
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
						name="name" value="{{ old('name') ?? $user->name}}" required>
					@if($errors->has('name'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group required">
					<label for="email"
						class="control-label col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
						name="email" value="{{ old('email') ?? $user->email }}" required>
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
						required> @if ($errors->has('password'))
					<span class=" invalid-feedback" role="alert">
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

				<div class="form-group required pull-right">
					<button type="submit" class="btn btn-primary" name="save">Save</button>


				</div>
		</div>
	</div>
</div>
<div class="card-footer">
	the footer
</div>

</form>
</div>
</div>

@endsection
@section( 'javascript' )


@endsection