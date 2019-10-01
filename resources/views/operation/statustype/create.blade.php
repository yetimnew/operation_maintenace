@extends( 'master.app' )
@section( 'title', 'TIMS | Status Type Create ' )
@section( 'content' )
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
		</li>
		<li class="breadcrumb-item"><a href="#">Statuses</a>
		</li>
		<li class="breadcrumb-item active">Status Create</li>
	</ol>
<div class="col-md-12">
	@include('master.error') {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Status Catgory Registration</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('statustype.store')}}" class="form-horizontal" id="truck_form">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-0">
							<label class="control-label">Status Type</label>

							<div class="input-group"> <span class="input-group-addon"></span>
								<input name="name" type="text" autofocus class="form-control" id="name">
							</div>
							<span class="help-block"></span>
						</div>

						<div class="form-group mb-0">
							<label class="control-label">Status Group</label>

							<select name="type" class="form-control select" id="type" required>
								<option class="dropup" value="0"> Operational </option>
								<option class="dropup" value="1"> On Graje - </option>

							</select>
							<span class="help-block"> </span>
						</div>
						<div class="form-group">
							<label class="control-label">Comments</label>
							<textarea name="comment" rows="5" class="form-control" id="comment"></textarea>

						</div>

						<div class="form-group required">
							<button type="submit" class="btn btn-primary" name="save">Save</button>
						</div>

					</div>

				</div>
		</div>
		<div class="card-footer">
			the footer
		</div>

		</form>
	</div>
</div>

@endsection