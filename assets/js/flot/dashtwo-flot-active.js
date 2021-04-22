(function ($) {
    "use strict";


    var ctx = document.getElementById('myChartsrs').getContext("2d");
    var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    var suratperbulan = [
        document.getElementById('bulan1').value,
        document.getElementById('bulan2').value,
        document.getElementById('bulan3').value,
        document.getElementById('bulan4').value,
        document.getElementById('bulan5').value,
        document.getElementById('bulan6').value,
        document.getElementById('bulan7').value,
        document.getElementById('bulan8').value,
        document.getElementById('bulan9').value,
        document.getElementById('bulan10').value,
        document.getElementById('bulan11').value,
        document.getElementById('bulan12').value
    ];
    gradientStroke.addColorStop(0, '#80b6f4');

    gradientStroke.addColorStop(1, '#f49080');

    var myChartsrs = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Januari", "Februari", "Meret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: "Surat Masuk",
                borderColor: gradientStroke,
                pointBorderColor: gradientStroke,
                pointBackgroundColor: gradientStroke,
                pointHoverBackgroundColor: gradientStroke,
                pointHoverBorderColor: gradientStroke,
                pointBorderWidth: 10,
                pointHoverRadius: 10,
                pointHoverBorderWidth: 1,
                pointRadius: 3,
                fill: false,
                borderWidth: 4,
                data: [
                    suratperbulan[0], suratperbulan[1],
                    suratperbulan[2], suratperbulan[3],
                    suratperbulan[4], suratperbulan[5],
                    suratperbulan[6], suratperbulan[7],
                    suratperbulan[8], suratperbulan[9],
                    suratperbulan[10], suratperbulan[11]]
            }]
        },
        options: {

            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold",
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        padding: 20
                    },
                    gridLines: {
                        drawTicks: false,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        zeroLineColor: "transparent"
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold"
                    }
                }]
            }
        }
    });



})(jQuery);          