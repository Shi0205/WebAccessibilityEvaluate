<!--Color code = 53109C -->
<?php 
session_start();

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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">



  <style type="text/css">
    body {
      background-color: #FFFFF;
      font-family: 'Ubuntu', sans-serif;
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

    .main {
      background-color: #FFFFFF;
      width: 400px;
      height: 470px;
      margin: 7em auto;
      border-radius: 1.5em;
      box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }

    .sign {
      padding-top: 10px;
      color: #53109C;
      font-family: 'Ubuntu', sans-serif;
      font-weight: bold;
      font-size: 23px;
    }

    .un {
      width: 76%;
      color: rgb(38, 50, 56);
      font-weight: 700;
      font-size: 14px;
      letter-spacing: 1px;
      background: rgba(136, 126, 126, 0.04);
      padding: 10px 20px;
      border: none;
      border-radius: 20px;
      outline: none;
      box-sizing: border-box;
      border: 2px solid rgba(0, 0, 0, 0.02);
      margin-bottom: 50px;
      margin-left: 46px;
      text-align: center;
      margin-bottom: 27px;
      font-family: 'Ubuntu', sans-serif;
    }

    form.form1 {
      padding-top: 40px;
    }

    .pass {
     width: 76%;
     color: rgb(38, 50, 56);
     font-weight: 700;
     font-size: 14px;
     letter-spacing: 1px;
     background: rgba(136, 126, 126, 0.04);
     padding: 10px 20px;
     border: none;
     border-radius: 20px;
     outline: none;
     box-sizing: border-box;
     border: 2px solid rgba(0, 0, 0, 0.02);
     margin-bottom: 50px;
     margin-left: 46px;
     text-align: center;
     margin-bottom: 27px;
     font-family: 'Ubuntu', sans-serif;
   }


   .un:focus, .pass:focus {
    border: 2px solid rgba(0, 0, 0, 0.18) !important;

  }

  .submit {
    cursor: pointer;
    border-radius: 5em;
    color: #fff;
    background: linear-gradient(to right, #d4b3f7, #53109C);
    border: 0;
    padding-left: 40px;
    padding-right: 40px;
    padding-bottom: 10px;
    padding-top: 10px;
    font-family: 'Ubuntu', sans-serif;
    margin-left: 35%;
    font-size: 13px;
    box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);

  }


  button {
    text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
    color: #E1BEE7;
    text-decoration: none;
    margin-bottom: 20px;
  }

  @media (max-width: 600px) {
    .main {
      border-radius: 0px;
    }


  </style>
</head>

<body>
  <?php include_once 'navbar.php'?>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


  <div class="main"> 
    <div class="text-center " >
      <img src="w_logo.png" alt="White WAE Logo" style="width: 30%" >
    </div>
    <p class="sign" align="center">Admin Login</p>
    <form class="form1" action="verifyLogin.php" method="POST">
      <input class="un" type="text" id="username" name="username" align="center" placeholder="Username" required="">
      <input class="pass" type="password" id="pswd" name="pswd" align="center" placeholder="Password" required="">
      <button type="submit" class="submit" name="user_login">Login</button>
      <div id="error-message" style="color: red; text-align: center;"><?php echo isset($_SESSION['errorM']) ? $_SESSION['errorM'] : ''; ?></div>

    </form>
  </div>

  <script type="text/javascript">
    setTimeout(function() {
      var errorMessageElement = document.getElementById('error-message');
      errorMessageElement.style.display = 'none';
        <?php unset($_SESSION['errorM']); ?> // Clear the error message in the PHP session
    }, 2000); // 3000 milliseconds = 3 seconds

  </script>


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
