@if(Session::has('message-error'))
    <script type='text/javascript'>
        var message_error = "{{ Session::get('message-error') }}";
    </script>
@endif