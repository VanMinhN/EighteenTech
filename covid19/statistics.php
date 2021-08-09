<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.1/papaparse.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.js"></script>
<script>
  var info_data;
  var Country_Labels, active_cases, death_cases, Recovered_cases;
  var activeLen;
  
 
  var date = new Date();


function returnYYYYMMDD(date){
  let d = new Date();
  d.setDate(d.getDate() + date);
  const month = d.getMonth() < 9 ? '0' + (d.getMonth() + 1) : d.getMonth() + 1;
  const day = d.getDate() < 10 ? '0' + d.getDate() : d.getDate();
  return `${month}-${day}-${d.getFullYear()}`;
}

var yesterdayDate = returnYYYYMMDD(-10);
var todaysDate = returnYYYYMMDD(0);

console.log(yesterdayDate); // returns yesterday
console.log(todaysDate); // returns today

  var file = 'https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_daily_reports/' + yesterdayDate + '.csv';
  console.log(file)
  fetch(file).then(res => res.text())
    .then(file = file)
    .then(console.log(file))
    .then(data => console.log(data))
  Papa.parse(file,{
            header: true,
            download: true,
            dynamicTyping: true,
            complete: function(results){
                console.log(typeof results.data);
                info_data = JSON.stringify(results);
                console.log(results);
                console.log(results.data[0].Country_Region);
                console.log(results.data[0].Active);
                console.log(results.data[0].Death);
                country(results.data);
                death(results.data);
                Recovered(results.data);
              }
        }
    );
  console.log(info_data);
</script>
<link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name?>.css">
<script>
function dynamicColors(){
  var r = Math.floor(Math.random() * 255);
  var g = Math.floor(Math.random() * 255);
  var b = Math.floor(Math.random() * 255);
  return "rgba(" + r + "," + g + "," + b + ", 0.5";
}
function poolColors(a){
  var pool = [];
  for(i = 0; i<a; i++){
    pool.push(dynamicColors());
  }
  return pool;
}


</script>

<br>
<br>


<script>
       document.write("Our dataset is LIVE that is updated weekly");
       document.write("<br>");
       document.write("Our dataset is based of this Github Repo https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_daily_reports")
       document.write("<br>");
       document.write("Dataset Auto Refreshed Date: " + yesterdayDate);
  </script>
<div style="margin-top: 30px;">
  <canvas id="activeChart" width="800"  height="800" overflow="scroll"></canvas>
<script>
  
function country(results){
  const Country_Labels = $.unique(results.map(function(e) {
  return e.Country_Region;
  }));
  active_cases = results.map(function(e) {
    return (e.Active);
  });
  console.log(active_cases)
  console.log(Country_Labels);
  //graph for active cases
  var ctx = document.getElementById("activeChart").getContext("2d");
  var config =  {
    type: 'pie',
    data: {
        labels: Country_Labels,
        datasets: [{
            label:"active",
            data: active_cases,
            backgroundColor: poolColors(active_cases.length),
            fillColor:  poolColors(active_cases.length),
            borderWidth: 1
          }]
        },
    options: {
        responsive: false,
        scaleShowValues: true,
        scales: {
            xAxes: [{
                display: false,
                ticks: {
                  autoSkip: false
                }
              }],
            yAxes: [{
                ticks: {
                        ticks: {
                          suggestedMax: 100,
                          suggestedMin: -10
                        }
                      }
                    }]
                  },
       plugins: {
           legend:{
               display: true,
               position: 'bottom',
               overflow: 'scroll'

           },
           title: {
               display: true,
               text: "Active Coronavirus cases by Country"
           }
       }
    },
  };
  var chart = new Chart(ctx, config);
}
</script>

  <br><br>
  <canvas id="deathChart" width="800"  height="500" overflow="scroll"></canvas>
  <script>
    function death(results){
      const Country_Labels1 = $.unique(results.map(function(e) {
      return e.Country_Region;
      }));
      death_cases = results.map(function(e) {
        return (e.Deaths);
      });
      console.log(Country_Labels1);
      //graph for death cases
      var ctx1 = document.getElementById("deathChart").getContext("2d");
      var config1 =  {
        type: 'bar',
        data: {
          labels: Country_Labels1,
          datasets: [{
            label:"Death",
            data: death_cases,
            backgroundColor: poolColors(death_cases.length),
            fillColor:  poolColors(death_cases.length),
            borderWidth: 1
          }]
        },
        options: {
          responsive: false,
          scaleShowValues: true,
          scales: {
            xAxes: [{
                display: false,
                ticks: {
                  autoSkip: false
                }
              }],
            yAxes: [{
                ticks: {
                  ticks: {
                    suggestedMax: 100,
                    suggestedMin: -10
                  }
                }
              }]
            },
          plugins: {
            legend:{
               display: true,
               position: 'bottom',
               overflow: 'scroll'
             },
             title: {
               display: true,
               text: "Death Coronavirus cases by Country"
             }
           }
         },
       };
       var chart1 = new Chart(ctx1, config1);
     }
   </script>
    <br><br>
    <canvas id="recoveryChart" width="800"  height="500" overflow="scroll"></canvas>
    <script>
      function Recovered(results){
        const Country_Labels = $.unique(results.map(function(e) {
          return e.Country_Region;
        }));
        recovery_cases = results.map(function(e) {
          return (e.Recovered);
        });
        console.log(active_cases.length)
        console.log(Country_Labels);
        //graph for active cases
        var ctx = document.getElementById("recoveryChart").getContext("2d");
        var config =  {
          type: 'doughnut',
          data: {
            labels: Country_Labels,
            datasets: [{
              label:"Recovery",
              data: active_cases,
              backgroundColor: poolColors(recovery_cases.length),
              fillColor:  poolColors(recovery_cases.length),
              borderWidth: 1
            }]
          },
          options: {
            responsive: false,
            scaleShowValues: true,
            scales: {
              xAxes: [{
                display: false,
                ticks: {
                  autoSkip: false
                }
              }],
              yAxes: [{
                ticks: {
                  ticks: {
                    suggestedMax: 100,
                    suggestedMin: -10
                  }
                }
              }]
            },
            plugins: {
              legend:{
                display: true,
                position: 'bottom',
                overflow: 'scroll'

              },
              title: {
                display: true,
                text: "Recovered Coronavirus cases by Country"
              }
            }
          },
        };
        var chart = new Chart(ctx, config);
      }
    </script>
</div>
