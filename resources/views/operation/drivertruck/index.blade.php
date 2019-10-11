@extends( 'master.app' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Driver And Truck Create</li>
</ol>
<div class="row col-12">
	<div class="col-10">
	</div>
	<div class="col-2">
		<a href="{{route('drivertruck.create')}}" class="btn btn-primary">Assign Drivers</a>

	</div>
</div>
<div class="row col-12">
	<div class="table-responsive text-nowrap">
		<table class="table table-bordered table-sm table-striped" id="drivers">
			<thead>
				<tr>
					<th class="m-1 b-1">No</th>
					<th class="m-1 b-1">Plate</th>
					<th class="m-1 b-1">Driver ID</th>
					<th class="m-1 b-1">Driver Name</th>
					<th class="m-1 b-1">Recived Date</th>
					<th class="m-1 b-1">Status</th>
					<th class="m-1 b-1">Edit</th>
					<th class="m-1 b-1">Detach</th>
					<th class="m-1 b-1">Delete</th>

				</tr>
			</thead>
			<tbody>
				@if ($dts->count()> 0)
				<?php $no = 0;?> @foreach ($dts as $dt)
				<tr>
					<td class='m-1 p-1'>{{++$no}}</td>
					<td class='m-1 p-1'>{{$dt->plate}}</td>
					<td class='m-1 p-1'>{{$dt->driverid}}</td>
					<td class='m-1 p-1'>{{$dt->Name}}</td>
					<td class='m-1 p-1'>{{$dt->date_recived}}</td>
					@if ($dt->status == 1)
					<td class='m-1 p-1'><span class="badge badge-primary">Attached</span>
					</td>
					<td class='m-1 p-1'><a href="{{route('drivertruck.edit',['id'=> $dt->id])}}"
							class="btn btn-info btn-sm">Edit</a>
					</td>
					<td class='m-1 p-1'>


						<form action="{{route('drivertruck.detach',['id'=> $dt->id])}}" id="detach-form-{{$dt->id}}"
							style="display: none">
							@csrf @method('DELETE')
						</form>
						<button type="submit" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to detach this?')){
                            event.preventDefault();
                            document.getElementById('detach-form-{{$dt->id}}').submit();
                        }else{
                            event.preventDefault();
                        }"> <i class="fas fa-trash"> detach</i>
					</td>
					</button> @else
					<td class='m-1 p-1'><span class="badge badge-danger">Passive ||</span><span class="pull-right">
							Detached {{$dt->date_detach}} </span> </td>
					<td class='m-1 p-1'><span class="badge badge-info">Note Editable</span>
						</a>
					</td>
					<td class='m-1 p-1'><span class="badge badge-info">Aleady Detached</span>
					</td>
					@endif

					<td class='m-1 p-1'>

						<form action="{{route('drivertruck.destroy',['id'=> $dt->id])}}" id="delete-form-{{$dt->id}}"
							style="display: none">
							@csrf @method('DELETE')
						</form>
						<button type="submit" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to delete this?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{$dt->id}}').submit();
                        }else{
                            event.preventDefault();
                        }"> <i class="fas fa-trash"></i>
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
				$( '#drivers' ).DataTable();

			} );
		</script>
		@endsection