@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Truck Edit ' )

@section( 'content' )
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Driver And Truck Edit</li>
</ol>
<div class="col-md-12">
	@include('master.error') {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>Driver Truck Edit</h2>
				<div class="ml-auto">
					<a href="{{route('drivertruck')}}" class="btn btn-outline-primary">
						<i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>


				</div>
			</div>
		</div>
{{-- {{dd($dts)}} --}}
		<div class="card-body">
			<form method="post" action="{{route('drivertruck.update',['id'=>$dts->id])}}" class="form-horizontal"
				id="truck_form">
				@csrf
				<div class="row">
					<div class="col-md-6">

						<div class="form-group required">
							<label class="control-label">Plate Number</label>
							<select name="plate" class="form-control select" id="plate" required>
								<option class="dropup" value="{{$dts->plate}}" selected> {{$dts->plate}} </option>
								@foreach ($trucks as $truck)
								@if( old('plate') == $truck->plate)
								<option class="dropup" value="{{$truck->plate}}" selected> {{$truck->plate}} </option>
								@else
								<option class="dropup" value="{{$truck->plate}}"> {{$truck->plate}} </option>

								@endif

								@endforeach

							</select>
							<small class="form-text text-danger" id="error_region"></small>
						</div>
						{{-- {{dd($driver)}} --}}
						<div class="form-group required">
							<label class="control-label">Driver Name</label>
							<select name="dname" class="form-control select" id="dname" required>
								<option class="dropup" value="{{$dts->driverid}}" selected> {{$dts->NAME}} </option>
								@foreach ($drivers as $driver)
								<option class="dropup" value="{{ $driver->id}} 
									 @if(old('dname') == $driver->id) {{ 'selected' }} @endif"
									{{$driver->id == $dts->driverid ? 'selected' : '' }}> {{ $driver->name}} </option>
								@endforeach
							</select>

							<small class="form-text text-danger" id="error_region"></small>
						</div>

						<div class="form-group required">
							<label class="control-label">Recived Date</label>

							<div class="input-group"> <span class="input-group-addon"></span>
								<input name="rdate" type="date" required class="form-control" id="rdate"
									value="{{ $dts->date_recived }}">
							</div>

						</div>
						@if ($dts->is_attached == 0)
						<div class="form-group required">
							<label class="control-label">Detach Date</label>

							<div class="input-group"> <span class="input-group-addon"></span>
								<input name="rdate" type="date" required class="form-control" id="rdate"
									value="{{ $dts->date_detach }}">
							</div>

						</div>
						<div class="form-group required">
							<label class="control-label">Reson for detach</label>

							
							<textarea name="comment" rows="5"
							class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
							id="comment">{{ $dts->reason}}</textarea>

						</div>
						@endif

						<div class="form-group required">
							<button type="submit" class="btn btn-primary" name="save">Update</button>

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