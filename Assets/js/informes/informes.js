$(document).ready(function () {
  $.ajax({
    url: "InformesModel.php",
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    method: "GET",
    success: function (data) {
      console.log(data);

      var agrupa = [];
      var total = [];

      for (var i in data) {
        agrupa.push(data[i].agrupa);
        total.push(data[i].total);
      }

      var ctx = document.getElementById("myChart").getContext("2d");

      if (!ctx) {
        console.log(
          "Failed to get context. Ensure the canvas element is present and has the correct ID."
        );
        return;
      }

      var gradientStroke = ctx.createLinearGradient(0, 0, 0, 500);
      gradientStroke.addColorStop(0, "rgba(29, 140, 248, 0.6)");
      gradientStroke.addColorStop(0.5, "rgba(29, 140, 248, 0.3)");
      gradientStroke.addColorStop(1, "rgba(29, 140, 248, 0.1)");

      var chartdata = {
        labels: agrupa,
        datasets: [
          {
            fill: true,
            backgroundColor: gradientStroke,
            borderColor: "#1d8cf8",
            borderWidth: 2,
            pointBackgroundColor: "#1d8cf8",
            pointBorderColor: "rgba(255,255,255,0)",
            pointHoverBackgroundColor: "#1d8cf8",
            pointBorderWidth: 20,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 15,
            pointRadius: 4,
            data: total,
          },
        ],
      };

      var show = $("#myChart");

      var grafico = new Chart(mostrar, {
        type: "bar",
        data: chartdata,
        options: {
          maintainAspectRatio: false,
          legend: { display: false },
          tooltips: {
            backgroundColor: "#f5f5f5",
            titleFontColor: "#333",
            bodyFontColor: "#666",
            bodySpacing: 4,
            xPadding: 12,
            mode: "nearest",
            intersect: 0,
            position: "nearest",
          },
          responsive: true,
          scales: {
            yAxes: [
              {
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: true,
                  color: "rgba(29,140,248,0.0)",
                  zeroLineColor: "#1d8cf8",
                },
                ticks: {
                  max: 160000,
                  stepSize: 10000,
                  suggestedMax: 150000,
                  padding: 20,
                  fontColor: "#000000",
                },
              },
            ],
            xAxes: [
              {
                barPercentage: 0.2,
                gridLines: {
                  drawBorder: true,
                  color: "rgba(173, 216, 230, 0.1)",
                  zeroLineColor: "#1d8cf8",
                },
                ticks: {
                  padding: 20,
                  fontColor: "#000000",
                  stepSize: 2,
                },
              },
            ],
          },
        },
      });
    },
    error: function (data) {
      console.log("Error:", data);
    },
  });
});
