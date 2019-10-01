@extends( 'master.app' )
@section( 'title', 'TIMS | Customer Edit' )

@section( 'content' )
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
		</li>
		<li class="breadcrumb-item active">Customer Edit</li>
	</ol>

<div class="col-md-12">
	@include('master.error') 
	{{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Customer Update</h2>
		</div>
		{{-- {{dd($customer)}} --}}
		<div class="card-body">
			<form method="post" action="{{route('customer.update',['id'=>$customer->id])}}" class="form-horizontal" id="customer_reg">
				@csrf
				@include('operation.customer.form')
						<div class="form-group required pull-right">
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