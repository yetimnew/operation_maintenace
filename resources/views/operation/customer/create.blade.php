@extends( 'master.app' )
@section( 'title', 'TIMS | Customer Create' )

@section( 'content' )
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer Create</li>
</ol>
<div class="col-md-12">
	{{-- @include('master.error') --}} {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Customer Registration</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('customer.store')}}" class="form-horizontal" id="customer_reg">
				@csrf
				@include('operation.customer.form')
				<div class="form-group required pull-right">
					<button type="submit" class="btn btn-primary" name="save">Save</button>


				</div>


		</div>
	</div>

</div>

</form>
</div>
</div>

@endsection