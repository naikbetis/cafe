<div>
  @if(session()->has('error'))
    <script>
        toastr.error("{{Session::get('error')}}");
    </script>
  @endif

  @if(session()->has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
  @endif

  @if(session()->has('warning'))
    <script>
        toastr.warning("{{ Session::get('warning') }}");
    </script>
  @endif

  @if(session()->has('info'))
    <script>
        toastr.info("{{ Session::get('info') }}");
    </script>
  @endif
  
</div>