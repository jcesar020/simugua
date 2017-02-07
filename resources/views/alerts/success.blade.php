@if(Session::has('message'))
    <script type='text/javascript'>
         var message = "{{ Session::get('message') }}";
    </script>
@endif