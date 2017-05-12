<?php
$db = mysqli_connect('localhost', 'root', 'password') or die(mysqli_connet_error());
mysqli_select_db($db, 'bcit');
$result = mysqli_query($db, "SELECT * FROM user;");
while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
 // add each row returned into an array
  $array[] = $row;

  // OR just echo the data:
  echo $row[0] . " ";
  echo $row[1] . " ";
  echo $row[2] . " "; // etc
  echo $row[3] . "<br/>";

}

?>