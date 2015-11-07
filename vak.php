<html>
<head>
  <title>Samenvattingen</title>
</head>
<body>
<?php
require('backend/connect.php');

if($_GET['vak']){
  $sql = "SELECT titel, auteur FROM samenvattingen WHERE vak='$_GET[vak]'";
} else {
  $sql = "SELECT titel, auteur FROM samenvattingen";
}
$result = $conn->query($sql);
echo "<h2>Samenvattingen ". $_GET['vak'] .":</h2>";

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       echo $row["titel"]. " van ". $row["auteur"] . "<br>";
   }
} else {
   echo "0 resultaten";
}
$conn->close();
?>
</body>
</html>
