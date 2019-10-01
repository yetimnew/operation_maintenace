@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Update' )

@section( 'content' )


<div class="col-md-12">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
		</li>
		<li class="breadcrumb-item active">Driver Update</li>
	</ol>
	{{-- @include('master.error') --}}
	 {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Driver Update</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('driver.update',['id'=>$driver->id])}}" class="form-horizontal" id="driver_reg" novalidate>
				@csrf
@include('operation.driver.form')
			
						<div class="form-group required">
							<button type="submit" class="btn btn-primary" name="save">Save update</button>


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