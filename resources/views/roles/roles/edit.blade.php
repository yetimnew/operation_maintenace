@extends( 'master.app' )
@section( 'title', 'TIMS | Role Edit' )

@section( 'content' )
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer Create</li>
</ol>
<div class='col-lg-4 col-lg-offset-4'>

	<h1><i class='fa fa-key'></i> Edit Role</h1>
	<hr>
	<div class="row">
		{{-- {{dd($rolePermissions)}} --}}
		<div class="col-md-12">
			<form method="post" action="{{route('role.update',['id'=>$role->id])}}" id="truck_reg_form" novalidate>
				@csrf
				<div class="form-group required">
					<label for="name">Role Name</label>
					<input name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
						id="name" value="{{ old('name') ?? $role->name}}" onfocusout="validateName()">
					@if ($errors->has('name'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
					<span class="invalid-feedback" role="alert"></span>
				</div>

				<div class='form-group'>
					<label for="permissions"> Select Permissions</label>
					@foreach ($permissions as $permission)
					<div class="form-check ">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="permission[]" id="permissions"
								value="{{$permission->id}}" @foreach ($role->permissions as $r)
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
				<div class="card-footer">
					the footer
				</div>

			</form>


		</div>
	</div>

	@endsection
	@section( 'javascript' )
	<script>

	</script>
	@endsection