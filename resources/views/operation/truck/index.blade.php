@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Registration' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
@endsection
@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ul class="breadcrumb breadcrumb-style ">

			<li class="breadcrumb-item"><a href="{{route('dasboard')}}"><i class="fas fa-home"></i>Home</a></li>
			<li class="breadcrumb-item"><a href="#">Statuses</a></li>
			<li class="breadcrumb-item active">Status Type</li>
		</ul>

	</div>
</div>


<div class="row col-12">
	<div class="col-10">
	</div>
	<div class="col-2">
		@can('create truck')
		<a href="{{route('truck.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Truck</a>
		{{-- <button class="btn btn-default pull-right" onclick="exportTableToExcel('trucks', 'members-data')"><img src="../img/xls.png" width="24" class="mr-2">Export To Excel</button> --}}
		@endcan
	</div>
</div>
<div class="row col-12">

	{{-- {{ message }} --}}
	<div class="table-responsive text-nowrap">
		<table class=".table-sm table table-bordered table-sm table-striped" id="trucks">
			<thead>
				<tr>
					<th class="m-1 b-1" width="5%">No</th>
					<th class="m-1 b-1">Plate Number</th>
					<th class="m-1 b-1">Vehicle Model </th>
					<th class="m-1 b-1">Chassis No</th>
					<th class="m-1 b-1">Engine No</th>
					<th class="m-1 b-1">Tyre</th>
					<th class="m-1 b-1">SIIKM</th>
					<th class="m-1 b-1">Purchase Price</th>
					<th class="m-1 b-1">Production Date</th>
					<th class="m-1 b-1">Start Date</th>
					<th class="m-1 b-1 text-center" width="3%">Edit</th>
					<th class="m-1 b-1 text-center" width="3%">Delete</th>
				</tr>
			</thead>
			<tbody>
				{{-- {{dd($trucks-)}} --}}
				<?php $no = 0 ?>
				@if ($trucks->count()> 0) @foreach ($trucks as $truck)
				<tr>
					<td class='p-1'>{{++$no }}</td>
					<td class='p-1'>{{$truck->plate}}</td>
					<td class='p-1'>{{$truck->Name}}</td>
					<td class='p-1'>{{$truck->chasisNumber}}</td>
					<td class='p-1'>{{$truck->engineNumber}}</td>
					<td class='p-1'>{{$truck->tyreSyze}}</td>
					<td class='p-1'>{{ number_format($truck->serviceIntervalKM , 2)}}</td>
					<td class='p-1'>{{number_format($truck->purchasePrice, 2)}}</td>
					<td class='p-1'>{{$truck->productionDate}}</td>
					<td class='p-1'>{{$truck->serviceStartDate}}</td>
					@can('update truck')
					<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit"><a
							href="{{route('truck.edit',['id'=> $truck->id])}}"><i class="fas fa-edit"> </i></a></td>
					@endcan
					{{-- <td>
							<a><button class="btn btn-danger" onclick="deleteData({{ $post->id }})"
					type="submit">Delete</button></a>
					</td> --}}
					@can('delete truck')
					<td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top" title="Delete">

						<form action="{{route('truck.destroy',['id'=> $truck->id])}}" id="detach-form-{{$truck->id}}"
							style="display: none">
							@csrf @method('DELETE')
						</form>

						<button type="submit" class="btn btn-sm" id="first" onclick="if(confirm('Are you sure to Delete this?')){
                            event.preventDefault();
                            document.getElementById('detach-form-{{$truck->id}}').submit();
                        }else{
                            event.preventDefault();
						}"> <i class="fas fa-trash red"> </i>
					</td>
					</button>
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

		<script>
			$( document ).ready( function () {
				$( '#trucks' ).DataTable( {

					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"pageLength": 25,
					// "scrollY": 100,
					'columnDefs': [ {

					'targets': [10,11], /* column index */

					'orderable': false, /* true or false */

}]
				} );
			} );
		</script>
		<script>
			document.querySelector("#first").addEventListener('click', function(){
  swal("Our First Alert", "With some body text and success icon!", "success");
});
		  });
		</script>

		@endsection