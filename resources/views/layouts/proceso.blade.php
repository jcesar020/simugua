<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 13:14:14 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SimuAagua | @yield('title')</title>

    {!!Html::Style('css/bootstrap.min.css')!!}
    {!!Html::Style('font-awesome/css/font-awesome.css')!!}
    @yield('style')

    {!!Html::Style('css/animate.css')!!}
    {!!Html::Style('css/style.css')!!}
    {!!Html::Style('css/mystyle.css')!!}
</head>

<body class="">
    <div id="wrapper">


        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    @include('layouts.partials.nav-header-center')
                   @include('layouts.partials.nav-top-right')
                </nav>
            </div>
           <!-- <div class="row wrapper border-bottom white-bg page-heading"></div> -->
            @include('alerts.success')
            <div class="wrapper wrapper-content">
                @yield('content')
            </div>

            <!-- -->
            @include('layouts.partials.footer')
        </div>

    </div>

    <!-- Mainly scripts -->

    {!!Html::script('js/jquery-2.1.1.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/plugins/metisMenu/jquery.metisMenu.js')!!}
    {!!Html::script('js/plugins/slimscroll/jquery.slimscroll.min.js')!!}

    <!-- Custom and plugin javascript  -->
    @yield('script')

    <!-- Custom and plugin javascript -->
    {!!Html::script('js/inspinia.js')!!}
    {!!Html::script('js/plugins/pace/pace.min.js')!!}
</body>
</html>
