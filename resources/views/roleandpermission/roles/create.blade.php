@extends( 'master.app' )
@section( 'title', 'TIMS | Customer Create' )

@section( 'content' )
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer Create</li>
</ol>
<div class='col-lg-4 col-lg-offset-4'>

	<h1><i class='fa fa-key'></i> Add Role</h1>
	<hr>

	{{ Form::open(array('url' => 'roles')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<h5><b>Assign Permissions</b></h5>

	<div class='form-group'>
		@foreach ($permissions as $permission)
		{{ Form::checkbox('permissions[]',  $permission->id ) }}
		{{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

		@endforeach
	</div>

	{{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}

</div>
@endsection