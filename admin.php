<?php  
session_start();
include_once "database.php";

if( $_SESSION['login'] ==  false){
  header("Location: index.php");
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM fyp_tbl_user");

  $stmt->execute();
  $result = $stmt->fetchAll();
  $total_user = 0;
  $standard_rule_user = 0;
  $adjusted_rule_user = 0;
  $s_perceivable = [];
  $s_operable = [];
  $s_understandable = [];
  $s_robust = [];
  $s_accessibility = [];
  $a_perceivable = [];
  $a_operable = [];
  $a_understandable = [];
  $a_robust = [];
  $a_accessibility = [];



  foreach ($result as $readrow) {
    $total_user +=1;
    if($readrow['fld_rule'] === "standard"){
      $standard_rule_user +=1;
      $s_perceivable[] = $readrow['fld_perceivable'];
      $s_understandable[] = $readrow['fld_understandable'];
      $s_robust[] = $readrow['fld_robust'];
      $s_operable[] = $readrow['fld_operable'];
      $s_accessibility[] = $readrow['fld_accessibility'];

    }elseif ($readrow['fld_rule'] === "adjusted") {
      $adjusted_rule_user +=1;
      $a_perceivable[] = $readrow['fld_perceivable'];
      $a_understandable[] = $readrow['fld_understandable'];
      $a_robust[] = $readrow['fld_robust'];
      $a_operable[] = $readrow['fld_operable'];
      $a_accessibility[] = $readrow['fld_accessibility'];
    }
  }

  function toArray($inputArray){
    $resultArray = [0,0,0,0,0,0,0,0,0,0];

    for($i = 0; $i < 10; $i++){
      for($j = 0; $j < count($inputArray); $j++){
        if(isset($inputArray[$j]) && $inputArray[$j] == $i+1){
          $resultArray[$i] += 1;
        }
      }
    }

    return $resultArray;
  }


  $array_s_per = toArray($s_perceivable);
  $array_s_ope = toArray($s_operable);
  $array_s_und = toArray($s_understandable);
  $array_s_rob = toArray($s_robust);

  $array_a_per = toArray($a_perceivable);
  $array_a_ope = toArray($a_operable);
  $array_a_und = toArray($a_understandable);
  $array_a_rob = toArray($a_robust);


} catch(PDOException $e){
  echo "Error: " . $e->getMessage();
}

$conn = null; 




