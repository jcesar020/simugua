<p></p>
<div class="table-responsive">
    <!-- <table class="table table-striped table-bordered table-hover dataTables-example" > -->
    <table class="table table-striped table-bordered table-hover ">
        <thead>
        <tr>
            <th>SECTOR</th>
            <th>DESCRIPCION</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sectores as $sector)
            <tr>
                <td>{{$sector->sector}}</td>
                <td>{{$sector->descripcion}}</td>
                <td>{!! link_to_route('sector.edit', $title="Editar", $parameters=$sector->id, $attributes=['class'=>'btn btn-primary']) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>