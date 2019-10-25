@extends( 'master.app' )
@section( 'title', 'TIMS | Customer' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer</li>
</ol>
<div class="row col-12">
	<div class="col-10">
	</div>
	<div class="col-2">
		<a href="{{route('customer.create')}}" class="btn btn-primary"> <i class="fas fa-plus    "></i> Add Customer</a>
		{{-- <button class="btn btn-default pull-right" onclick="exportTableToExcel('customer', 'members-data')"><img src="../img/xls.png" width="24" class="mr-2">Export To Excel</button> --}}
	</div>
</div>
<div class="row col-12">
	<div class="table-responsive text-nowrap">
		<table class="table table-bordered table-sm table-striped" id="customer">
			<thead>
				<tr>
					<th width="3%">Number</th>
					<th class="text-center">Customer Name</th>
					<th class="text-center">Address</th>
					<th class="text-center">Office No</th>
					<th class="text-center">Mobile </th>
					<th class="text-center">Remark</th>
					<th width="5%">Edit</th>
					<th width="5%">Delete</th>

				</tr>
			</thead>
			<tbody>
				<?php $no = 0 ?> @if ($customers->count()> 0)
				@foreach ($customers as $customer)
				<tr>
					<td>{{++$no}}</td>
					<td>{{$customer->name}}</td>
					<td>{{$customer->address}}</td>
					<td>{{$customer->officenumber}}</td>
					<td>{{$customer->mobile}}</td>
					<td>{{$customer->remark}}</td>
					@can('edit_customer')
					<td class='m-1 p-1 text-center'><a href="{{route('customer.edit',['id'=> $customer->id])}}">
							<i class="fas fa-edit "></i> </a>
					</td>
					@endcan
					@can('delete_customer')
					<td class='m-1 p-1 text-center '>
						<form action="{{route('customer.destroy',['id'=> $customer->id])}}"
							id="delete-form-{{$customer->id}}" style="display: none">
							@csrf @method('DELETE')
						</form>

						<button type="submit" onclick="if(confirm('Are you sure to delete this?')){
									event.preventDefault();
									document.getElementById('delete-form-{{$customer->id}}').submit();
								}else{
								event.preventDefault();
								}"> <i class="fas fa-trash red"></i>
						</button>
					</td>
					@endcan

				</tr>

				@endforeach @else
				<tr>
					<td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
				</tr>
				@endif

			</tbody>
		</table>

		@endsection @section('javascript')
		<script src="{{ asset('js/jquery.dataTables.min.js') }}">
		</script>
		<script>
			$( document ).ready( function () {
				$( '#customer' ).DataTable();
			} );
		</script>
		@endsection