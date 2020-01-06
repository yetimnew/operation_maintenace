@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Registration' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
@endsection
@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ul class="breadcrumb breadcrumb-style ">

			<li class="breadcrumb-item"><a href="{{route('dasboard')}}"><i class="fa fa-home"></i>Home</a></li>
			<li class="breadcrumb-item"><a href="#">Statuses</a></li>
			<li class="breadcrumb-item active">Status Type</li>
		</ul>

	</div>
</div>


<div class="row col-12">
	<div class="card text-left col-md-12">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>All Trucks </h2>
				@can('driver create')

				<div class="ml-auto">
					<a href="{{route('truck.create')}}" class="btn btn-outline-primary"><i
							class="fa fa-plus mr-1"></i>Add Truck</a>

				</div>
				@endcan
			</div>
		</div>
		<div class="card-body">
			<div class="table table-responsive text-nowrap">
				<table class="table-sm table table-bordered table-sm table-striped" id="trucks">
					<thead>
						<tr>
							<th class="m-1 b-1" width="2%">No</th>
							<th class="m-1 b-1">Plate Number</th>
							<th class="m-1 b-1">Vehicle Model </th>
							<th class="m-1 b-1">Chassis No</th>
							<th class="m-1 b-1">Engine No</th>
							<th class="m-1 b-1">Tyre</th>
							<th class="m-1 b-1">SIIKM</th>
							<th class="m-1 b-1">Purchase Price</th>
							<th class="m-1 b-1">Production Date</th>
							<th class="m-1 b-1">Start Date</th>
							@can('truck edit')
							<th class="m-1 b-1 text-center" width="3%">Edit</th>
							@endcan
							@can('truck delete')
							<th class="m-1 b-1 text-center" width="3%">Delete</th>
							@endcan
							@can('truck deactivate')
							<th class="m-1 b-1 text-center" width="3%">Deactivate</th>
							@endcan
						</tr>
					</thead>
					<tbody>
						{{-- {{dd($trucks)}} --}}
						<?php $no = 0 ?>
						@if ($trucks->count()> 0)
						@foreach ($trucks as $truck)
						<tr>
							<td class='p-1'>{{++$no }}</td>
							<td class='p-1'>{{$truck->plate}}</td>
							<td class='p-1'>{{$truck->vehecletype->name}}</td>
							<td class='p-1'>{{$truck->chasisNumber}}</td>
							<td class='p-1'>{{$truck->engineNumber}}</td>
							<td class='p-1'>{{$truck->tyreSyze}}</td>
							<td class='p-1'>{{ number_format($truck->serviceIntervalKM , 2)}}</td>
							<td class='p-1'>{{number_format($truck->purchasePrice, 2)}}</td>
							<td class='p-1'>{{date('d-m-Y',strtotime($truck->productionDate))}}</td>
							<td class='p-1'>{{date('d-m-Y',strtotime($truck->serviceStartDate))}}</td>
							@can('truck edit')
							<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit"><a
									href="{{route('truck.edit',['id'=> $truck->id])}}"><i class="fa fa-edit"> </i></a>
							</td>
							@endcan
							@can('truck delete')
							<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top" title="Delete">

								<form action="{{route('truck.destroy',['id'=> $truck->id])}}"
									id="detach-form-{{$truck->id}}" style="display: none">
									@csrf @method('DELETE')
								</form>

								<button type="submit" class="btn btn-sm" id="first" onclick="if(confirm('Are you sure to Delete this?')){
                            event.preventDefault();
                            document.getElementById('detach-form-{{$truck->id}}').submit();
                        }else{
                            event.preventDefault();
						}"> <i class="fa fa-trash red"> </i>
								</button>
							</td>
							@endcan
							@can('truck deactivate')
							<td class='p-1 text-center'>
								<form action="{{route('truck.deactivate',['id'=> $truck->id])}}"
									id="deactivate-form-{{$truck->id}}" style="display: none">
									@csrf
									{{-- @method('DELETE') --}}
								</form>
								<button class="btn btn-sm btn-outline-info" type="submit" onclick="if(confirm('Are you sure to deactivate this? if your answer is yes you don\'t insert any data by this dirive. ')){
									event.preventDefault();
									document.getElementById('deactivate-form-{{$truck->id}}').submit();
										}else{
											event.preventDefault();
										}"> Deactivate

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
			</div>

		</div>
		<div class="card-footer">

		</div>
	</div>
</div>

@endsection
@section('javascript')

<script>
	$( document ).ready( function () {
				$( '#trucks' ).DataTable( {

					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"pageLength": 25,
					// "scrollY": 100,
					'columnDefs': [ {

					'orderable': false, /* true or false */

}]
				} );
			} );
</script>
@endsection