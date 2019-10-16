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

		<a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">

			<thead>
				<tr>
					<th>Permissions</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($permissions as $permission)
				<tr>
					<td>{{ $permission->name }}</td>
					<td>
						<a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left"
							style="margin-right: 3px;">Edit</a>

						{!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

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