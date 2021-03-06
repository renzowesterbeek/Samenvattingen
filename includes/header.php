<?php
require_once('init.php');

$db = new DB;
$googleClient = new Google_Client;
$auth = new GoogleAuth($db, $googleClient);

?>
<!-- HEADER TO INCLUDE IN ALL PAGES -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- Correct display on mobile screens -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="brand" href="index.php">Samenvattingen</a>
    </div>

    <!-- Collection of all navbar elements to collapse on mobile -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <!-- Links -->
      <ul class="nav navbar-nav">
      </ul>

      <!-- Search -->
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="NLT H3">
        </div>
        <button type="submit" class="btn btn-default">Zoek</button>
      </form>

       <!-- User panel -->
      <ul class="nav navbar-nav navbar-right">
        <?php if($auth->isLoggedIn()){ ?>
        <li><p class="navbar-text">Je bent ingelogd als <?php $auth->getUserFromToken(); ?></p></li>
        <li><button type="button" class="btn btn-default navbar-btn" id="logout" value="logout.php">Log uit</button></li>
        <?php } else {?>
        <li><button type="button" class="btn btn-default navbar-btn" id="login" value="login.php">Log in</button></li>
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div> <!-- /.container-fluid -->
</nav>
