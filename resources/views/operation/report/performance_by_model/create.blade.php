@extends( 'master.app' )
@section( 'title', 'TIMS | Performance By Driver' )

@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}"> @endsection @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item"><a href="#">Report</a>
	</li>
	<li class="breadcrumb-item active">Performance By Driver</li>
</ol>

<div class="row col-12">
	<div class="col-12 mb-3">

		<a href="{{route('performance_by_driver')}}" class="btn btn-primary pull-right">Back</a>
	</div>
	<div class="table-responsive text-nowrap">
		<h2 class="text-center"> Report From {{ $start}} To {{ $end}} For @if($years > 0){{ $years }} Years @endif
			@if($months > 0){{ $months }} Monthes @endif {{ $days}} days </h2>
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
				<?php $no = 0 ?>
				@if ($tds->count()> 0)
				@foreach ($tds as $td)
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

		@endsection
		@section('javascript')
		<script>
			$( document ).ready( function () {


				$( '#drivers' ).DataTable( {
					dom: 'Bfrtip',
					buttons: [
						'excel', 'pdf', 'print'
					]
				} );
			} );
		</script>
		@endsection