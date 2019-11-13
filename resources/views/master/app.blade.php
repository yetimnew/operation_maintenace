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

                @yield('content')


            </div>
        </div>
    </section>
    @include('master.footer')
    @section('javascript')

    @endsection