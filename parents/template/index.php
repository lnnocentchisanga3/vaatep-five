<?php
session_start();
require 'config.php';
if (isset($_SESSION['child_number'])) {
  $get_child = mysqli_query($con, "SELECT * FROM child_account");
  $child = mysqli_fetch_array($get_child);
  $_SESSION['email'] = $child['email'];
  $_SESSION['phone'] = $child['phone'];



  $get_info = mysqli_query($con, "SELECT * FROM childrecords WHERE childs_number='$_SESSION[child_number]' ");
  $info = mysqli_fetch_array($get_info);

 /* print_r($info);*/

  /*foreach ($info as $value) {
  echo "$value <br>";
  }*/

 /* foreach($info as $x => $val) {
  echo "$x = $val<br>";
}*/

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Vaatep five</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

    <!-- custom css -->
    <style>
      /* width */
      ::-webkit-scrollbar {
        width: 12px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        border-radius: 1rem;
        background: #6600cc;
        opacity: 0.7;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }

      .active{
        color: #6600cc;
        text-decoration: underline;
      }

      /*.myDivToPrint{
        background: linear-gradient(to bottom, rgba(255,255,255,0.3), rgba(255,255,255,0.5)),url("../img/under4.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }*/



      @media print{
    .myDivToPrint{
        background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1));
        background-size: cover;
        background-repeat: no-repeat;
        background-position: right top;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
}
    </style>
    <script>
      /*function ShowLink(value){
        document.getElementById("linkShow").className = "active";
      }*/
    </script>

  </head>
  <body>
    <?php require 'header.php';?>

    <?php
    if (isset($_GET['page'])) {
       $page = $_GET['page'];

       if ($page == "dashboard") {
         require 'dashboard.php';
       }elseif ($page == "weight") {
         require 'weight.php';
       }elseif ($page == "others") {
         require 'others.php';
       }elseif ($page == "settings") {
         require 'settings.php';
       }elseif ($page == "vitamis") {
         require 'vitamins.php';
       }
     } 
    ?>
    

    <div class="az-footer py-2">
      <div class="container ht-100p pd-t-0-f">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Vaatep five</span>
      </div><!-- container -->
    </div><!-- az-footer -->


    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>
    <script src="../lib/peity/jquery.peity.min.js"></script>

    <script src="../js/azia.js"></script>
    <script src="../js/chart.flot.sampledata.js"></script>
    <script src="../js/dashboard.sampledata.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script>
      $(function(){
        'use strict'

    		var plot = $.plot('#flotChart', [{
          data: flotSampleData3,
          color: '#007bff',
          lines: {
            fillColor: { colors: [{ opacity: 0 }, { opacity: 0.2 }]}
          }
        },{
          data: flotSampleData4,
          color: '#560bd0',
          lines: {
            fillColor: { colors: [{ opacity: 0 }, { opacity: 0.2 }]}
          }
        }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 8
          },
    			yaxis: {
            show: true,
    				min: 0,
    				max: 100,
            ticks: [[0,''],[20,'20K'],[40,'40K'],[60,'60K'],[80,'80K']],
            tickColor: '#eee'
    			},
    			xaxis: {
            show: true,
            color: '#fff',
            ticks: [[25,'OCT 21'],[75,'OCT 22'],[100,'OCT 23'],[125,'OCT 24']],
          }
        });

        $.plot('#flotChart1', [{
          data: dashData2,
          color: '#00cccc'
        }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.2 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 35
          },
    			xaxis: {
            show: false,
            max: 40
          }
    		});

        $.plot('#flotChart2', [{
          data: dashData2,
          color: '#007bff'
        }], {
    			series: {
    				shadowSize: 0,
            bars: {
              show: true,
              lineWidth: 0,
              fill: 1,
              barWidth: .5
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 35
          },
    			xaxis: {
            show: false,
            max: 20
          }
    		});


        //-------------------------------------------------------------//


        // Line chart
        $('.peity-line').peity('line');

        // Bar charts
        $('.peity-bar').peity('bar');

        // Bar charts
        $('.peity-donut').peity('donut');

        var ctx5 = document.getElementById('chartBar5').getContext('2d');
        new Chart(ctx5, {
          type: 'bar',
          data: {
            labels: [0,1,2,3,4,5,6,7],
            datasets: [{
              data: [2, 4, 10, 20, 45, 40, 35, 18],
              backgroundColor: '#560bd0'
            }, {
              data: [3, 6, 15, 35, 50, 45, 35, 25],
              backgroundColor: '#cad0e8'
            }]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              enabled: false
            },
            legend: {
              display: false,
                labels: {
                  display: false
                }
            },
            scales: {
              yAxes: [{
                display: false,
                ticks: {
                  beginAtZero:true,
                  fontSize: 11,
                  max: 80
                }
              }],
              xAxes: [{
                barPercentage: 0.6,
                gridLines: {
                  color: 'rgba(0,0,0,0.08)'
                },
                ticks: {
                  beginAtZero:true,
                  fontSize: 11,
                  display: false
                }
              }]
            }
          }
        });

        // Donut Chart
        var datapie = {
          labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
          datasets: [{
            data: [25,20,30,15,10],
            backgroundColor: ['#6f42c1', '#007bff','#17a2b8','#00cccc','#adb2bd']
          }]
        };

        var optionpie = {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
            display: false,
          },
          animation: {
            animateScale: true,
            animateRotate: true
          }
        };

        // For a doughnut chart
        var ctxpie= document.getElementById('chartDonut');
        var myPieChart6 = new Chart(ctxpie, {
          type: 'doughnut',
          data: datapie,
          options: optionpie
        });

      });

var date = new Date();
var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";

document.getElementById('TodayDate').innerHTML = month[date.getMonth()]+" "+ date.getDay()+" ,"+date.getFullYear();
    </script>
  </body>
</html>
<?php
}else{
  header("location: ../auth.php");
}

?>
