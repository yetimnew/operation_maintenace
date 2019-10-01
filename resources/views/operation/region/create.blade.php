@extends( 'master.app' )
@section( 'title', 'TIMS | Region Create' )

@section( 'content' )
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
		</li>
		<li class="breadcrumb-item"><a href="#">Operations</a>
		</li>
		<li class="breadcrumb-item active">Operational Create</li>
	</ol>
<div class="col-md-12">
	@include('master.error') {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Operational Region Registration</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('region.store')}}" class="form-horizontal" id="region_reg">
				@csrf
			@include('operation.region.form')
						<div class="form-group required">
							<button type="submit" class="btn btn-primary" name="save">Save</button>


						</div>

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