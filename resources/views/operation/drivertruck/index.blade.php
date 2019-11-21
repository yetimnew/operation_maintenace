@extends( 'master.app' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Driver And Truck Create</li>
</ol>

<div class="card col-md-12">
	<div class="card-header">
		<div class="d-flex align-items-center">
			<h2>All Drivers and Plates </h2>
			@can('truck_driver create')
			<div class="ml-auto">
				<a href="{{route('drivertruck.create')}}" class="btn btn-outline-primary"><i
						class="fas fa-plus mr-1"></i>Assign Drivers to Truck</a>

			</div>
			@endcan
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive text-nowrap">
			<table class="table table-bordered table-sm table-striped" id="truck_driver">
				<thead>
					<tr>
						<th class="m-1 b-1">No</th>
						<th class="m-1 b-1">Plate</th>
						<th class="m-1 b-1">Driver ID</th>
						<th class="m-1 b-1">Driver Name</th>
						<th class="m-1 b-1">Recived Date</th>
						<th class="m-1 b-1">Status</th>
						@can('truck_driver edit')
						<th class="m-1 b-1">Edit</th>
						@endcan
						@can('truck_driver detach')
						<th class="m-1 b-1">Detach</th>
						@endcan
						@can('truck_driver delete')
						<th class="m-1 b-1">Delete</th>
						@endcan

					</tr>
				</thead>
				<tbody>
					@if ($dts->count()> 0)
					<?php $no = 0;?>
					@foreach ($dts as $dt)
					<tr>
						<td class='m-1 p-1'>{{++$no}}</td>
						<td class='m-1 p-1'>{{$dt->plate}}</td>
						<td class='m-1 p-1'>{{$dt->driverid}}</td>
						<td class='m-1 p-1'>{{$dt->Name}}</td>
						<td class='m-1 p-1'>{{$dt->date_recived}}</td>
						@if ($dt->is_attached == 1)
						<td class='m-1 p-1'><span class="badge badge-primary">Attached</span>
						</td>
						@can('truck_driver edit')
						<td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit"><a
								href="{{route('drivertruck.edit',['id'=> $dt->id])}}"><i class="fa fa-edit"></i></a>
						</td>
						@endcan

						@can('truck_driver detach')
						<td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Dettach"><a
								class="btn btn-sm btn-outline-info"
								href="{{route('drivertruck.detach',['id'=> $dt->id])}}"
								id="detach-form-{{$dt->id}}">Dettach</a>
						</td>
						@endcan

						@else
						<td class='m-1 p-1'><span class="badge badge-danger">Passive</span><span class="pull-right">
								Detached {{$dt->date_detach}} </span> </td>
						<td class='m-1 p-1'><span class="badge badge-info">Note Editable</span>
							</a>
						</td>
						<td class='m-1 p-1'><span class="badge badge-info">Aleady Detached</span>
						</td>
						@endif

						@can('truck_driver delete')
						<td class='m-1 p-1 text-center'>

							<form action="{{route('drivertruck.destroy',['id'=> $dt->id])}}"
								id="delete-form-{{$dt->id}}" style="display: none">
								@csrf @method('DELETE')
							</form>
							<button type="submit" class="btn btn-sm" onclick="if(confirm('Are you sure to delete this?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{$dt->id}}').submit();
                        }else{
                            event.preventDefault();
                        }"> <i class="fas fa-trash red"></i>
							</button>
						</td>
						@endcan

					</tr>

					@endforeach
					@else
					<tr>
						<td class='m-1 p-1 text-center' colspan="9">No Data Avilable</td>
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
				$( '#truck_driver' ).DataTable({

				"pageLength": 20,
				// "scrollY": 100,
				'columnDefs': [ {

				// 'targets': [7,8], /* column index */

				'orderable': false, /* true or false */
				}]
				});
			} );

		
</script>
@endsection