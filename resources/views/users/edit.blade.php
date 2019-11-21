@extends( 'master.app' )
@section( 'title', 'TIMS | Customer Edit' )

@section( 'content' )
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">User Edit</li>
</ol>

<div class="col-md-12">
	@include('master.error')
	{{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>User Update</h2>
		</div>
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
				<div class='form-group'>
					<label for="permissions"> Select Role</label>
					@foreach ($roles as $role)
					<div class="form-check ">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="role[]" id="role"
								value="{{$role->id}}" @foreach ($user->roles as $r)
							@if($role->id == $r->id)
							checked
							@endif
							@endforeach
							> {{$role->name}}
						</label>
					</div>
					@endforeach
				</div>



				<div class='form-group'>
					<label for="permissions"> Select Permissions</label>
					@foreach ($permissions as $permission)
					<div class="form-check ">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="permission[]" id="permissions"
								value="{{$permission->id}}" @foreach ($user->permissions as $r)
							@if($permission->id == $r->id)
							checked
							@endif
							@endforeach

							> {{$permission->name}}
						</label>
					</div>
					@endforeach
				</div>


				<div class="form-group required pull-right">
					<button type="submit" class="btn btn-primary" name="save">Save</button>


				</div>
		</div>

		</form>
		<div class="card-footer">
			the footer
		</div>
	</div>
</div>



@endsection
@section( 'javascript' )


@endsection