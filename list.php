<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!--<meta http-equiv="refresh" content="0; url=https://github.com/renzowesterbeek/Samenvattingen" />-->
    <title>Samenvattingen</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/base.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include('includes/header.php') ?>
    <ol class="breadcrumb">
      <li><a href="../../index.php">Home</a></li>
      <li><a href="../../<?php echo $_GET['leerjaar'] ?>">Leerjaar <?php echo $_GET['leerjaar'] ?></a></li>
      <li><a href="../<?php echo $_GET['vak'] ?>"><?php echo $_GET['vak'] ?></a></li>
      <li class="active">H<?php echo $_GET['hoofdstuk'] ?></li>
    </ol>

    <main class="container-fluid">
      <section class="col-md-8 col-md-offset-2">
        <h1>Kies een samenvatting</h1>
        <?php
        require('backend/connect.php');

        if(count($_GET) == 0){
          // No keywords supplied, showing everything
          $sql = "SELECT titel, auteur FROM samenvattingen";
        } else {
          // Keywords supplied, building query
          $sqlstring = "";
          foreach($_GET as $key => $value){
            if(strlen($sqlstring) == 0){
              $sqlstring .= $key ."='". $value ."'";
            } else {
              $sqlstring .= " AND ". $key ."='". $value ."'";
            }
          }
          $sql = "SELECT id, titel, auteur FROM samenvattingen WHERE " . $sqlstring;
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
             $hrefurl = "http://samenvattingen.westerbeek.us/summary/".$row['id']."/view";
             echo "<a href='$hrefurl'>". $row["titel"]. "</a> van ". $row["auteur"] . "<br>";
           }
        } else {
           echo "Geen resultaten";
        }
        $conn->close();
        ?>
      </section>
    </main>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  </body>
</html>
