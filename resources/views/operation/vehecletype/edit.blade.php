@extends( 'master.app' )
@section( 'content' ) {{--form create starts--	}}

<div class="col-md-12">
	@include('master.error') {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Vehecletype Updation</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('vehecletype.update',['id'=>$vehecletype->id])}}" class="form-horizontal" id="truck_form">
				@csrf
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="form-group required pb-0">
							<label class="control-label">Type/Model Name</label>
							<div class="input-group">
								<span class="input-group-addon"></span>
								<input type="text" name="name" id="name" class="form-control" required value="{{$vehecletype->name}}">
							</div>
							<small class="form-text text-danger" id="error_plate"></small>

						</div>

						<div class="form-group pb-0">
							<label class="control-label">Company</label>
							<div class="input-group"> <span class="input-group-addon"></span>
								<input name="company" type="text" class="form-control" id="company" value="{{$vehecletype->company}}">
							</div>

						</div>
						<div class="form-group pb-0">
							<label class="control-label">Production Date</label>
							<div class="input-group"> <span class="input-group-addon"></span>
								<input name="pdate" type="date" class="form-control" id="pdate" value="{{$vehecletype->productiondate}}">
							</div>
						</div>

						<div class="form-group">
							<label for="">Comment</label>
							<textarea class="form-control" name="comment" id="comment" rows="3">{{$vehecletype->comment}}</textarea>
						</div>
						<span class="help-block"></span>

						<div class="form-group pb-0 text-right">
							<input type="submit" class="btn btn-primary btn-lg" name="save" id="mangeBtn" value="Save">
						</div>
						<!--                                          the right side begins here-->
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