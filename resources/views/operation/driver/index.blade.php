@extends( 'master.app' )
@section( 'title', 'TIMS | Driver' )

@section( 'styles' )

<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')

<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Driver</li>
</ol>

<div class="col-md-12">
	<div class="card text-left">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>All Drivers </h2>
				@can('customer create')

				<div class="ml-auto">
					<a href="{{route('driver.create')}}" class="btn btn-outline-primary"><i
							class="fas fa-plus mr-1"></i>Add Driver</a>

				</div>
				@endcan
			</div>
		</div>

		<div class="card-body">
			<div class="table-responsive text-nowrap">
				<table class="table table-sm table-striped" id="drivers">
					<thead>
						<tr>
							<th class="m-1 b-1" width="3%">No</th>
							<th class="m-1 b-1">drivereID</th>
							<th class="m-1 b-1"> Name</th>
							<th class="m-1 b-1"> Sex</th>
							<th class="m-1 b-1"> burthdate</th>
							<th class="m-1 b-1"> Zone</th>
							<th class="m-1 b-1">Woreda</th>
							<th class="m-1 b-1">Kebele</th>
							<th class="m-1 b-1">HouseNumber</th>
							<th class="m-1 b-1">Telephone</th>
							<th class="m-1 b-1">HireDate</th>
							<th class="m-1 b-1" width="3%">Edit</th>
							<th class="m-1 b-1" width="3%">Deactivate</th>
							<th class="m-1 b-1" width="3%">Delete</th>

						</tr>
					</thead>
					<tbody>
						<?php $no = 0 ?>
						@if ($drivers->count()> 0)
						@foreach ($drivers as $driver)
						<tr>

							<td class='p-1'>{{++$no}}</td>
							<td class='p-1'>{{$driver->driverid}}</td>
							<td class='p-1'>{{$driver->name}}</td>
							<td class='p-1 text-center'>{{$driver->sex}}</td>
							<td class='p-1 text-center'>{{$driver->birthdate}}</td>
							<td class='p-1 text-center'>{{$driver->zone}}</td>
							<td class='p-1 text-center'>{{$driver->woreda}}</td>
							<td class='p-1 text-center'>{{$driver->kebele}}</td>
							<td class='p-1 text-center'>{{$driver->housenumber}}</td>
							<td class='p-1 text-center'>{{$driver->mobile}}</td>
							<td class='p-1 text-center'>{{$driver->hireddate}}</td>
							{{-- @can('edit driver') --}}
							<td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit"><a
									href="{{route('driver.edit',['id'=> $driver->id])}}"><i class="fa fa-edit"></i></a>
							</td>
							<td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Deactivate">
								<a href="{{route('driver.deactivate',['id'=> $driver->id])}}" onclick="if(confirm('Are you sure to delete this?')){

										
									}">deactivate</i></a>
							</td>

							<td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Delete">

								<form action="{{route('driver.destroy',['id'=> $driver->id])}}"
									id="delete-form-{{$driver->id}}" style="display: none">
									@csrf @method('DELETE')
								</form>
								<button class="btn btn-sm" type="submit" onclick="if(confirm('Are you sure to delete this?')){
								event.preventDefault();
								document.getElementById('delete-form-{{$driver->id}}').submit();
									}else{
										event.preventDefault();
									}"> <i class="fa fa-trash red"></i>
								</button>
							</td>

						</tr>

						@endforeach
						@else
						<tr>
							<td class='m-1 p-1 text-center' colspan="14">No Data Avilable</td>
						</tr>
						@endif

					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer">

		</div>
	</div>


	@endsection
	@section('javascript')

	<script>
		$( document ).ready( function () {
				$( '#drivers' ).DataTable( {

				"pageLength": 25,
				// "scrollY": 100,
				'columnDefs': [ {

				'targets': [11,12,13], /* column index */

				'orderable': false, /* true or false */

				}]
				});
				
			} );
	</script>
	@endsection