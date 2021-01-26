
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('main')}}/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('main')}}/js/popper.min.js"></script>
    <script src="{{asset('main')}}/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('main')}}/js/jquery.slimscroll.min.js"></script>

    <!-- Select2 JS -->
    <script src="{{asset('main')}}/js/select2.min.js"></script>

    <!-- Datetimepicker JS -->
    <script src="{{asset('main')}}/js/moment.min.js"></script>
    <script src="{{asset('main')}}/js/bootstrap-datetimepicker.min.js"></script>


    <!-- Custom JS -->
    <script src="{{asset('main')}}/js/app.js"></script>

    <!-- Datatable JS -->
    <script src="{{asset('main')}}/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('main')}}/js/dataTables.bootstrap4.min.js"></script>

    <!-- Summernote JS -->
    <script src="{{asset('main')}}/plugins/summernote/dist/summernote-bs4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

       <!-- Select2 -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

       <script>
           $('.js-example-basic-single').select2();
       </script>


<script>


@if($msg =Session::get('success'))
 toastr.success("{{ $msg }}" );
        @endif

        @if($msg =Session::get('error'))
         toastr.error("{{ $msg }}" );
        @endif


    @if(count($errors->all()) > 0)
   @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
  @endforeach
    @endif


</script>
    @stack('script')

</body>

</html>
