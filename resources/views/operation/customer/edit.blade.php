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

			<div class="d-flex align-items-center">
				<h2>Customer Update <strong class="blue">{{$customer->name}}</strong></h2>
				@can('truck edit')
				<div class="ml-auto">
					<a href="{{route('customer')}}" class="btn btn-outline-primary">
						<i class="fa fa-caret-left mr-1" aria-hidden="true"></i>
						Back</a>

				</div>
				@endcan
			</div>
		</div>

		<div class="card-body">
			<form method="POST" action="{{route('customer.update',['id'=>$customer->id])}}" class="form-horizontal"
				id="customer_reg">
				@csrf
				@method('PATCH')
				@include('operation.customer.form')
				<div class="form-group required pull-right">
					<button type="submit" class="btn btn-primary" name="save">Save</button>


				</div>
		</div>
	</div>
</div>
<div class="card-footer">
</div>

</form>
</div>

</div>

@endsection
@section( 'javascript' )


@endsection