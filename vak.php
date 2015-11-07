<html>
<head>
  <title>Samenvatting</title>
</head>
<body>
<?php
require('backend/connect.php');

if($_GET['vak']){
  $sql = "SELECT id, titel, auteur FROM samenvattingen WHERE vak='$_GET[vak]'";
  $result = $conn->query($sql);
  echo "<h2>Samenvattingen voor het vak ". $_GET['vak'] .":</h2>";

  if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo $row["titel"]. " van ". $row["auteur"];
     }
  } else {
     echo "0 results";
  }
  $conn->close();
} else {
  echo "Voer een vak in";
  $conn->close();
}
?>
</body>
</html>
