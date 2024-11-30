console.log("hello world");
//chartRazas
function chartRazasMascotas() {
  $(document).ready(function () {
    $.ajax({
      url: `${base_url}/informes/getCharts`,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      method: "GET",
      success: function (data) {
        console.log(data); // Agregado para depuración

        var agrupa = [];
        var total = [];

        for (var i in data) {
          agrupa.push(data[i].agrupa);
          total.push(data[i].total);
        }

        var ctx = document.getElementById("chartRazas").getContext("2d");

        if (!ctx) {
          console.log(
            "Failed to get context. Ensure the canvas element is present and has the correct ID."
          );
          return;
        }

        var chartdata = {
          labels: agrupa,
          datasets: [
            {
              label: "razas de mascotas",
              fill: true,
              data: total,
              backgroundColor: ["#ff6384", "#36a2eb", "#cc65fe", "#ffce56"],
              hoverBackgroundColor: [
                "#E83F58",
                "#2989E3",
                "#AC52F3",
                "#EDA734",
              ],
              borderColor: ["#E83F58", "#2989E3", "#AC52F3", "#EDA734"],
            },
          ],
        };
        // Bar Chart Example
        var ctx = document.getElementById("chartRazas");
        var chartRazas = new Chart(ctx, {
          type: "bar",
          data: chartdata,
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0,
              },
            },
            scales: {
              xAxes: [
                {
                  time: {
                    unit: "month",
                  },
                  gridLines: {
                    display: false,
                    drawBorder: false,
                  },
                  ticks: {
                    maxTicksLimit: 6,
                  },
                  maxBarThickness: 25,
                },
              ],
              yAxes: [
                {
                  ticks: {
                    min: 0,
                    max: total.length,
                    maxTicksLimit: 3,
                    callback: function (value, index) {
                      return value;
                    },
                    padding: 10,
                  },
                  gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2],
                  },
                },
              ],
            },
            legend: {
              display: false,
            },
            tooltips: {
              titleMarginBottom: 10,
              titleFontColor: "#6e707e",
              titleFontSize: 14,
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: "#dddfeb",
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
          },
        });
        console.log(total);
      },
    });
  });
}

function getRandomColor() {
  //generates random colours and puts them in string
  var colors = [];
  for (var i = 0; i < 3; i++) {
    var letters = "0123456789ABCDEF".split("");
    var color = "#";
    for (var x = 0; x < 6; x++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    colors.push(color);
  }
  return colors;
}

//chartMascotas
function chartMostrarMascotas() {
  $(document).ready(function () {
    $.ajax({
      url: `${base_url}/informes/getCharts`,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      method: "GET",
      success: function (data) {
        console.log(data); // Agregado para depuración

        var agrupa = [];
        var total = [];

        for (var i in data) {
          agrupa.push(data[i].agrupa);
          total.push(data[i].total);
        }

        var ctx = document.getElementById("chartMascotas").getContext("2d");

        if (!ctx) {
          console.log(
            "Failed to get context. Ensure the canvas element is present and has the correct ID."
          );
          return;
        }

        var chartdata = {
          labels: agrupa,
          datasets: [
            {
              label: "razas de mascotas",
              fill: true,
              data: total,
              backgroundColor: ["#ff6384", "#36a2eb", "#cc65fe", "#ffce56"],
              hoverBackgroundColor: [
                "#E83F58",
                "#2989E3",
                "#AC52F3",
                "#EDA734",
              ],
              borderColor: ["#E83F58", "#2989E3", "#AC52F3", "#EDA734"],
            },
          ],
        };
        (Chart.defaults.global.defaultFontFamily = "Nunito"),
          '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = "#858796";
        console.log("hey this", chartdata);

        // Pie Chart Example
        var ctx = document.getElementById("chartMascotas");
        var chartMascotas = new Chart(ctx, {
          type: "doughnut",
          data: chartdata,
          options: {
            maintainAspectRatio: false,
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: "#dddfeb",
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
            legend: {
              display: false,
            },
            cutoutPercentage: 80,
          },
        });
      },
    });
  });
}

document.addEventListener("DOMContentLoaded", (e) => {
  chartRazasMascotas();
  chartMostrarMascotas();
});
