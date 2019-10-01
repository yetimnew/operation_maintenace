@extends( 'master.app' )
@section( 'title', 'TIMS |Driver Truck' )

@section( 'content' )
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
		</li>
		<li class="breadcrumb-item active">Driver And Truck </li>
	</ol>
<div class="col-md-12">
	@include('master.error') {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Truck And Driver Registration</h2>
		</div>
		{{-- {{dd($trucks)}} --}}
		<div class="card-body">
			<form method="post" action="{{route('drivertruck.store')}}" class="form-horizontal" id="truck_form">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group required">
							<label class="control-label">Plate Number</label>

							<select name="plate" class="form-control select" id="plate" required>
								<option class="dropup" value=""> Select One</option>
								@foreach ($trucks as $truck)
								<option class="dropup" value="{{$truck->plate}}"> {{$truck->plate}} </option>

								@endforeach

							</select>
							<small class="form-text text-danger" id="error_region"></small>
						</div>
						<div class="form-group required">

							<label class="control-label">Driver Name</label>

							<select name="dname" class="form-control select" id="dname" required>
								<option class="dropup" value=""> Select One</option>
								@foreach ($drivers as $driver) {{-- {{ dd($driver->name)}} --}}
								<option class="dropup" value="{{$driver->driverID}}"> {{$driver->name}} </option>
								@endforeach

							</select>
							<small class="form-text text-danger" id="error_region"></small>
						</div>


						<div class="form-group required">
							<label class="control-label">Recived Date</label>

							<div class="input-group"> <span class="input-group-addon"></span>
								<input name="rdate" type="date" required class="form-control" id="rdate">
							</div>
							<small class="form-text text-danger" id="error_bdate"></small>

						</div>
						<div class="form-group required">
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