?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />

 <title>Web Accessibility Evaluate</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="INTEGRITY_VALUE" crossorigin="anonymous">

 <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">  

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>

 <style type="text/css">
   @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

   .fa-2x {
    font-size: 2em;
  }

  .fa {
    position: relative;
    display: table-cell;
    width: 60px;
    height: 36px;
    text-align: center;
    vertical-align: middle;
    font-size:18px;
  }

  body {
    margin: 0;
  }

  .container-fluid {

  }

  .navbar {
    z-index: 1001;
  }

  .main-content {
    margin-top: 10px; /* Adjust the margin-top value to accommodate the navbar height */
    margin-left: 110px;
    margin-right: 50px;
  }

  .main-menu:hover,
  nav.main-menu.expanded {
    width: 250px;
    overflow: visible;
  }

  .main-menu {
    background: #212121;
    border-right: 1px solid #e5e5e5;
    position: fixed;
    top: 56px; /* Adjust the top value to accommodate the navbar height */
    bottom: 0;
    height: 100%;
    left: 0;
    width: 60px;
    overflow: hidden;
    -webkit-transition: width .05s linear;
    transition: width .05s linear;
    -webkit-transform: translateZ(0) scale(1, 1);
    z-index: 1000;
  }

  .main-menu > ul {
    margin: 7px 0;
  }

  .main-menu li {
    position: relative;
    display: block;
    width: 250px;
  }

  .main-menu li > a {
    position: relative;
    display: table;
    border-collapse: collapse;
    border-spacing: 0;
    color: #999;
    font-family: Arial;
    font-size: 14px;
    text-decoration: none;
    -webkit-transform: translateZ(0) scale(1, 1);
    -webkit-transition: all .1s linear;
    transition: all .1s linear;
  }

  .main-menu .nav-icon {
    position: relative;
    display: table-cell;
    width: 60px;
    height: 36px;
    text-align: center;
    vertical-align: middle;
    font-size: 18px;
  }

  .main-menu .nav-text {
    position: relative;
    display: table-cell;
    vertical-align: middle;
    width: 190px;
    font-family: 'Georgia', sans-serif;
  }

  .main-menu > ul.logout {
    position: absolute;
    left: 0;
    bottom: 0;
  }

  .no-touch .scrollable.hover {
    overflow-y: hidden;
  }

  .no-touch .scrollable.hover:hover {
    overflow-y: auto;
    overflow: visible;
  }

  a:hover,
  a:focus {
    text-decoration: none;
  }

  nav {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
  }

  nav ul,
  nav li {
    outline: 0;
    margin: 0;
    padding: 0;
  }

  .main-menu li:hover > a,
  nav.main-menu li.active > a,
  .dropdown-menu > li > a:hover,
  .dropdown-menu > li > a:focus,
  .dropdown-menu > .active > a,
  .dropdown-menu > .active > a:hover,
  .dropdown-menu > .active > a:focus,
  .no-touch .dashboard-page nav.dashboard-menu ul li:hover a,
  .dashboard-page nav.dashboard-menu ul li.active a {
    color: #fff;
    background-color: #000000;
  }

  .area {
    float: left;
    background: #e2e2e2;
    width: 100%;
    height: 100%;
  }

  @font-face {
    font-family: 'Georgia';
    font-style: normal;
    font-weight: 300;

  }


  table.dataTable {
    table-layout: fixed;
    width: 100%;
  }

  table.dataTable td {
    word-wrap: break-word;
    white-space: normal;
  }

  table.dataTable tbody > tr > td {
    padding-top: 4px;
    padding-bottom: 4px;
  }

  .ajusted_table {
    margin-top: 50px;
  }

  // 
  // Fixed dashboard layout
  // 

  .sb-nav-fixed {
    .sb-topnav {
      @extend .fixed-top;
      z-index: $zindex-topnav;
    }

    #layoutSidenav {
      #layoutSidenav_nav {
        @extend .fixed-top;
        width: $sidenav-base-width;
        height: 100vh;
        z-index: $zindex-sidenav;

        .sb-sidenav {
          padding-top: $topnav-base-height;

          .sb-sidenav-menu {
            overflow-y: auto;
          }
        }
      }

      #layoutSidenav_content {
        padding-left: $sidenav-base-width;
        top: $topnav-base-height;
      }
    }
  }


