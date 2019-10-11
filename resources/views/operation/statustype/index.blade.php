@extends( 'master.app' )
@section( 'title', 'TIMS | Status Type ' )

@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item"><a href="#">Statuses</a>
	</li>
	<li class="breadcrumb-item active">Status Type</li>
</ol>
<div class="row col-12">
	<div class="col-10">
	</div>
	<div class="col-2">
		<a href="{{route('statustype.create')}}" class="btn btn-primary">Add Status Group</a>
		{{-- <button class="btn btn-default pull-right" onclick="exportTableToExcel('operations', 'members-data')"><img src="../img/xls.png" width="24" class="mr-2">Export To Excel</button> --}}
	</div>
</div>
<div class="row col-12">
	<div class="table-responsive text-nowrap">
		<table class="table table-bordered table-sm table-striped" id="operations">
			<thead>
				<tr>
					<th>no</th>
					<th>Name</th>
					<th>statusGroup</th>
					<th>Comment</th>
					<th>Edit</th>
					<th>Delete</th>


				</tr>
			</thead>
			<tbody>
				@if ($statustypes->count()> 0) @foreach ($statustypes as $statustype)
				<tr>
					<td class='m-1 p-1'>{{$statustype->id}}</td>
					<td class='m-1 p-1'>{{$statustype->name}}</td>
					@if ($statustype->statusgroup == 1)
					<td class='m-1 p-1'>Operational</td>

					@else

					<td class='m-1 p-1'>Garage</td>
					@endif
					<td class='m-1 p-1'>{{$statustype->comment}}</td>
					<td class='m-1 p-1'><a href="{{route('statustype.edit',['id'=> $statustype->id])}}"
							class="btn btn-info btn-xs"><i class="fas fa-edit"> </i></a>
					</td>
					<td class='m-1 p-1'>

						<form action="{{route('statustype.destroy',['id'=> $statustype->id])}}"
							id="detach-form-{{$statustype->id}}" style="display: none">
							@csrf @method('DELETE')
						</form>
						<button type="submit" class="btn btn-danger btn-xs" onclick="if(confirm('Are you sure to Delete this?')){
                            event.preventDefault();
                            document.getElementById('detach-form-{{$statustype->id}}').submit();
                        }else{
                            event.preventDefault();
                        }"> <i class="fas fa-trash"> </i>
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
				$( '#operations' ).DataTable();
			} );
		</script>
		@endsection