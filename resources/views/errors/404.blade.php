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

                <h2> Page not Found </h2>
                <br> <br>
                <p> Sorry, the page you are looking could't be found</p>

            </div>
        </div>
    </section>
    @include('master.footer')
    @section('javascript')

    @endsection