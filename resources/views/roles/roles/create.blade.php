@extends( 'master.app' )
@section( 'title', 'TIMS | Role Create' )

@section( 'content' )
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer Create</li>
</ol>
<div class='col-lg-4 col-lg-offset-4'>

	<h1><i class='fa fa-key'></i> Add Role</h1>
	<hr>
	<div class="row">
		{{-- {{dd($permissisons)}} --}}
		<div class="col-md-12">
			<form method="post" action="{{route('role.store')}}" id="truck_reg_form" novalidate>
				@csrf
				<div class="form-group required">
					<label for="name">Role Name</label>
					<input name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
						id="name" value="{{ old('name') }}" onfocusout="validateName()">
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
							<input class="form-check-input" type="checkbox" name="permissions[]" id="permissions"
								value="{{$permission->id}}"> {{$permission->name}}
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
			</form>


		</div>
	</div>

	@endsection
	@section( 'javascript' )
	<script>
		$(function () {
		  $('#example1').datetimepicker();
		});
		</script
	@endsection