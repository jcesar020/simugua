<div ng-controller="ListController" xmlns="http://www.w3.org/1999/html">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h3 class="font-bold no-margins">
                    Detalle de factura
                </h3>

                <div class="">
                    <table class="table table-hover margin bottom">
                        <thead>
                        <tr>
                            <th class="text-center"><strong>No.</strong></th>
                            <th class="text-center">Periodo</th>
                            <th class="text-center">Catalogo</th>
                            <th class="text-center">Concepto</th>
                            <th class="text-center">Cant</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="dispo in factuDisponible">
                            <td>
                                {{--<a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>--}}
                               <input type="checkbox" ng-model="dispo.selected" class="" > </td>
                            <td><%dispo.periodo%></td>
                            <td><%dispo.catalogo_id%></td>
                            <td><%dispo.concepto%></td>
                            <td><%dispo.cant%></td>
                            <td>$<%dispo.precio%></td>
                            <td>$<%dispo.total%></td>
                            <td><a href="#" class=""><i class="fa fa-times-circle " style="font-size: large"></i> </a>
                            </td>
                        </tr>

                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>TOTAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>$25.00</td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>


                <div class="m-t-md">
                    <small class="pull-right">
                    </small>
                    <input type="button" ng-click="remove()" value="Mover">
                    <button class="btn btn-xs btn-default" ng-click="remove()">Mostrar todas</button>
                </div>
                <input type="text" ng-model="pruebadata">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h3 class="font-bold no-margins">
                    Detalle de factura
                </h3>

                <div class="">
                    <table class="table table-hover margin bottom">
                        <thead>
                        <tr>
                            <th class="text-center"><strong>No.</strong></th>
                            <th class="text-center">Periodo</th>
                            <th class="text-center">Catalogo</th>
                            <th class="text-center">Concepto</th>
                            <th class="text-center">Cant</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="dispo in factuSelected">
                            <td>
                                {{--<a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>--}}
                                <input type="checkbox" ng-model="dispo.selected" class="" > </td>
                            <td><%dispo.periodo%></td>
                            <td><%dispo.catalogo_id%></td>
                            <td><%dispo.concepto%></td>
                            <td><%dispo.cant%></td>
                            <td>$<%dispo.precio%></td>
                            <td>$<%dispo.total%></td>
                            <td><a href="#" class=""><i class="fa fa-times-circle " style="font-size: large"></i> </a>
                            </td>
                        </tr>

                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>TOTAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>$25.00</td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>


                <div class="m-t-md">
                    <small class="pull-right">
                    </small>
                    <input type="button" ng-click="remove()" value="Mover">
                    <button class="btn btn-xs btn-default" ng-click="remove()">Mostrar todas</button>
                </div>
                <input type="text" ng-model="pruebadata">
            </div>
        </div>
    </div>
</div>


<script>
    var app = angular.module('simuagua', [], function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    app.controller('ListController', ['$scope', function ($scope) {
        $scope.factuSelected=[];
        $scope.factuDisponible = [
            {
                'periodo': 201606,
                'catalogo_id': 101,
                'concepto': 'MENSUAL',
                'cant': 2,
                'precio': 3.3,
                'total': 6.6

            },
            {
                'periodo': 201607,
                'catalogo_id': 101,
                'concepto': 'MENSUAL',
                'cant': 1,
                'precio': 3,
                'total': 6

            }
        ];
        $scope.pruebadata='probando';

        $scope.remove=function(){

            var newDataList=[];
            var newDataListSel=$scope.factuSelected;
            angular.forEach($scope.factuDisponible, function(selected){
               if(!selected.selected){
                   newDataList.push(selected);
               }else{
                   newDataListSel.push(selected);
               }
            });
            $scope.factuSelected=newDataListSel;
            $scope.factuDisponible=newDataList;
            $scope.pruebadata='removiendo';
        }

    }]);


</script>


