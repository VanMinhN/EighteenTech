<?php
?>
<!DOCTYPE html>
<html>
<head>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>EighteenTech: Statistics </title>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.1/papaparse.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.js"></script>
  <script type="text/javascript" src='../covid19/draw_charts.js'> </script>
 <script>
    
      var data;
      var file = '../covid19/covid_data.csv';
      Papa.parse(file, 
        {
            header: true,
            download: true,
            dynamicTyping: true,
            complete: function(results){
                console.log(results);
                data = results.data;
            }
        }
      );
      console.log(data);
    
  </script>

                <link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name?>.css">
  </head>
	<body >
	<div>
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
	</div>

    
   <canvas id="activeChart" width="800"  height="800" overflow="scroll"></canvas>
<script>
      const Country_Labels = $.unique(json_file.data.map(function(e) {
    return e.Country_Region;
 }));
 console.log(Country_Labels);
 
 const death_cases = json_file.data.map(function(e) {
     
     return (e.Deaths);
 
  });

  const Recovered_cases = json_file.data.map(function(e) {
     
     return (e.Recovered);
 
  });

 const active_cases = json_file.data.map(function(e) {
     
    return (e.Active);

 });

 active_Cases = jQuery.grep(active_cases, function( n, i ) {
  return n>=0;
});

var new_active = active_cases.filter(function(v){return v!==''});
 console.log(new_active);

 function dynamicColors(){
     var r = Math.floor(Math.random() * 255);
     var g = Math.floor(Math.random() * 255);
     var b = Math.floor(Math.random() * 255);

     return "rgba(" + r + "," + g + "," + b + ", 0.5";
 }
 
 function poolColors(a)
 {
     var pool = [];
     for(i = 0; i<a; i++)
     {
         pool.push(dynamicColors());
     }
     return pool;
 }

//graph for active cases
var ctx = document.getElementById("activeChart").getContext("2d");

var config =  {
    type: 'pie',
    data: {
        labels: Country_Labels,
        datasets: [{
            label:"active",
            data: new_active,
            backgroundColor: poolColors(new_active.length),
            fillColor:  poolColors(new_active.length),
            borderWidth: 1
        },
    
    
    ]
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
               text: "Active Cornavirus cases by Country"
           }
       }

    },
   
   


   
};

var chart = new Chart(ctx, config);

    </script>
	 
		<div>
      <br>
      <br>
      <canvas id="deathChart" width="800"  height="500" overflow="scroll"></canvas>
      <script>
            //graph for active cases
var ctx = document.getElementById("deathChart").getContext("2d");

var config =  {
    type: 'bar',
    data: {
        labels: Country_Labels,
        datasets: [{
            label:"Death By Country",
            data: death_cases,
            backgroundColor: poolColors(death_cases.length),
            fillColor:  poolColors(death_cases.length),
            borderWidth: 1
        },
    
    
    ]
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
               text: " Cornavirus Deaths by Country"
           }
       }

    },
   
   


   
};

var chart = new Chart(ctx, config);
          </script>

          <br>
          <br>

          <canvas id="recoveryChart" width="800"  height="500" overflow="scroll"></canvas>
      <script>
            //graph for active cases
var ctx = document.getElementById("recoveryChart").getContext("2d");

var config =  {
    type: 'bar',
    data: {
        labels: Country_Labels,
        datasets: [{
            label:"Recovery By Country",
            data: Recovered_cases,
            backgroundColor: poolColors(Recovered_cases.length),
            fillColor:  poolColors(Recovered_cases.length),
            borderWidth: 1
        },
    
    
    ]
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
               text: " Cornavirus Recovery by Country"
           }
       }

    },
   
   


   
};

var chart = new Chart(ctx, config);
          </script>

      <br>
	<?php include($IPATH."footer.html"); ?> <!-- Footer -->
		</div>
<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
	</body>
</html>
