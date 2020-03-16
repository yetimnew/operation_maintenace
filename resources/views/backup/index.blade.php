@include('master.head')
@section('styles')
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
@endsection

@include('master.topnav')
<!-- Side Navbar -->
@include('master.sidenav')
<div class="content-inner">

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">

                <div class="row">
                    <div class="col-xs-1-12">

                        <div class="card">
                            <div class="card-header">
	                        @can('backup create')
                                <a id="create-new-backup-button" href="{{ url('backup/create') }}"
                                    class="btn btn-primary pull-right" style="margin-bottom:2em;"><i
                                        class="fa fa-plus"></i>
                                    Create New Backup
                                </a>
                                @endcan 

                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Fiel Name</th>
                                            <th scope="col">Size </th>
                                            <th scope="col">Data</th>
                                            @can('backup download')
                                            <th scope="col">Download</th>
                                            @endcan
                                            @can('backup delete')
                                            <th scope="col">Delete</th>
                                            @endcan
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($backups as $key=> $backup)
                                        <tr>
                                            <td>{{ ++$key}}</td>
                                            <td>{{ $backup['file_name']}}</td>
                                            <td>{{$backup['file_size']}}</td>
                                            <td> {{$backup['last_modified'] }}
                                            </td>   @can('backup download')
                                            <td class="text-right">
                                                <a class="btn btn-xs btn-default"
                                                    href="{{ route('backupDownload', $backup['file_name'])}}"> <i
                                                        class="fa fa-cloud-download"></i> Download</a>
                                            </td>
                                            @endcan
                                            <td>
                                     @can('backup delete')
                                                                                                  
								<form action="{{route('deleteDownload',$backup['file_name'])}}"
									id="deleteDownload" style="display: none" method="POST">
									@csrf
									@method('DELETE')
								</form>
								<button class="btn btn-sm" type="submit" onclick="if(confirm('Are you sure to delete this?')){
								event.preventDefault();
								document.getElementById('deleteDownload').submit();
									}else{
										event.preventDefault();
									}"> <i class="fa fa-trash red"></i> Delete
                                </button>
                                            </td>
                                            @endcan
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>
    @include('master.footer')
    @section('javascript')

    @endsection