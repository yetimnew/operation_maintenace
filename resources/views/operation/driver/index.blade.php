@extends( 'master.app' )
@section( 'title', 'TIMS | Driver' )

@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Driver</li>
</ol>
<div class="row col-12">
	<div class="col-10">
	</div>
	<div class="col-2">
		<a href="{{route('driver.create')}}" class="btn btn-primary">Add Driver</a>
		{{-- <button class="btn btn-default pull-right" onclick="exportTableToExcel('drivers', 'members-data')"><img src="../img/xls.png" width="24" class="mr-2">Export To Excel</button> --}}
	</div>
</div>
<div class="row col-12">
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
					<td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit"><a
							href="{{route('driver.edit',['id'=> $driver->id])}}"><i class="fa fa-edit"></i></a>
					</td>
					<td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Delete">

						<form action="{{route('driver.destroy',['id'=> $driver->id])}}" id="delete-form-{{$driver->id}}"
							style="display: none">
							@csrf @method('DELETE')
						</form>
						<button class="btn btn-sm" type="submit" onclick="if(confirm('Are you sure to delete this?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{$driver->id}}').submit();
                        }else{
                            event.preventDefault();
                        }"> <i class="fa fa-trash red"></i>
					</td>
					</button>


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
				$( '#drivers' ).DataTable( {

				"pageLength": 25,
				// "scrollY": 100,
				'columnDefs': [ {

				'targets': [11,12], /* column index */

				'orderable': false, /* true or false */

				}]
				});
				
			} );
		</script>
		@endsection