</style>
</head>
<body  class="sb-nav-fixed mb-5">
  <?php include_once 'navbar.php'?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
  <div class="main-content">

    <div class="container-fluid">

      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="page-header text-center"><br>
            <h2>Report</h2>
          </div>
          <br>

          <div class="result_analysis mb-5 card cards ">
            <div class="m-2 row">
              <p><b>Total User : </b> <?php echo $total_user; ?></p>
              <p>User that use <b>standard rule : </b> <?php echo $standard_rule_user; ?></p>
              <p>User that use <b>adjustable rule : </b> <?php echo $adjusted_rule_user; ?></p>
              <hr>

              <div class="sm-6 col">
                <h5>Standard Rule</h5>
                <p><b>Mean Accessibility Rank :</b> <?php echo number_format(array_sum($s_accessibility)/ $standard_rule_user,2); ?></p>
                <p><b>Medium Accessibility Rank :</b> <?php 

                sort($s_accessibility);
                $s_middle = floor(($standard_rule_user-1)/2);

                if($standard_rule_user %2 == 0){
                  $median = ($s_accessibility[$s_middle] + $s_accessibility[$s_middle+1]) /2;
                } else{
                  $median = $s_accessibility[$s_middle];
                }

                echo $median;
                ?></p>

                <p><b>Mode Accessibility Rank: </b> <?php 

                $counts = array_count_values($s_accessibility); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>

              <p>Mode Perceivable Rank: <?php 
              $counts = array_count_values($s_perceivable); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>

              <p>Mode Operable Rank: <?php 
              $counts = array_count_values($s_operable); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>

              <p>Mode Understandable Rank: <?php 
              $counts = array_count_values($s_understandable); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>

              <p>Mode Robust Rank: <?php 
              $counts = array_count_values($s_robust); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>

            </div>

            <div class="sm-6 col">
              <h5>Adjusted Rule</h5>
              <p><b>Mean Accessibility :</b> <?php echo number_format(array_sum($a_accessibility)/ $adjusted_rule_user,2); ?></p>
              <p><b>Medium Accessibility Rank :</b> <?php 

              sort($a_accessibility);
              $a_middle = floor(($adjusted_rule_user-1)/2);

              if($adjusted_rule_user %2 == 0){
                $median = ($a_accessibility[$s_middle] + $a_accessibility[$a_middle+1]) /2;
              } else{
                $median = $a_accessibility[$a_middle];
              }

              echo $median;
              ?></p>

              <p><b>Mode Accessibility Rank : </b> <?php 

                $counts = array_count_values($a_accessibility); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>

              <p>Mode Perceivable Rank: <?php 
              $counts = array_count_values($a_perceivable); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>

              <p>Mode Operable Rank: <?php 
              $counts = array_count_values($a_operable); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>
              
              <p>Mode Understandable Rank: <?php 
              $counts = array_count_values($a_understandable); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>

              <p>Mode Robust Rank: <?php 
              $counts = array_count_values($a_robust); // Count the occurrences of each value
                arsort($counts); // Sort in descending order based on frequency
                $modes = [];
                $maxCount = 0;
                foreach ($counts as $value => $count) {
                  if ($count >= $maxCount) {
                    $modes[] = $value;
                    $maxCount = $count;
                  } else {
                  break; // Stop if frequency decreases
                }
              }
              echo implode(", ", $modes);
              ?></p>



            </div>


          </div>
        </div>
      </div>
    </div> <!-- row -->

    <div>
      <h3 style="text-align: center;" class="mb-3">Standard Rule</h3>   
      <div class="card mb-5">
       <h5 class="card-header">Accessibility Rank</h5>
       <div class="card-body"><canvas id="standard_accessibility" width="100%" height="30"></canvas></div> 
     </div>

     <div class="row mb-3">
       <div class="col-lg-6">
         <div class="card mb-4">
           <h5 class="card-header">Perceivable Rank</h5>
           <div class="card-body"><canvas id="standard_per_chart" width="100%" height="30"></canvas></div>
         </div>
       </div> <!-- col -->
       <div class="col-lg-6">
         <div class="card mb-4">
           <h5 class="card-header">Operable Rank</h5>
           <div class="card-body"><canvas id="standard_ope_chart" width="100%" height="30"></canvas></div>
         </div>
       </div> <!-- col -->


     </div> <!--row -->
     <div class="row">
       <div class="col-lg-6">
         <div class="card mb-4">
           <h5 class="card-header">Understandable Rank</h5>
           <div class="card-body"><canvas id="standard_und_chart" width="100%" height="30"></canvas></div>
         </div>
       </div> <!-- col -->
       <div class="col-lg-6">
         <div class="card mb-4">
           <h5 class="card-header">Robust Rank</h5>
           <div class="card-body"><canvas id="standard_rob_chart" width="100%" height="30"></canvas></div>
         </div>
       </div> <!-- col -->
     </div>

     <hr>
     <br>
     <br>
     <br>

     <h3 style="text-align: center;" class="mb-3">Adjusted Rule</h3>   
     <div class="card mb-5">
       <h5 class="card-header">Accessibility Rank</h5>
       <div class="card-body"><canvas id="adjusted_accessibility" width="100%" height="30"></canvas></div> 
     </div>

     <div class="row mb-3">
       <div class="col-lg-6">
         <div class="card mb-4">
           <h5 class="card-header">Perceivable Rank</h5>
           <div class="card-body"><canvas id="adjusted_per_chart" width="100%" height="30"></canvas></div>
         </div>
       </div> <!-- col -->
       <div class="col-lg-6">
         <div class="card mb-4">
           <h5 class="card-header">Operable Rank</h5>
           <div class="card-body"><canvas id="adjusted_ope_chart" width="100%" height="30"></canvas></div>
         </div>
       </div> <!-- col -->


     </div> <!--row -->
     <div class="row">
       <div class="col-lg-6">
         <div class="card mb-4">
           <h5 class="card-header">Understandable Rank</h5>
           <div class="card-body"><canvas id="adjusted_und_chart" width="100%" height="30"></canvas></div>
         </div>
       </div> <!-- col -->
       <div class="col-lg-6">
         <div class="card mb-4">
           <h5 class="card-header">Robust Rank</h5>
           <div class="card-body"><canvas id="adjusted_rob_chart" width="100%" height="30"></canvas></div>
         </div>
       </div> <!-- col -->
     </div>







   </div><!-- Container Fluid -->



 </div><!-- Main-content -->

 <nav class="main-menu">
  <!-- Sidebar content -->
  <ul>
    <li>
      <a href="#">
        <i class="fa fa-home fa-2x"></i>
        <span class="nav-text">
          Dashboard
        </span>
      </a>

    </li>
    <li class="has-subnav">
      <a href="admin_contact.php">
        <i class="bi bi-inbox-fill fa-2x fa"></i>
        <span class="nav-text">
          User Feedback
        </span>
      </a>
    </li>
    <li class="has-subnav">
      <a href="admin_evaluate_method.php">
        <i class="bi bi-table fa-2x fa"></i>
        <span class="nav-text">
          Evaluate Method
        </span>
      </a>
    </li>
    <li class="has-subnav">
      <a href="admin_standard.php">
        <i class="fas fa-check fa-2x fa"></i>
        <span class="nav-text">
          Standard Rule's User
        </span>
      </a>
    </li>
    <li class="has-subnav">
      <a href="admin_adjusted.php">
        <i class="fas fa-adjust fa-2x fa"></i>
        <span class="nav-text">
          Adjusted Rule's User
        </span>
      </a>
    </li>
  </ul>
