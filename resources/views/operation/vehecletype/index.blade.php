@extends( 'master.app' )

@section( 'styles' )
	<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
		</li>
		<li class="breadcrumb-item "><a href="#">Truks</a>
		</li>
		<li class="breadcrumb-item active">Truks Model</li>
	</ol>
<div class="row col-12">
	<div class="col-10">
	</div>
	<div class="col-2">
		<a href="{{route('vehecletype.create')}}" class="btn btn-primary">Add vehecle Type</a>

	</div>
</div>
<div class="row col-12">
	<div class="table-responsive text-nowrap">
		<table class="table table-bordered table-condensed table-striped" id="vehecletypes">
			<thead>
				<tr>
					<th class="m-1 b-1">No</th>
					<th class="m-1 b-1">Name/Model</th>
					<th class="m-1 b-1">Company</th>
					<th class="m-1 b-1">Production Date </th>
					<th class="m-1 b-1">Comment</th>
					<th class="m-1 b-1">Edit</th>
					<th class="m-1 b-1">Delete</th>
				</tr>
			</thead>
			<tbody>
				@if ($vehecletypes->count() > 0) @foreach ($vehecletypes as $vehecletype)
				<tr>
					<td class='m-1 p-1'>{{$vehecletype->id}}</td>
					<td class='m-1 p-1'>{{$vehecletype->name}}</td>
					<td class='m-1 p-1'>{{$vehecletype->company}}</td>
					<td class='m-1 p-1'>{{$vehecletype->productiondate}}</td>
					<td class='m-1 p-1'>{{$vehecletype->comment}}</td>
					<td class='m-1 p-1'><a href="{{route('vehecletype.edit',['id'=> $vehecletype->id])}}" class="btn btn-sm btn-info ">Edit</a>
					</td>
					<td class='m-1 p-1'>

						<form action="{{route('vehecletype.destroy',['id'=> $vehecletype->id])}}" id="detach-form-{{$vehecletype->id}}" style="display: none">
							@csrf @method('DELETE')
						</form>
						<button type="submit" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to Delete this?')){
                                event.preventDefault();
                                document.getElementById('detach-form-{{$vehecletype->id}}').submit();
                            }else{
                                event.preventDefault();
                            }"> <i class="fas fa-trash"> </i></td>
                            </button>


				</tr>

				@endforeach @else
				<tr>
					<td class='m-1 p-1 text-center' colspan="7">No Data Avilable</td>
				</tr>
				@endif
			</tbody>
		</table>

		@endsection @section('javascript')
		<script src="{{ asset('js/jquery.dataTables.min.js') }}">
		</script>
		<script>
			$( document ).ready( function () {
				$( '#vehecletypes' ).DataTable();
			} );
		</script>
		@endsection