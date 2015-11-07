<html>
<head>
  <title>Samenvatting</title>
</head>
<body>
<?php
require('backend/connect.php');

if($_GET['id']){
  $sql = "SELECT id, titel, auteur FROM samenvattingen WHERE id=$_GET[id]";
  $result = $conn->query($sql);

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
  echo "Please submit an ID";
  $conn->close();
}
?>
</body>
</html>