</nav>

<script>
  var data_s_accessibility = <?php echo json_encode($s_accessibility); ?>;

  var frequencies_s_accessibility = {};
  data_s_accessibility.forEach(value => {
    frequencies_s_accessibility[value] = (frequencies_s_accessibility[value] || 0) + 1;
  });

        // Create arrays for x-axis (values) and y-axis (frequencies)
        var xValues_s_accessibility = Object.keys(frequencies_s_accessibility);
        var yValues_s_accessibility = Object.values(frequencies_s_accessibility);

        // Create a new chart instance
        var ctx = document.getElementById('standard_accessibility').getContext('2d');
        var chart = new Chart(ctx, {
          type: 'line',
          data: {
                labels: xValues_s_accessibility, // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: yValues_s_accessibility,
                    fill: false, // Disable fill below the line
                    borderColor: 'rgba(0, 123, 255, 1)', // Line color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Value'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true
                      }
                    }
                  }
                }
              });



        // Standard Perceivable

        // Create a new chart instance
        var ctx = document.getElementById('standard_per_chart').getContext('2d');
        console.log(<?php echo json_encode($array_s_per); ?>)
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
                labels: ['1','2','3','4','5','6','7','8','9','10'], // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: <?php echo json_encode($array_s_per); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)', // Bar color
                    borderColor: 'rgba(0, 123, 255, 1)', // Border color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Rank'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true,
                            stepSize: 1 // Set the step size for the y-axis
                          }
                        }
                      }
                    }
                  });


        // Standard Operable
        // Create a new chart instance
        var ctx = document.getElementById('standard_ope_chart').getContext('2d');
        console.log(<?php echo json_encode($array_s_ope); ?>)
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
                labels: ['1','2','3','4','5','6','7','8','9','10'], // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: <?php echo json_encode($array_s_ope); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)', // Bar color
                    borderColor: 'rgba(0, 123, 255, 1)', // Border color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Rank'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true,
                            stepSize: 1 // Set the step size for the y-axis
                          }
                        }
                      }
                    }
                  });


        // Standard Understandable
        // Create a new chart instance
        var ctx = document.getElementById('standard_und_chart').getContext('2d');
        console.log(<?php echo json_encode($array_s_und); ?>)
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
                labels: ['1','2','3','4','5','6','7','8','9','10'], // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: <?php echo json_encode($array_s_und); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)', // Bar color
                    borderColor: 'rgba(0, 123, 255, 1)', // Border color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Rank'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true,
                            stepSize: 1 // Set the step size for the y-axis
                          }
                        }
                      }
                    }
                  });

        // Standard Robust
        // Create a new chart instance
        var ctx = document.getElementById('standard_rob_chart').getContext('2d');
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
                labels: ['1','2','3','4','5','6','7','8','9','10'], // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: <?php echo json_encode($array_s_rob); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)', // Bar color
                    borderColor: 'rgba(0, 123, 255, 1)', // Border color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Rank'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true,
                            stepSize: 1 // Set the step size for the y-axis
                          }
                        }
                      }
                    }
                  });


