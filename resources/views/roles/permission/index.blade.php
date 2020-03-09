@extends( 'master.app' )
@section( 'title', 'TIMS | Customer' )
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer</li>
</ol>
<div class="col-lg-10 col-lg-offset-1">
	<h1><i class="fa fa-key"></i>Available Permissions

		<a href="{{ route('permission.create') }}" class="btn btn-default pull-right">Roles</a></h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">

			<thead>
				<tr>
					<th>Permissions</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($permissions as $permission)
				<tr>
					<td>{{ $permission->name }}</td>
					<td class='m-1 p-1 text-center'><a href="{{route('permission.edit',['id'=> $permission->id])}}">
							<i class="fa fa-edit "></i> </a>
					</td>
					<td class='m-1 p-1 text-center '>
						<form action="{{route('permission.destroy',['id'=> $permission->id])}}"
							id="delete-form-{{$permission->id}}" style="display: none">
							@csrf @method('DELETE')
						</form>

						<button type="submit" onclick="if(confirm('Are you sure to delete this?')){
		   event.preventDefault();
		   document.getElementById('delete-form-{{$permission->id}}').submit();
		 }else{
		  event.preventDefault();
		 }"> <i class="fa fa-trash red"></i>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	{{-- <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a> --}}

</div>


@endsection
@section('javascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}">
</script>
<script>
	$( document ).ready( function () {
				$( '#customer' ).DataTable();
			} );
</script>
@endsection