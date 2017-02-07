@extends('layouts.admin')
@section('title')
    {{'Listado de medidores'}}
    <?php $menu['catalogos']='medidor'; ?>
@endsection
    @section('style')
        {!! HTML::style('css/plugins/dataTables/dataTables.bootstrap.css') !!}
        {!! HTML::style('css/plugins/dataTables/dataTables.responsive.css') !!}

    @endsection
    @section('content')
        <h3>LISTADO DE LECTURAS</h3>

        @include('lecturacon.partials.filter')

        @include('lecturacon.partials.table')
    @endsection

    @section('script')
        {!! HTML::script('js/plugins/dataTables/jquery.dataTables.js') !!}
        {!! HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') !!}
        {!! HTML::script('js/plugins/dataTables/dataTables.responsive.js') !!}
        {!! HTML::script('js/plugins/dataTables/dataTables.tableTools.min.js') !!}
        {!! HTML::script('js/project/datatable.js') !!}


        @endsection