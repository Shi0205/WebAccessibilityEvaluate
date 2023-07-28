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

    }
  }
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
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


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

  <style>
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
            <h2>Standard Rule's User</h2>
          </div>
          <br>

          <div class="result_analysis mb-5 card cards ">
            <div class="m-2 row">
              <p><b>Total User : </b> <?php echo $standard_rule_user; ?></p>

              <hr>

              <div class="sm-6 col">
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

              

            </div>

            <div class="sm-6 col">
             <p><b>Mode Perceivable Rank:</b> <?php 
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

              <p><b>Mode Operable Rank:</b> <?php 
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

              <p><b>Mode Understandable Rank:</b> <?php 
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

              <p><b>Mode Robust Rank:</b> <?php 
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


          </div>
        </div>

        <h4>Rank for 4 principles: </h4>
        <table id="standard_rule_tbl" class="table table-striped table-bordered" style="width:100%" >
         <thead >
          <tr>
            <th>User Id</th>
            <th>Perceivable Rank</th>
            <th>Operable Rank</th>
            <th>Understandable Rank</th>
            <th>Robust Rank</th>
            <th>Accessibility Rank</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php
      // Read
          $per_page = 45;
          if(isset($_GET["page"]))
            $page = $_GET["page"];
          else
            $page = 1;
          $start_form = ($page-1) * $per_page;

          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM fyp_tbl_user WHERE fld_rule = :rule LIMIT $start_form, $per_page");

            $stmt->bindParam(':rule', $rule, PDO::PARAM_STR);
            $rule = "standard";

            $stmt->execute();
            $result = $stmt->fetchAll();
          }
          catch(PDOException $e){
            echo "Error: " . $e->getMessage();
          }
          foreach($result as $readrow) {
            ?>   
            <tr>
             <td><?php echo $readrow['fld_user_id']; ?></td>
             <td><?php echo $readrow['fld_perceivable']; ?></td>
             <td><?php echo $readrow['fld_operable']; ?></td>
             <td><?php echo $readrow['fld_understandable']; ?></td>
             <td><?php echo $readrow['fld_robust']; ?></td>
             <td><?php echo $readrow['fld_accessibility']; ?></td>
             <td><a href="standard_user_details.php?uid=<?php echo $readrow['fld_user_id']; ?>"class="btn btn-warning btn-xs" role="button" >Details</a></td>
           </tr>
           <?php
         }

         ?>
       </tbody>

     </table>
   </div>
 </div>
</div>

<br>



</div>
<nav class="main-menu">
  <!-- Sidebar content -->
  <ul>
    <li>
      <a href="admin.php">
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


<script>  
 $(document).ready(function () {
  $('#standard_rule_tbl').DataTable({
    lengthMenu: [
    [5, 10, 20, 30,  -1],
    [5, 10, 20, 30,  'All'],
    ],
  });
});
</script>

</body>


</html>
