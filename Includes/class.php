<?php
$worker = mysql_query("SELECT * FROM users") or die(mysql_error());
$work = mysql_num_rows($worker);
while($rowwork=mysql_fetch_array($worker)){
  if($_SESSION['username'] == $rowwork['username']){
    header("Location: Mains/workzone.php");
  }
}


$empre = mysql_query("SELECT * FROM business") or die(mysql_error());
$empresa = mysql_num_rows($empre);
while($rowbuss=mysql_fetch_array($empre)){
  if($_SESSION['username'] == $rowbuss['username']){
    header("Location: Mains/businesszone.php");
  }
}
 ?>
