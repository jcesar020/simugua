@if(count($errors) > 0)
    <script type='text/javascript'>
        //alert('holaa');
        var message_request = "<ul>" ;

        @foreach($errors->all() as $error)
            message_request += "<li>{{$error}}</li>" ;
        @endforeach
        message_request +="</ul>";

   </script>
@endif