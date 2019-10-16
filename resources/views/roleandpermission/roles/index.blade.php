@extends( 'master.app' )
@section( 'title', 'TIMS | Customer' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer</li>
</ol>
<div class="col-lg-10 col-lg-offset-1">
	<h1><i class="fa fa-key"></i> Roles

		<a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
		<a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Role</th>
					<th>Permissions</th>
					<th>Operation</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($roles as $role)
				<tr>

					<td>{{ $role->name }}</td>

					<td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
					{{-- Retrieve array of permissions associated to a role and convert to string --}}
					<td>
						<a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left"
							style="margin-right: 3px;">Edit</a>

						{!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}

					</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>

	<a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

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