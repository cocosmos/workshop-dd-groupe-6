$(document).ready(function(){
    $.ajax({
        //Chart get the data from json
        url : "./js/data.json",
        type : "GET",
        success : function(data){
            var user_data = [];
            var data_date = [];

            for(var i in data){
                user_data.push(data[i].user_data);
                data_date.push(data[i].data_date);
            }//chart with chart.js
            var chartdata = {
                labels: data_date,
                datasets: [
                    {
                    label: 'Kg de CO2',
                    data: user_data,
                    borderColor: '#8FD1CA',
                    backgroundColor: '#8FD1CA',
                    }
                ]
            };


            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {     //options fro design       
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: '#0A4754',
                                display: false,
                                lineWidth: 10,
                                footerSpacing:2
                            },
                            
                            ticks: {
                                beginAtZero: true,
                                fontColor: "black",
                                fontSize: 17,
                                
                            },
                            
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false,
                                color: '#0A4754',
                                lineWidth: 10,
                                footerSpacing:2
                            },
                            ticks: {
                                display: true,
                                fontColor: "black",
                                fontSize: 17,
                                
                            },
                        
                        }],          
                    }
                },
            });

        },
    })
})
