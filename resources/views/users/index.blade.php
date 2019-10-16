@extends( 'master.app' )
@section( 'title', 'TIMS | Customer' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Customer</li>
</ol>
<div class="row col-12">
	<div class="col-10">
	</div>
	<div class="col-2">
		<a href="{{route('user.create')}}" class="btn btn-primary"> <i class="fas fa-plus    "></i> Add User</a>
		{{-- <button class="btn btn-default pull-right" onclick="exportTableToExcel('user', 'members-data')"><img src="../img/xls.png" width="24" class="mr-2">Export To Excel</button> --}}
	</div>
</div>
<div class="row col-12">
	<div class="table-responsive text-nowrap">
		<table class="table table-bordered table-sm table-striped" id="user">
			<thead>
				<tr>
					<th width="3%">Number</th>
					<th width="3%">Image</th>
					<th class="text-center">Users Name</th>
					<th class="text-center">Email</th>
					<th width="5%">Status</th>
					<th width="5%">Is Admin</th>
					<th width="5%">Edit</th>

				</tr>
			</thead>
			<tbody>
				{{-- {{ dd($users)}} --}}
				<?php $no = 0 ?>
				@if ($users->count()> 0)
				@foreach ($users as $user)
				<tr>
					<td>{{++$no}}</td>

					<td> <img src="{{asset($user->profile->image)}}" alt="" width="50" height="50"
							class="rounded-circle" alt="Cinque Terre"></td>
					{{-- <td>{{$user->profile->id}}</td> --}}
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->active}}</td>
					@if ($user->admin)
					<td>Admin</td>
					@else
					<td>Not Admin</td>
					@endif

					<td class='m-1 p-1 text-center'><a href="{{route('user.edit',['id'=> $user->id])}}">
							<i class="fas fa-edit "></i> </a>
					</td>

				</tr>

				@endforeach @else
				<tr>
					<td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
				</tr>
				@endif

			</tbody>
		</table>

		@endsection
		@section('javascript')

		<script>
			$( document ).ready( function () {
				$( '#user' ).DataTable();
			} );
		</script>
		@endsection