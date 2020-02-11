@extends( 'master.app' )
@section( 'title', 'TIMS | Performance show' )

 @section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Performance</li>
	<li class="breadcrumb-item active">Show</li>
</ol>


<div class="col-md-12">
	<div class="card text-left">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>Performances of {{$performance->FOnumber}} </h2><div class="ml-auto">
					<a href="{{route('performace')}}" class="btn btn-outline-primary"> <i class="fa fa-backward mr-1"
							aria-hidden="true"> Back</i> </a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Fo Number</label>
						<div class="col-lg-8">
							<h4 class="col-form-label ">{{$performance->FOnumber}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Is that a Trip?</label>
						<div class="col-lg-8">
							@if ($performance->trip == 1)
							<h4 class="col-form-label ">Yes </h4>
							@endif
							@if ($performance->trip == 0)
							<h4 class="col-form-label ">No</h4>
							@endif
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Load Type</label>
						<div class="col-lg-8">
							@if ($performance->LoadType == 0)
							<h4 class="col-form-label ">Return Load</h4>
							@endif
							@if ($performance->LoadType == 1)
							<h4 class="col-form-label ">Main Load</h4>
							@endif
						</div>
					</div>
					
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Operation ID</label>
						<div class="col-lg-8">
							<h4 class="col-form-label ">{{$performance->operation->operationid}}</h4>
						</div>
					</div>
					@foreach ($driver_detail as $d)
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Driver Id</label>
						<div class="col-lg-8">
							<h4 class="col-form-label ">{{($d->driverid)}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Driver Name</label>
						<div class="col-lg-8">
							<h4 class="col-form-label ">{{($d->name)}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Plate Number</label>
						<div class="col-lg-8">
							<h4 class="col-form-label ">{{($d->plate)}}</h4>
						</div>
					</div>
					@endforeach
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Date Dispatch</label>
						<div class="col-lg-8">
							<h4 class="col-form-label ">{{$performance->DateDispach}} || {{$performance->created_at->diffForHumans()}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Origin Place</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0">{{$performance->orgion->name}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Destination Place</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{$performance->destination->name}}</h4>
						</div>
					</div>
			
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Distance with Cargo</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{number_format($performance->DistanceWOCargo,2)}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Distance without Cargo</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{number_format($performance->DistanceWOCargo,2)}}</h4>
						</div>
					</div>
		
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Load by Tone</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{number_format($performance->CargoVolumMT,2)}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Tone KM</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{number_format($performance->tonkm,2)}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Fuel by Litter</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{number_format($performance->fuelInLitter,2)}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Fuel by Birr</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{number_format($performance->fuelInBirr,2)}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Perdum</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{number_format($performance->perdiem,2)}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Oprational Exp.</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{number_format($performance->workOnGoing,2)}}</h4>
						</div>
					</div>
					
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Current Status</label>
						<div class="col-lg-8">
							@if ($performance->is_returned == 0)
							<h4 class="col-form-label ">Not returned</h4>
							@endif
							@if ($performance->is_returned == 1)
							<h4 class="col-form-label ">Returned</h4>
							@endif
						</div>
					</div>
					@if ($performance->is_returned == 1)
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Returned Date</label>
						<div class="col-lg-8">
							<h4 class="col-form-label m-0 ">{{$performance->returned_date}}</h4>
							
						</div>
					</div>
					@endif
					@if ($performance->is_returned == 1)
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4">Returned After</label>
						<div class="col-lg-8">
							<h4 class="col-form-label m-0 ">{{$difinday}} days or <span>{{$diffinhour}} hours </span> </h4>
						
						</h4>
						</div>
					</div>
					@endif
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Created By</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{$performance->user->name}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Created In</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{$performance->created_at}}  || {{$performance->created_at->diffForHumans()}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Updated In</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{$performance->updated_at }} || {{$performance->updated_at->diffForHumans()}}</h4>
						</div>
					</div>
					<div class="form-group row m-0">
						<label class="col-form-label col-lg-4 m-0">Comment</label>
						<div class="col-lg-8 m-0">
							<h4 class="col-form-label m-0 ">{{$performance->comment}}</h4>
						</div>
					</div>
				</div>
				<div class='m-1 p-1'><a href="{{route('performace.edit',['id'=> $performance->id])}}"
					class="btn btn-info btn-xs"><i class="fa fa-edit"> </i>Edit </a>
				</div>
			<div class='m-1 p-1'>
			<a href="javascript:;" data-toggle="modal" onclick="deleteData({{$performance->id}})" 
				data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
			</div>
		</div>
		</div>	
	</div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
	<div class="modal-dialog ">
	  <!-- Modal content-->
	  <form action="" id="deleteForm" method="post">
		  <div class="modal-content">
			  <div class="modal-header bg-danger">
				  <h4 class="modal-title text-center text-white">DELETE CONFIRMATION</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				  @csrf
				@method('DELETE')
			  <p class="text-center">Are You Sure Want To Delete ?  Fo Number <span class="font-weight-bold"> {{$performance->FOnumber}}</span> </p>
			  </div>
			  <div class="modal-footer">
				  <center>
					  <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					  <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
				  </center>
			  </div>
		  </div>
	  </form>
	</div>
   </div>
  
@endsection
@section('javascript')
<script>
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("performace.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endsection