@extends( 'master.app' )
@section( 'title', 'TIMS | Performance Create' )
@section( 'content' )
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
			</li>
			<li class="breadcrumb-item active">Performance Reg</li>
		</ol>
		{{-- @include('master.error') --}} {{-- @include('master.success') --}}
		<div class="card text-left">
			<div class="card-header">
				<h2>Performance Registration</h2>
			</div>
			<div class="card-body">
				<form method="post" action="{{route('performace.store')}}" id="performance_edit_form" novalidate>
					@csrf
					@include('operation.performance.form')
							<div class="form-group required">
								<button type="submit" class="btn btn-primary" name="save">Save</button>

							</div>

						</div>

					</div>
			
			{{-- end of card body --}}
			</div>
			<div class="card-footer">
				the footer
			</div>


			</form>
		</div>
	</div>

@endsection
