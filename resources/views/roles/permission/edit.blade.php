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
		<form method="post" action="{{route('permission.update',['id'=>$permission->id])}}" class="form-horizontal"
			id="driver_reg" novalidate>
			@csrf

			<div class="form-group">
				<label for="name"></label>
				<input type="text" name="name" id="name" class="form-control" value="{{$permission->name}}"
					aria-describedby="helpId">
				<small id="helpId" class="text-muted">Help text</small>
			</div>
			<div class="form-group required">
				<button type="submit" class="btn btn-primary" name="save">Save</button>


			</div>

	</div>

	</form>
	@endsection
	@section( 'javascript' )


	@endsection