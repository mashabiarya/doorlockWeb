$.ajax({
  url: base_url + 'dashboard/chart_pegawai_masuk',
  type: 'GET',
  dataType: 'JSON',
  success: function(data) {
    var ctx = document.getElementById("pegawaiBarChart");
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: data.header,
        datasets: [{
          label: "Hari Kehadiran",
          backgroundColor: "#4e73df",
          hoverBackgroundColor: "#2e59d9",
          borderColor: "#4e73df",
          data: data.value,
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'month'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 6
            },
            maxBarThickness: 25,
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: findMax(data.value),
              maxTicksLimit: 5,
              padding: 10,
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: true
        },
        tooltips: {
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
      }
    });

    var ctx2 = document.getElementById("pegawaiPieChart");
    var myPieChart = new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: data.header,
        datasets: [{
          data: data.value,
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: true
        },
        cutoutPercentage: 80,
      },
    });
  },
  failure: function() {
    console.error('Gagal mengambil data');
  }
});

$.ajax({
  url: base_url + 'dashboard/chart_rssi_snr',
  type: 'POST',
  data: {
    mac_mesin: '24:62:AB:FF:7E:1C'
  },
  dataType: 'JSON',
  success: function(data) {
    var ctx = document.getElementById("mesin1AreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: data.header,
        datasets: [{
          label: "RSSI",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: data.value[0],
        },
        {
          label: "SNR",
          lineTension: 0.3,
          backgroundColor: "rgba(28, 200, 138, 0.05)",
          borderColor: "rgba(28, 200, 138, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(28, 200, 138, 1)",
          pointBorderColor: "rgba(28, 200, 138, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(28, 200, 138, 1)",
          pointHoverBorderColor: "rgba(28, 200, 138, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: data.value[1],
        }
      ],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
        }
      }
    });
  },
  failure: function() {
    console.error('Gagal mengambil data');
  }
});

$.ajax({
  url: base_url + 'dashboard/chart_rssi_snr',
  type: 'POST',
  data: {
    mac_mesin: '58:BF:25:8B:EA:2C'
  },
  dataType: 'JSON',
  success: function(data) {
    var ctx = document.getElementById("mesin2AreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: data.header,
        datasets: [{
          label: "RSSI",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: data.value[0],
        },
        {
          label: "SNR",
          lineTension: 0.3,
          backgroundColor: "rgba(28, 200, 138, 0.05)",
          borderColor: "rgba(28, 200, 138, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(28, 200, 138, 1)",
          pointBorderColor: "rgba(28, 200, 138, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(28, 200, 138, 1)",
          pointHoverBorderColor: "rgba(28, 200, 138, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: data.value[1],
        }
      ],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
        }
      }
    });
  },
  failure: function() {
    console.error('Gagal mengambil data');
  }
});

function findMax(array) {
  var max = 0;
  for (var i = 0; i < array.length; i++) {
    if (max < array[i]) max = array[i];
  }
  return max;
}