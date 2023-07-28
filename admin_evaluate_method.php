<?php  
session_start();
include_once 'database.php';

if( $_SESSION['login'] ==  false){
 header("Location: index.php");
}


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

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="INTEGRITY_VALUE" crossorigin="anonymous">

 <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">  


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



</style>
</head>
<body>
  <?php include_once 'navbar.php'?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
  <div class="main-content ">
    <div class="container-fluid">

      <div class="page-header text-center mb-3"><br>
        <h2>Evaluate Method</h2>
      </div>

      <div class="text-center">
        <p>The following tables will shown the standard scale table for 4 WCAG principle and the accessibility level.</p>
        <br>
        <div class="text-center">
          <h3>Perceivable</h3>
          <img src="img_perceivable.png" alt="The scale table for principle perceivable " width="50%" class="text-center">
        </div>
        <br>
        <br>
        <br>

        <div class="text-center">
          <h3>Operable</h3>
          <img src="img_operable.png" alt="The scale table for principle operable " width="50%" class="text-center">
        </div>
        <br>
        <br>
        <br>

        <div class="text-center">
          <h3>Understandable</h3>
          <img src="img_understandable.png" alt="The scale table for principle understandable " width="50%" class="text-center">
        </div>
        <br>
        <br>
        <br>

        <div class="text-center">
          <h3>Robust</h3>
          <img src="img_robust.png" alt="The scale table for principle robust " width="50%" class="text-center">
        </div>
        <br>
        <br>
        <br>

        <div class="text-center">
          <h3>Accessibility</h3>
          <img src="img_accessibility.png" alt="The scale table for accessibility " width="50%" class="text-center">
        </div>
        <br>
        <br>
        <br>



      </div>




    </div>
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


  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script> 

</body>


</html>
