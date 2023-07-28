<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #53109C" id="top">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="<?php if (isset($_SESSION['login']) && $_SESSION['login'] === true) echo '#'; else echo 'index.php'; ?>" style="font-family: Georgia">Web Accessibility Evaluate</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="color: white"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="font-family: Georgia">
    <ul class="navbar-nav">
      <?php if (isset($_SESSION['login']) && ($_SESSION['login'] === true)){ ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="logout.php">Logout</a>
        </li>
        <?php } else{ ?>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="login.php">Admin Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
