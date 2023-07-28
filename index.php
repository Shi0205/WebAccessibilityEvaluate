<!--Color code = 53109C -->
<?php 
session_start();

if(isset($_SESSION['login']) == false){
  $_SESSION['login'] = false;
}

 if( $_SESSION['login'] ==  true){
   header("Location: admin.php");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


  <style type="text/css">
    .custom-list {
      list-style: none;
      text-align: center;
      padding-left: 0;
    }

    .custom-list li::before {
      content: "\2022";
      display: inline-block;
      width: 1em;
      margin-left: -1em;
    }

    .cards {
     box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
     transition: box-shadow .25s; 
   }

   .cards:hover{
     box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
   }

   .card-separator {
    width: 100%;
    margin: 10px 0 10px 0;
    border: 1px solid #53109C ;
  }

  .card h5{
    font-weight:  600;
    font-family: Georgia;
  }

  .social-menu ul {
    display: flex;
    justify-content: center; /* Center the icons horizontally */
    margin-top: 20px; /* Add some spacing from the company info */
  }

  .social-menu ul li {
    list-style: none;
    margin: 0 10px; /* Adjust the margin to provide spacing between icons */
  }

  .social-menu ul li .bi {
    font-size: 30px;
    color: #000000;
    transition: .5s;
  }

  .social-menu ul li .bi:hover {
    color: #ffffff;
  }

  .social-menu ul li a {
    display: inline-block; /* Use inline-block to remove the unnecessary positioning properties */
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #fff;
    text-align: center;
    transition: .6s;
    box-shadow: 0 5px 4px rgba(0, 0, 0, .5);
    line-height: 50px; /* Center the icons vertically */
  }

  .social-menu ul li a:hover {
    transform: translateY(-10%);
  }

  .social-menu ul li:nth-child(1) a:hover {
    background-color: rgba(0, 0, 0, 0.829);
  }

  .social-menu ul li:nth-child(2) a:hover {
    background-color: #0077b5;
  }

</style>
</head>
<body>
  <?php include_once 'navbar.php'?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
  <div class="text-center">
    <img src="w_logo.png" alt="White WAE Logo" style="width: 300px;">
  </div>

  <div class="container text-center mb-5">
    <div class="row ">
      <div class="col-sm-6">
        <div class="card cards mb-5">
          <div class="card-body">
            <h5 class="card-title">Normal Web Accessibility Evaluation Form</h5>
            <div class="card-separator"></div>
            <p class="card-text">Contain detailed explanation on each web accessibility principles, guidelines, and success criteria.</p>
            <ul class="text-center custom-list">
              <li>Suitable for <b>first-time user</b>.</li>
              <li>Estimated time used for this form is <b>20-25 minutes</b>.</li>
            </ul>
            <a href="normal_evaluator.php" class="btn" style="background-color: #53109C; color: white">Evaluation Form</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card cards">
          <div class="card-body">
            <h5 class="card-title">Expert Web Accessibility Evaluation Form</h5>
            <div class="card-separator"></div>
            <p class="card-text">Simple evaluate form. Detail explanations and supported links did not included in this form.</p>
            <ul class="text-center custom-list">
              <li>Suitable for the expert who <b>have certain knowledge about web accessibility</b>.</li>
              <li>Estimated time used for this form is <b>10-15 minutes</b>.</li>
            </ul>
            <a href="expert_evaluator.php" class="btn" style="background-color: #53109C; color: white">Evaluation Form</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

<footer>
  <div class="py-4" style="background-color: #53109C">
   <div class="Company-info text-center text-white">
    <h4>Universiti Kebangsaan Malaysia</h4>
    <p>43600 UKM Bangi, Selangor Malaysia</p>
    <div class="social-menu">
      <ul>
        <li><a href="https://github.com/Shi0205/WebAccessibilityEvaluate" target="_blank"><i class="bi bi-github"></i></a></li>
        <li><a href="https://www.linkedin.com/in/lim-shi-tong-553044210/" target="_blank"><i class="bi bi-linkedin"></i></a></li>
      </ul>
    </div>
  </div>
  <div class="container text-center">
    <p class="mb-0 py-2 text-white">©2023 A180172 All rights reserved.</p>
  </div>
</div>
</footer>
</html>
