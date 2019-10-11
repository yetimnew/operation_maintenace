@extends( 'master.app' )
@section( 'title', 'TIMS | Report performance By model' )

@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Performance</li>
</ol>

<div class="row col-12">
	<h3 class="text-center"> REPORT : Performance By Truck</h3>
	<div class="col-10">
		<form method="post" action="{{route('performance_by_model.store')}}" class="form-horizontal" id="truck_form">
			@csrf

			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-8">
					<div class="form-row">
						<div class="form-group col-md-5">
							<label for="inputCity">Start Date</label>
							<input id="startDate" name="startDate" type="date" placeholder="Start Date"
								class="form-control" required>
						</div>
						<div class="form-group col-md-5">
							<label for="inputState">Start Date</label>
							<input id="endDate" name="endDate" type="date" placeholder="End Date" class="form-control"
								required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputZip"></label>
							<button class="btn btn-primary btn-block" type="submit" name="register">Search</button>
						</div>
					</div>

				</div>
			</div>
	</div>

</div>
<div class="row col-12">
	<div class="table-responsive text-nowrap">
		<table class="table table-bordered table-sm table-striped" id="drivers">
			<thead>
				<tr>
					<th>S/No</th>
					<th>Model</th>
					<th>No Truck</th>
					<th>Trip</th>
					<th>Tone</th>
					<th>D With Cargo</th>
					<th>D Without Cargo</th>
					<th>KM </th>
					<th>Tone KM</th>
					<th>Full in l</th>
					<th>Full in B</th>
					<th>Perdium</th>
					<th>Other</th>
					<th>Totla Cost</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 0 ?> @if ($operationsReport->count()> 0) @foreach ($operationsReport as $td)
				<tr>
					<td class='m-1 p-1 text-center'>{{++$no}}</td>
					<td class='m-1 p-1 '>{{$td->name}}</td>
					<td class='m-1 p-1 text-center'>{{$td->no}}</td>
					<td class='m-1 p-1 text-center'>{{$td->Trip }}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->Tone,2)}}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->dwc,2)}}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->dwoc,2)}}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->KM,2)}}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->Tonek,2)}}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->fl,2)}}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->fib,2)}}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->Perdium,2)}}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->other,2)}}</td>
					<td class='m-1 p-1 text-center'>{{ number_format( $td->totla,2)}}</td>

				</tr>

				@endforeach @else
				<tr>
					<td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
				</tr>
				@endif

			</tbody>

			</tbody>
		</table>

		@endsection @section('javascript')
		<script src="{{ asset('js/jquery.dataTables.min.js') }}">
		</script>
		<script>
			$( document ).ready( function () {
				$( '#drivers' ).DataTable();

			} );
		</script>
		@endsection