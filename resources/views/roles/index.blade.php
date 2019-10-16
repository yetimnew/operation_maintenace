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
                        <table class="table table-sm table-hover table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0 ?>
                                @if ($roles->count()> 0)
                                @foreach ($roles as $role)
                                <tr>
                                    <td class='p-1'>{{++$no}}</td>
                                    <td class='p-1'>{{$role->name}}</td>

                                    <td>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>

                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>

                </div>


            </div>
        </div>
    </section>
    @include('master.footer')
    @section('javascript')

    @endsection