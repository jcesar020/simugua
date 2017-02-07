@if( count( $lectura)>0)
<script>
    //Informacion de los graficos de consumo
    $(function ()
    {
        var barData = {
            labels: <?php echo  json_encode($lectura['labels'], JSON_HEX_QUOT)  ?> ,
            datasets: [
                {
                    label: "Consumo del ano 2016",
                    fillColor: "rgba(26,179,148,0.5)",
                    strokeColor: "rgba(26,179,148,0.8)",
                    highlightFill: "rgba(26,179,148,0.75)",
                    highlightStroke: "rgba(26,179,148,1)",
                    data: <?php echo  json_encode($lectura['values'], JSON_HEX_QUOT) ?>
                }
            ]
        };
        var barOptions = {
            scaleBeginAtZero: true,
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            barShowStroke: true,
            barStrokeWidth: 2,
            barValueSpacing: 5,
            barDatasetSpacing: 1,
            responsive: true
        }
        var ctx = document.getElementById("barChart").getContext("2d");
        var myNewChart = new Chart(ctx).Bar(barData, barOptions);
    })

</script>
@endif