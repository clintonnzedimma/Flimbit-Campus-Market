<nav class="navbar navbar-expand-md navbar-dark fixed-top custom-nav" id="banner">
  <div class="container">
  <!-- Brand -->
    <?php if (User_Factory::isLoggedIn()): ?>
  <a class="navbar-brand" href="home.php"><img src="css/img/logo.png" class="img-fluid" width="130"></a>
   <?php endif ?>
    
   <?php if (!User_Factory::isLoggedIn()): ?>
  <a class="navbar-brand" href="index.php"><img src="css/img/logo.png" class="img-fluid" width="130"></a>
   <?php endif ?>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto" style="background: #324356">

      <?php if (!User_Factory::isLoggedIn()): ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Sign up</a>
      </li>
    <?php endif ?>


    <?php if (User_Factory::isLoggedIn()): ?>
      <li class="nav-item">
          <a class="nav-link" href="profile.php?u=<?=$u->get('username') ?>"> <i class="fa fa-user nav-icon"></i> Profile </a>
      </li>     
      <li class="nav-item">
        <a class="nav-link" href="settings.php"> <i class="fa fa-cog nav-icon"> </i> Settings </a>
      </li>

     <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
         More
      </a>
      <div class="dropdown-menu nav-drop-menu" style="">
        <!-- <a class="dropdown-item" href="#">Link</a> -->
        <a class="dropdown-item" href="logout.php"> <i class="fa fa-sign-out"></i> Log out</a>
      </div>
    </li>      

      <li class="nav-item">
          <a class="nav-link nav-link-btn" href="post-ad.php">
            <button class="nav-post-ad-btn btn btn-primary btn-block submit"> Create Ad</button>
          </a>
      </li>

    <?php endif ?>

    </ul>
  </div>
  </div>
</nav>