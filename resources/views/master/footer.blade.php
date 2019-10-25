<footer class="main-footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <p>ERTE &copy; 2018</p>
      </div>
      <div class="col-sm-6 text-right">
        <p>Design by <span class="external">Yetimesht T</span></p>

      </div>
    </div>
  </div>
</footer>
</div>
</div>
</div>

</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"> </script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"> </script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"> </script>
<script src="{{ asset('js/datetimepicker.js') }}"> </script>
<script src="{{ asset('js/buttons.flash.min.js') }}"> </script>
<script src="{{ asset('js/jszip.min.js') }}"> </script>
<script src="{{ asset('js/pdfmake.min.js') }}"> </script>
<script src="{{ asset('js/vfs_fonts.js') }}"> </script>
<script src="{{ asset('js/buttons.html5.min.js') }}"> </script>
<script src="{{ asset('js/buttons.print.min.js') }}"> </script>
<script src="{{ asset('js/front.js') }}"> </script>
<script src="{{ asset('js/jquery.cookie.js') }}"> </script>
<script src="{{ asset('js/sweetalert2@8.js') }}"> </script>
<script src="{{ asset('js/custome_validation.js') }}"> </script>
<script src="{{ asset('js/bootstrap-datetimepicker.min') }}"> </script>

<script>
  @if (Session::has('success'))
    toastr.success('{{ Session::get('success')}}');
    @endif
    @if (Session::has('info'))
    toastr.info('{{ Session::get('info')}}');
    @endif
</script>
@include('sweetalert::alert')
@yield('javascript')
</body>

</html>