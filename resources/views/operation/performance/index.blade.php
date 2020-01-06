@extends( 'master.app' )
@section( 'title', 'TIMS | Performance Create' )

@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Performance</li>
</ol>


<div class="col-md-12">
	<div class="card text-left">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>All Performances </h2>
				@can('performance create')

				<div class="ml-auto">
					<a href="{{route('performace.create')}}" class="btn btn-outline-primary"><i
							class="fafa-plus mr-1"></i>Add Performance</a>

				</div>
				@endcan
			</div>
		</div>


		<div class="card-body">
			<div class="table-responsive text-nowrap">
				<table class="table table-bordered table-sm table-striped" id="drivers">
					<thead>
						<tr>
							<th>No</th>
							<th>Load Type</th>
							<th>FO</th>
							<th>Oper Id</th>
							<th>Driver_truck</th>
							<th>Date Dispach</th>
							<th>Origion </th>
							<th>Destination</th>
							<th>D with Cargo</th>
							<th>D without cargo </th>
							<th>VolumMT</th>
							<th>fuel/Ltr</th>
							<th>Fuel/Birr</th>
							<th>Perdiem</th>
							<th>Operating Expense</th>
							<th>Others</th>
							<th>Is returned</th>
							@can('performance edit')
							<th class="text-center" width="4%">Edit</th>
							@endcan

							@can('performance delete')
							<th class="text-center" width="4%">Delete</th>
							@endcan


						</tr>
					</thead>
					<tbody>
						<?php $no = 0 ?>
						{{-- {{	dd($dr_tr->name)}} --}}
						@if ($performances->count()> 0)
						@foreach ($performances as $pr)
						<tr>
							<td class='m-1 p-1'>{{++$no}}</td>

							@if($pr->LoadType == 1)
							<td class='m-1 p-1'>Main</td>
							@else
							<td class='m-1 p-1'>Return</td>
							@endif
							<td class='m-1 p-1'>{{$pr->FOnumber}}</td>
							<td class='m-1 p-1'>{{$pr->operation->operationid}}</td>
							<td class='m-1 p-1'>{{$pr->driver_truck->plate}} - {{$pr->driver_truck->driverid}}</td>

							<td class='m-1 p-1' data-toggle="tooltip" data-placement="top"
								title="{{$pr->DateDispach->diffForHumans()}}">
								{{$pr->DateDispach->format('d.m.Y')}}</td>
							<td class='m-1 p-1'>{{$pr->orgion->name}}</td>
							<td class='m-1 p-1'>{{$pr->destination->name}}</td>
							<td class='m-1 p-1'>{{$pr->DistanceWCargo}}</td>
							<td class='m-1 p-1'>{{$pr->DistanceWOCargo}}</td>
							<td class='m-1 p-1'>{{$pr->CargoVolumMT}}</td>
							<td class='m-1 p-1'>{{$pr->fuelInLitter}}</td>
							<td class='m-1 p-1'>{{$pr->fuelInBirr}}</td>
							<td class='m-1 p-1'>{{$pr->perdiem}}</td>
							<td class='m-1 p-1'>{{$pr->workOnGoing}}</td>
							<td class='m-1 p-1'>{{$pr->other}}</td>
							@if($pr->is_returned == 0)
							<td class='m-1 p-1'><span class="badge badge-danger">Not Returned</span>
							</td>
							@else
							<td class='m-1 p-1'> <span class="badge badge-primary"> Returned</span>
							</td>
							@endif

							@can('performance edit')
							<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit"><a
									href="{{route('performace.edit',['id'=> $pr->id])}}"> <i class="fa fa-edit "></i>
								</a>
							</td>
							@endcan
							@can('performance delete')
							<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top" title="Delete">

								<form action="{{route('performace.destroy',['id'=> $pr->id])}}"
									id="delete-form-{{$pr->id}}" style="display: none">
									@csrf 
									@method('DELETE')
								</form>
								<button type="submit" class="btn btn-sm" onclick="if(confirm('Are you sure to delete this?')){
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{$pr->id}}').submit();
                                    }else{
                                     event.preventDefault();
                                    }"> <i class="fa fa-trash red"></i>
								</button>
							</td>
						</tr>
						@endcan

						@endforeach
						@else
						<tr>
							<td class='m-1 p-1 text-center' colspan="19">No Data Avilable</td>
						</tr>
						@endif

					</tbody>

				</table>
			</div>
		</div>
		<div class="card-footer">

		</div>

	</div>
</div>
@endsection @section('javascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}">
</script>
<script>
	$( document ).ready( function () {
				$( '#drivers' ).DataTable({
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"pageLength": 25,
					'columnDefs': [ {
						'targets': [16,17,18], /* column index */
						'orderable': false, /* true or false */

				}]
				});
			} );
</script>
@endsection