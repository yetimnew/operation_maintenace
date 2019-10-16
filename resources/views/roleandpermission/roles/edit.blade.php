@extends( 'master.app' )
@section( 'title', 'TIMS | Customer Edit' )

@section( 'content' )
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer Edit</li>
</ol>

<div class="col-md-12">
	@include('master.error')
	{{-- @include('master.success') --}}
	<div class='col-lg-4 col-lg-offset-4'>
		<h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
		<hr>

		{{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

		<div class="form-group">
			{{ Form::label('name', 'Role Name') }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>

		<h5><b>Assign Permissions</b></h5>
		@foreach ($permissions as $permission)

		{{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
		{{Form::label($permission->name, ucfirst($permission->name)) }}<br>

		@endforeach
		<br>
		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}
	</div> @endsection
	@section( 'javascript' )


	@endsection