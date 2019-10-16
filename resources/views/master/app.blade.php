@include('master.head')
@include('master.topnav')
<!-- Side Navbar -->
@if (Auth::check())
@include('master.sidenav')
@endif

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