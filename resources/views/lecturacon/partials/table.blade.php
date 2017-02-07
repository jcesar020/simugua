

<div class="table-responsive">
    <!-- <table class="table table-striped table-bordered table-hover dataTables-example" > -->

    <table class="table table-striped table-bordered table-hover dataTables-noorder">
        <thead>
        <tr>
            <th>Periodo</th>
            <th>Medidor_id</th>
            <th>FechaIni</th>
            <th>FechaFin</th>
            <th>LecturaIni</th>
            <th>LecturaFin</th>
            <th>Consumo</th>
            <th>Estado</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($lecturas as $lectura)
            <tr>
                <td class="text-center"><strong>{{$lectura->periodo}}</strong></td>
                <td>{{$lectura->medidor_id}}</td>
                <td>{{$lectura->fechaIni}}</td>
                <td>{{$lectura->fechaFin}}</td>
                <td>{{$lectura->lecturaIni}}</td>
                <td>{{$lectura->lecturaFin}}</td>
                <td>{{$lectura->lecturaFin - $lectura->lecturaIni}}</td>
                <td>{{$lectura->estado}}</td>


                <td><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"> Editar</button></td>

            </tr>

        @endforeach
        </tbody>


{{--        <div class="text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Launch demo modal
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Launch demo modal
            </button>
        </div>
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-laptop modal-icon"></i>
                        <h4 class="modal-title">Modal title</h4>
                        <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                    </div>
                    <div class="modal-body">
                        <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.</p>
                        <div class="form-group"><label>Sample Input</label> <input type="email" placeholder="Enter your email" class="form-control"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>--}}

    </table>


</div>
