$(function(){



   //var barData = {
   //     labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun"],
   //     datasets: [
   //         {
   //             label: "Consumo del ano 2016",
   //             fillColor: "rgba(26,179,148,0.5)",
   //             strokeColor: "rgba(26,179,148,0.8)",
   //             highlightFill: "rgba(26,179,148,0.75)",
   //             highlightStroke: "rgba(26,179,148,1)",
   //             data: [8, 11, 15, 12, 13, 8]
   //         }
   //     ]
   // };

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
