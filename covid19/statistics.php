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
    
      var info_data;
      var file = 'https://raw.githubusercontent.com/CSSEGISandData/COVID-19/master/csse_covid_19_data/csse_covid_19_daily_reports/01-01-2021.csv';
//       function doStuff(data) {
//     //Data is usable here
//     console.log( data);
//     console.log(JSON.parse(data));
    
//     const Country_Labels = $.unique(data.map(function(e) {
//         console.log(e.Country_Region);
//     return e.Country_Region;
//  }));
// console.log(Country_Labels);

// }

// function parseData(url, callBack) {
//     Papa.parse(url, {
//         download: true,
//         dynamicTyping: true,
//         complete: function(results) {
//             callBack(results.data);
//             console.log(results.data);
//         }
//     });
// }

// parseData(file, doStuff);

// var Country_Labels, new_active, death_cases, Recovered_cases;;
var Country_Labels, active_cases, death_cases, Recovered_cases;
var activeLen;
      
      Papa.parse(file, 
        {
            header: true,
            download: true,
            dynamicTyping: true,
            complete: function(results){
                console.log(typeof results.data);
                
                info_data = JSON.stringify(results);
                console.log(results);
                console.log(results.data[0].Country_Region);
                // Country_Lables = country(results.data);
                // console.log(Country_Labels);
                // death_cases =  death_cases(results.data);
                // Recovered_cases = Recovered_cases(results.data);
                // new_active = activeCases(results.data);
                country(results.data);
                death(results.data);
                Recovered(results.data);
               
        //        death_cases(results.data);
        //      Recovered_cases(results.data);
        //  activeCases(results.data);
                
               
                
            }
        }
      );
      console.log(info_data);

    
    
  </script>

                <link id="ThemeStyle" rel="stylesheet" href="./css/<?= $themefile_name?>.css">
  </head>
	<body >
	<div>
	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."navbar.php"); ?>
	</div>

    <script>
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

 


        </script>
   <canvas id="activeChart" width="800"  height="800" overflow="scroll"></canvas>
<script>

    function country(results)
    {
      const Country_Labels = $.unique(results.map(function(e) {
    return e.Country_Region;

    
 }));

 active_cases = results.map(function(e) {
    
    
    return (e.Active);

 });

 console.log(active_cases.length)
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

}






    </script>
    
	 
		<div>
      <br>
      <br>
      <canvas id="deathChart" width="800"  height="500" overflow="scroll"></canvas>
      <script>

    function death(results)
    {
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
               text: "Death Cornavirus cases by Country"
           }
       }

    },
   
   


   
};

var chart1 = new Chart(ctx1, config1);

}



    </script>

          <br>
          <br>

          <canvas id="recoveryChart" width="800"  height="500" overflow="scroll"></canvas>
          <script>

function Recovered(results)
{
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
           text: "Recovered Cornavirus cases by Country"
       }
   }

},





};

var chart = new Chart(ctx, config);

}






</script>


      <br>
	<?php include($IPATH."footer.html"); ?> <!-- Footer -->
		</div>
<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.4.1.js"></script>
	</body>
</html>
