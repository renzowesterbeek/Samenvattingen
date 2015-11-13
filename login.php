<?php
require_once('init.php');

$db = new DB;
$googleClient = new Google_Client;
$auth = new GoogleAuth($db, $googleClient);

if($auth->checkRedirectCode()){
  header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Samenvattingen | Login</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <!-- MATERIAL BOOTSTRAP? <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css"> -->

    <link rel="stylesheet" href="http://localhost/samenvattingen/css/base.css"> <!-- CHANGE TO NON-LOCAL URL -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include('includes/header.php') ?>
    <main class="container-fluid">
      <section class="col-md-8 col-md-offset-2">
      <?php if(!$auth->isLoggedIn()): ?>
        <a href="<?php echo $auth->getAuthUrl(); ?>">Log in met Google</a>
      <?php else: ?>
        Je bent ingelogd, <a href="logout.php">log uit</a>
      <?php endif; ?>
      </section>
    </main>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/samenvattingen/js/script.js" type="text/javascript"></script> <!-- CHANGE TO NON-LOCAL URL -->
  </body>
</html>
