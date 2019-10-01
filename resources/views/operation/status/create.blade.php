@extends( 'master.app' )
@section( 'title', 'TIMS | Status Create' )


@section( 'content' )
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
		</li>
		<li class="breadcrumb-item"><a href="#">Statuses</a>
		</li>
		<li class="breadcrumb-item active">Status Create</li>
	</ol>
<div class="col-md-12">
	@include('master.error') {{-- @include('master.success') --}}
	<div class="card">
		<div class="card-header">
			<h2>Operation Registration</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('status.store')}}" class="form-horizontal" id="status_form">
				@csrf
				<div class="row">

					<div class="col-md-6">
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="form-control-label col-4 text-right"> <strong>Registeration Date</strong></label>
							<div class="col-sm-8">
								<input name="today" type="date" class="form-control" id="today" onfocusout="validateToday()">
							</div>
								@if ($errors->has('today'))
							<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('today') }}</strong>
									</span>
							@endif
							<span class="invalid-feedback" role="alert">

						</div>
					</div>

				</div>
				<div class="row ">
					@foreach ($trucks as $truck)
					<div class="col-lg-2 col-md-3 col-sm-4  p-2">
						<input type="text" name="plate[]" style="font-size: 15px; background-color: #796AEE; font-weight: 800; color: white"
					readonly class="form-control text-center" value="{{$truck->plate}}" id="plate_id">
						<select name="status[]" class="form-control select" id="status{{$truck->plate}}" required>
							<option value="" id="instatus" class="inclass"> --Select one-- </option>
							@foreach ($statustypes as $type)
							<option value="{{$type->id}}" id="instatus" class="inclass"> {{$type->name}}</option>
							@endforeach
						</select>
					</div>
					@endforeach
				</div>
				<div class="row">

					<div class="col-md-6">
						<button class="btn btn-block btn-lg btn-danger" type="submit" name="submit" id="submit">Register</button>
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
<script>
	let val;
	const select = document.querySelector('select' );
	const submit = document.getElementById('submit' );
	console.log(select.children[0];
	const status_form = document.getElementById( 'status_form' );
            
			status_form.addEventListener( 'submit', function ( event ) {
				event.preventDefault();
				if (
					validateToday()
				
				) {
					status_form.submit();
				} else {
					return false;
				}
			} );

			// Validator functions
			function validateToday() {
				if ( checkIfEmpty( today ) ) {
					return false;
				}
				else {
					return true;
				}
			}
	
</script>

@endsection