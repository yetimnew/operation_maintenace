@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Registration' )

@section( 'content' )

<div class="col-md-12">
	{{-- @include('master.error') --}}

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('dasboard')}}">Home</a>
			</li>
			<li class="breadcrumb-item"><a href="#">Truck</a>
			</li>
			<li class="breadcrumb-item active"><a href="{{ route('truck')}}">Driver Reg</a>
			</li>
			{{--
			<li class="breadcrumb-item active" aria-current="page">Data</li> --}}
		</ol>
	</nav>
	<div class="card text-left">
		<div class="card-header">
			<h2>Driver Registration</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('driver.store')}}" class="form-horizontal" id="driver_reg" novalidate>
				@csrf
				@include('operation.driver.form')
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
@section( 'javascript' )

@endsection