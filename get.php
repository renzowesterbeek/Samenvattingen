<?php
// Basic script that fetches data from the database based on
// supplied arguments. This data is later processed in javascript
require('backend/connect.php');

if(count($_GET) == 0){
  // No keywords supplied, showing everything
  $sql = "SELECT * FROM samenvattingen";
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
  $sql = "SELECT * FROM samenvattingen WHERE " . $sqlstring;
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $encoded = json_encode($result->fetch_all(MYSQLI_ASSOC));
  echo $encoded;
} else {
   // No results
}
$conn->close();
?>
