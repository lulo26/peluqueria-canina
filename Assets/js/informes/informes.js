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
        function number_format(number, decimals, dec_point, thousands_sep) {
          // *     example: number_format(1234.56, 2, ',', ' ');
          // *     return: '1 234,56'
          number = (number + "").replace(",", "").replace(" ", "");
          var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
            dec = typeof dec_point === "undefined" ? "." : dec_point,
            s = "",
            toFixedFix = function (n, prec) {
              var k = Math.pow(10, prec);
              return "" + Math.round(n * k) / k;
            };
          // Fix for IE parseFloat(0.55).toFixed(0) = 0;
          s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
          if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
          }
          if ((s[1] || "").length < prec) {
            s[1] = s[1] || "";
            s[1] += new Array(prec - s[1].length + 1).join("0");
          }
          return s.join(dec);
        }

        var chartdata = {
          labels: agrupa,
          datasets: [
            {
              fill: true,
              data: total,
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
                    max: 15000,
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
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
      },
    });
  });
});
