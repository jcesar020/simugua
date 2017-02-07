<p></p>
<div class="table-responsive">
    <!-- <table class="table table-striped table-bordered table-hover dataTables-example" > -->
    <table class="table table-striped table-bordered table-hover ">
        <thead>
        <tr>
            <th>ZONA</th>
            <th>DESCRIPCION</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($zonas as $zona)
            <tr>
                <td>{{$zona->zona}}</td>
                <td>{{$zona->descripcion}}</td>
                <td>{!! link_to_route('zona.edit', $title="Editar", $parameters=$zona->id, $attributes=['class'=>'btn btn-primary']) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>