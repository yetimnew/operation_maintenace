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
			<h2>Driver Truck Edit</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('drivertruck.update_dt',['id'=>$dts->id])}}" class="form-horizontal" id="truck_form">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label class="control-label">Driver Name</label>

							<select name="dname" class="form-control select" id="dname" readonly>
                                       <option class="dropup" value="{{$dts->driverid}} " > {{$dts->NAME}}</option>  
                                                                                 
                                    </select>
						

							<small class="form-text text-danger" id="error_region"></small>
						</div>
						<div class="form-group ">
							<label class="control-label">Plate Number</label>
							<select name="plate" class="form-control select" id="plate" readonly>
                                            <option class="dropup" value="{{$dts->plate}}" > {{$dts->plate}}</option>  
                                                                                
                                    </select>
						
							<small class="form-text text-danger" id="error_region"></small>
						</div>


						<div class="form-group ">
							<label class="control-label">Recived Date</label>

							<div class="input-group"> <span class="input-group-addon"></span>
								<input name="rdate" type="date" class="form-control" id="rdate" value="{{$dts->date_recived }}" readonly>
							</div>

						</div>
						<div class="form-group required">
							<label class="control-label">Detach Date</label>

							<div class="input-group"> <span class="input-group-addon"></span>
								<input name="ddate" type="date" required class="form-control" id="ddate" required>
							</div>

						</div>
						<div class="form-group required">
							<label class="control-label">Reson for Detach</label>
							<div class="">
								<textarea name="comment" rows="5" class="form-control" id="comment" required>{{ old('comment')}}</textarea>

							</div>
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