@extends( 'master.app' )
@section( 'title', 'TIMS | Operation' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
@endsection
@section('content')

<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Operation</li>
</ol>

<div class="row col-md-12">
	<div class="card text-left col-md-12">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>All Oprations </h2>
				@can('customer create')

				<div class="ml-auto">
					<a href="{{route('operation.create')}}" class="btn btn-outline-primary"><i
							class="fafa-plus mr-1"></i>Add Operation</a>

				</div>
				@endcan
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive text-nowrap">
				<table class="table table-bordered table-sm table-striped" id="operations">
					<thead>
						<tr>
							<th width="5%">no</th>
							<th width="5%">Operation Id</th>
							<th width="10%">Client Name</th>
							<th width="10%">start Date</th>
							<th width="10%">Region </th>
							<th width="10%">Volum MT</th>
							<th width="10%">Cargo Type</th>
							<th width="10%">TonKM</th>
							<th width="10%">Tarif</th>
							<th width="10%">Status</th>
							@can('operation edit')
							<th width="3%">Edit</th>
							@endcan
							@can('operation delete')
							<th width="3%">Delete</th>
							@endcan
							@can('operation close')
							<th width="3%">Close | Open</th>
							@endcan

						</tr>
					</thead>
					<tbody>
						<?php $no = 0 ?>
						@if ($operations->count()> 0)
						@foreach ($operations as $operation)
						<tr>
							<td class='m-1 p-1'>{{$operation->id}}</td>
							<td class='m-1 p-1'>{{$operation->operationid}}</td>
							<td class='m-1 p-1'>{{$operation->customer->name}}</td>
							<td class='m-1 p-1'>{{Date($operation->startdate)}}</td>
							<td class='m-1 p-1'>{{$operation->region->name}}</td>
							<td class='m-1 p-1 text-right'>{{number_format($operation->volume,2)}}</td>
							@if($operation->cargotype == 1)
							<td class='m-1 p-1'>Relief</td>
							@else
							<td class='m-1 p-1'>Commercial</td>
							@endif
							<td class='m-1 p-1 text-right'>{{number_format($operation->km,0)}}</td>
							<td class='m-1 p-1 text-right'>{{$operation->tariff}}</td>
							@if ($operation->closed == 0)
							<td class='m-1 p-1'><span class="badge badge-danger">closed
									{{$operation->updated_at->diffForHumans()}}</span></td>
							@else
							<td class='m-1 p-1'><span class="badge badge-info">Opened </span></td>
							@endif
							@can('operation edit')
							<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit">
								<a href="{{route('operation.edit',['id'=> $operation->id])}}"> <i
										class="fa fa-edit    "></i>
							</td>
							@endcan
							@can('operation delete')
							<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top" title="Delete">
								<form action="{{route('operation.destroy',['id'=> $operation->id])}}"
									id="detach-form-{{$operation->id}}" style="display: none">
									@csrf @method('DELETE')
								</form>
								<button type="submit" class="btn btn-sm" onclick="if(confirm('Are you sure to Delete The operation?')){
												event.preventDefault();
												document.getElementById('detach-form-{{$operation->id}}').submit();
											}else{
												event.preventDefault();
											}"> <i class="fa fa-trash red"></i>

								</button>
							</td>
							@endcan
							@if ($operation->closed == 1)
							@can('operation close')
							<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top"
								title="Do you want to close?"><a
									href="{{route('operation.close',['id'=> $operation->id])}}"
									class="btn btn-warning btn-sm">
									<i class="fa fa-window-close" aria-hidden="true">close</i>

								</a>
							</td>
							@endcan
							@else
							@can('operation open')
							<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top"
								title="Do you want to Open?"><a
									href="{{route('operation.open',['id'=> $operation->id])}}"
									class="btn btn-success btn-sm"> Open</a>
							</td>
							@endcan
							@endif

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
</div>



@endsection
@section('javascript')

<script>
	$( document ).ready( function () {
				$( '#operations' ).DataTable({

				"pageLength": 20,
				// "scrollY": 100,
				'columnDefs': [ {

				// 'targets': [10,11,12], /* column index */

				'orderable': false, /* true or false */

				}]
				});
			} );

		
</script>
@endsection