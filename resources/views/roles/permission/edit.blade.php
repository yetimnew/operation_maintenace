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

		<h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
		<br>
		{{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

		<div class="form-group">
			{{ Form::label('name', 'Permission Name') }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>
		<br>
		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}

	</div>
	@endsection
	@section( 'javascript' )


	@endsection