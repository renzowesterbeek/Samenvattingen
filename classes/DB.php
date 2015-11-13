<?php
class DB{
  protected $mysqli;

  public function __construct(){
    $this->mysqli = new mysqli("185.27.141.246", "pssf272948_cygy", "jGo9m6gt", "pssf272948_samenvattingen");
  }

  public function query($sql){
    return $this->mysqli->query($sql);
  }
}
?>
