window.onload = function() {
    try {
        //pie chart
        var ctx = document.getElementById("userRep");
        var clients = parseInt(document.getElementById('clients').value, 10);
        var drivers =  parseInt(document.getElementById('drivers').value, 10);
        var others =  parseInt(document.getElementById('others').value, 10);
        
        if (ctx) {
          ctx.height = 200;
          var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
              datasets: [{
                data: [clients, drivers, others],
                backgroundColor: [
                  "rgba(150, 93, 255,0.9)",                  
                  "rgba(0, 123, 255,0.5)",
                  "rgba(0,0,0,0.07)"
                ],
                hoverBackgroundColor: [
                  "rgba(150, 93, 255,0.9)",                  
                  "rgba(0, 123, 255,0.5)",
                  "rgba(0,0,0,0.07)"
                ]
    
              }],
              labels: [
                "Clientes",
                "Conductores",
                "Otros"
              ]
            },
            options: {
              legend: {
                position: 'top',
                labels: {
                  fontFamily: 'Poppins'
                }
    
              },
              responsive: true
            }
          });
        }
    
    
      } catch (error) {
        console.log(error);
      }
    
    try {
        var ctxS = document.getElementById("serviceRep");
        var confirmed =  parseInt(document.getElementById('confirmed').value, 10);
        var pendient =  parseInt(document.getElementById('pendient').value, 10);
        var wait =  parseInt(document.getElementById('wait').value, 10);
        var canceled =  parseInt(document.getElementById('canceled').value, 10);
        if (ctxS) {
            ctxS.height = 150;
            var myChart = new Chart(ctxS, {
                type: 'bar',
                defaultFontFamily: 'Poppins',
                data: {
                    labels: ["Servicio"],
                    datasets: [{
                            label: "Confirmados",
                            data: [confirmed],
                            borderColor: "rgb(6, 209, 33)",
                            borderWidth: "0",
                            backgroundColor: "rgb(6, 209, 33)",
                            fontFamily: "Poppins"
                        },
                        {
                            label: "Asignados",
                            data: [pendient],
                            borderColor: "rgb(242, 187, 34)",
                            borderWidth: "0",
                            backgroundColor: "rgb(242, 187, 34)",
                            fontFamily: "Poppins"
                        },
                        {
                            label: "Pendeintes",
                            data: [wait],
                            borderColor: "rgb(247, 94, 34)",
                            borderWidth: "0",
                            backgroundColor: "rgb(247, 94, 34)",
                            fontFamily: "Poppins"
                        },
                        {
                            label: "Cancelados",
                            data: [canceled],
                            borderColor: "rgb(227, 14, 14)",
                            borderWidth: "0",
                            backgroundColor: "rgb(227, 14, 14)",
                            fontFamily: "Poppins"
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }
                }
            });
        }
    } catch (error) {
        console.log(error);
    }
}