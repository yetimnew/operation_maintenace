@extends( 'master.app' )
@section( 'title', 'TIMS | Customer Create' )

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

				<div class="form-group required pb-0 ">
					<label class="control-label">Permission Type</label>
					<select class="custom-select" id="permission" name="permission[]" multiple
						class="form-control {{ $errors->has('permission') ? ' is-invalid' : '' }}"
						onfocusout="validateVehecle()">
						{{-- <option class="dropup" value=""> Select One</option> --}}
						@foreach ($permissisons as $pr)
						<option class="dropup" value="{{$pr->id}}">
							{{$pr->name}}
						</option>
						@endforeach

					</select>




					<div class="form-group required pull-right">
						<button type="submit" class="btn btn-primary" name="save">Save</button>
					</div>

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

	</script>
	@endsection