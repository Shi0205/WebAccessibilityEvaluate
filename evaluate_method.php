<!DOCTYPE html>
<html lang="en">
<head>  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />

  <title>Web Accessibility Evaluate</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <style type="text/css">
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
    <div class="container-fluid">

    <div class="text-center my-2">
      <h1 style="font-family: Georgia">Evaluate Method</h1>
    </div>

    <div>
      <p>The following tables will shown the scale table for 4 WCAG principle and the accessibility level.</p>
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
