@extends( 'master.app' )
@section( 'title', 'TIMS | Role' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer</li>
</ol>

<h1><i class="fa fa-key"></i> Roles
	<div class="row col-12">
		<div class="col-10">
		</div>
		<div class="col-2">
			<a href="{{route('role.create')}}" class="btn btn-primary"> <i class="fafa-plus "></i> Add
				Roles</a>
			{{-- <button class="btn btn-default pull-right" onclick="exportTableToExcel('customer', 'members-data')"><img src="../img/xls.png" width="24" class="mr-2">Export To Excel</button> --}}
		</div>
	</div>
	<hr>
	<div class=text-nowrap">
		<table class="table table-bordered table-sm table-striped" id="customer">
			<thead>
				<tr>
					<th width="3%">Number</th>
					<th>Role</th>
					<th>Permissions</th>
					<th class="text-center">Edit</th>
					<th class="text-center">Delete</th>
				</tr>
			</thead>

			<tbody>
				{{-- {{dd($role_has_permission)}} --}}
				<?php $no = 0 ?>
				@if ($roles->count()> 0)
				@foreach ($roles as $role)
				<tr>
					<td>{{++$no}}</td>
					<td>{{$role->name}}</td>
					{{-- <td>{{$role->permission()}}</td> --}}

					<td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>

					<td class='m-1 p-1 text-center'><a href="{{route('role.edit',['id'=> $role->id])}}">
							<i class="fa fa-edit "></i> </a>
					</td>
					<td class='m-1 p-1 text-center '>
						<form action="{{route('role.destroy',['id'=> $role->id])}}" id="delete-form-{{$role->id}}"
							style="display: none">
							@csrf @method('DELETE')
						</form>

						<button type="submit" onclick="if(confirm('Are you sure to delete this?')){
								event.preventDefault();
								document.getElementById('delete-form-{{$role->id}}').submit();
								}else{
								event.preventDefault();
								}"> <i class="fa fa-trash red"></i>
						</button>
					</td>

				</tr>

				@endforeach
				@else
				<tr>
					<td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
				</tr>
				@endif
			</tbody>

		</table>
	</div>




	@endsection
	@section('javascript')
	<script src="{{ asset('js/jquery.dataTables.min.js') }}">
	</script>
	<script>
		$( document ).ready( function () {
				$( '#role' ).DataTable();
			} );
	</script>
	@endsection