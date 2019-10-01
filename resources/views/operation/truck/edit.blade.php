@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Update' )
@section( 'content' )

<div class="col-md-12">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
		</li>
		<li class="breadcrumb-item ">Trucks</li>
		<li class="breadcrumb-item active">Truck Update</li>
	</ol>
	@include('master.error') {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Truck Registration</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('truck.update',['id'=>$truck->id])}}" class="form-horizontal"
				id="truck_form">
				@csrf
				@include('operation.truck.form')
				<div class="form-group required pull-right">
					<button type="submit" class="btn btn-primary" name="save">Save Update</button>
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