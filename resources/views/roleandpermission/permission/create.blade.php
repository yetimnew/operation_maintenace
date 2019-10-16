@extends( 'master.app' )
@section( 'title', 'TIMS | Customer Create' )

@section( 'content' )
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer Create</li>
</ol>

<div class='col-lg-4 col-lg-offset-4'>

	<h1><i class='fa fa-key'></i> Add Permission</h1>
	<br>

	{{ Form::open(array('url' => 'permissions')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', '', array('class' => 'form-control')) }}
	</div><br>
	@if(!$roles->isEmpty()) //If no roles exist yet
	<h4>Assign Permission to Roles</h4>

	@foreach ($roles as $role)
	{{ Form::checkbox('roles[]',  $role->id ) }}
	{{ Form::label($role->name, ucfirst($role->name)) }}<br>

	@endforeach
	@endif
	<br>
	{{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}

</div>

@endsection