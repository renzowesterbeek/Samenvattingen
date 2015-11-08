<html>
<head>
  <title>Samenvattingen</title>
</head>
<body>
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
  $sql = "SELECT titel, auteur FROM samenvattingen WHERE " . $sqlstring;
}

$result = $conn->query($sql);
echo "<h2>Samenvattingen</h2>";

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       echo $row["titel"]. " van ". $row["auteur"] . "<br>";
   }
} else {
   echo "Geen resultaten";
}
$conn->close();
?>
</body>
</html>
