console.log("hello world");


document.addEventListener("DOMContentLoaded", (e) => {
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
        
        

        var ctx = document.getElementById("myChart").getContext("2d");

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
              backgroundColor: "#4e73df",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#4e73df",
            },
          ],
        };
        // Bar Chart Example
        var ctx = document.getElementById("myChart");
        var myBarChart = new Chart(ctx, {
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
                    callback: function(value, index) {
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
});
