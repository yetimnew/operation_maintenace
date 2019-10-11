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

		<a href="{{route('performance_by_opration')}}" class="btn btn-primary pull-right">Back</a>
	</div>
	<div class="table-responsive text-nowrap">
		<h2 class="text-center"> Report From {{ $start}} To {{ $end}} For @if($years > 0){{ $years }} Years @endif
			@if($months > 0){{ $months }} Monthes @endif {{ $days}} days </h2>
		<table class="table table-bordered table-sm table-striped table-hover" id="operation_performance">
			<thead>
				<tr>
					<th>S/No</th>
					<th>Operation ID</th>
					<th>Clinate Name</th>
					<th>Start Date</th>
					<th>Cargo Volume</th>
					<th>Lifted Tone </th>
					<th>Remaining Tone</th>
					<th>Cargo Type</th>
					<th>Tariff</th>
					<th>%</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 0 ?>
				@if ($operationsReport->count()> 0)
				@foreach ($operationsReport as $td)
				<tr>
					<td class='m-1 p-1'>{{++$no}}</td>
					<td class='m-1 p-1'>{{$td->operationid}}</td>
					<td class='m-1 p-1'>{{$td->name}}</td>
					<td class='m-1 p-1'>{{$td->stratdate}}</td>
					<td class='m-1 p-1 text-right'>{{number_format($td->Tone_Given,2)}}</td>
					<td class='m-1 p-1 text-right'>{{number_format($td->Tone,2)}}</td>
					<td class='m-1 p-1 text-right'>{{number_format($td->Tone_Given - $td->Tone,2)}}</td>
					@if ($td->cargotype == 1)
					<td class='m-1 p-1 text-center'>Relief</td>
					@else
					<td class='m-1 p-1 text-center'>Commercial</td>

					@endif
					<td class='m-1 p-1'>{{$td->tariff}}</td>
					<td class='m-1 p-1'>{{number_format($td->Tone/$td->Tone_Given ,2)*100}}%</td>
					@if ($td->status == 1)
					<td class='m-1 p-1'> <label class='badge badge-success'>Active </label> || {{$td->enddate}}</td>
					@else
					<td class='m-1 p-1'> <label class='badge badge-danger'>Finished </label> || {{$td->enddate}}</td>

					@endif

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
		<script>
			$( document ).ready( function () {


				$( '#operation_performance' ).DataTable( {
					dom: 'Bfrtip',
					buttons: [
						'excel', 'pdf', 'print'
					]
				} );
			} );
		</script>
		@endsection