// Adjusted
var data_a_accessibility = <?php echo json_encode($a_accessibility); ?>;

var frequencies_a_accessibility = {};
data_a_accessibility.forEach(value => {
  frequencies_a_accessibility[value] = (frequencies_a_accessibility[value] || 0) + 1;
});

        // Create arrays for x-axis (values) and y-axis (frequencies)
        var xValues_a_accessibility = Object.keys(frequencies_a_accessibility);
        var yValues_a_accessibility = Object.values(frequencies_a_accessibility);

        // Create a new chart instance
        var ctx = document.getElementById('adjusted_accessibility').getContext('2d');
        var chart = new Chart(ctx, {
          type: 'line',
          data: {
                labels: xValues_a_accessibility, // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: yValues_a_accessibility,
                    fill: false, // Disable fill below the line
                    borderColor: 'rgba(0, 123, 255, 1)', // Line color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Value'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true
                      }
                    }
                  }
                }
              });



        // Adjustable Perceivable

        // Create a new chart instance
        var ctx = document.getElementById('adjusted_per_chart').getContext('2d');
        console.log(<?php echo json_encode($array_a_per); ?>)
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
                labels: ['1','2','3','4','5','6','7','8','9','10'], // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: <?php echo json_encode($array_a_per); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)', // Bar color
                    borderColor: 'rgba(0, 123, 255, 1)', // Border color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Rank'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true,
                            stepSize: 1 // Set the step size for the y-axis
                          }
                        }
                      }
                    }
                  });


        // Adjustable Operable
        // Create a new chart instance
        var ctx = document.getElementById('adjusted_ope_chart').getContext('2d');
        console.log(<?php echo json_encode($array_a_ope); ?>)
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
                labels: ['1','2','3','4','5','6','7','8','9','10'], // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: <?php echo json_encode($array_a_ope); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)', // Bar color
                    borderColor: 'rgba(0, 123, 255, 1)', // Border color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Rank'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true,
                            stepSize: 1 // Set the step size for the y-axis
                          }
                        }
                      }
                    }
                  });


        // Adjusted Understandable
        // Create a new chart instance
        var ctx = document.getElementById('adjusted_und_chart').getContext('2d');
        console.log(<?php echo json_encode($array_a_und); ?>)
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
                labels: ['1','2','3','4','5','6','7','8','9','10'], // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: <?php echo json_encode($array_a_und); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)', // Bar color
                    borderColor: 'rgba(0, 123, 255, 1)', // Border color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Rank'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true,
                            stepSize: 1, // Set the step size for the y-axis
                            precision: 0
                          }
                        }
                      }
                    }
                  });

        // Adjusted Robust
        // Create a new chart instance
        var ctx = document.getElementById('adjusted_rob_chart').getContext('2d');
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
                labels: ['1','2','3','4','5','6','7','8','9','10'], // X-axis labels (unique values)
                datasets: [{
                  label: 'Number of user',
                  data: <?php echo json_encode($array_a_rob); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)', // Bar color
                    borderColor: 'rgba(0, 123, 255, 1)', // Border color
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    x: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Rank'
                      }
                    },
                    y: {
                      display: true,
                      title: {
                        display: true,
                        text: 'Number of user'
                      },
                      ticks: {
                        beginAtZero: true,
                            stepSize: 1 ,// Set the step size for the y-axis
                            precision: 0

                          }
                        }
                      }
                    }
                  });





                </script>
              </body>


              </html>
