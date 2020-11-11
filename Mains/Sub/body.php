<?php
session_start();
include "../../Includes/config.php";
include "../../Includes/funciones.php";

if(!isset($_SESSION['username'])) {
	header("Location: ../../index.php");
}

ini_set('error_reporting',0);
if(isset($_GET['id'])) {
$coment = mysql_query("SELECT * FROM mensajes WHERE sala = '".$_GET['id']."' ORDER BY id ASC");
while($com=mysql_fetch_array($coment)) {

  if ($com['type'] == 1) {
    $usuar = mysql_query("SELECT * FROM business WHERE id_count = '".$com['id_count']."'");
    $us = mysql_fetch_array($usuar);


  }elseif ($com['type'] == 2) {
    $usuar = mysql_query("SELECT * FROM users WHERE id_count = '".$com['id_count']."'");
    $us = mysql_fetch_array($usuar);

  }

  ?>
  <div class="comentarios">
  <div class="comentario burbuja">
    <a href="perfil.php?id=<?php echo $us['id_count']; ?>" style="text-decoration:none"><img src="../<?php echo $us['avatar'] ?>" width="40px" height="40px" alt="" style="border-radius: 50%"></a>
    <a href="perfil.php?id=<?php echo $us['id_count']; ?>" style="text-decoration:none"><b><?php echo $us['username']; ?></b></a>
    <br><hr>
    <p>&nbsp;<?php echo $com['texto']; ?></p>
    <p id="date"><b><?php echo $com['fecha']; ?></b></p>
  </div>
</div>
  <?php
}
}
?>
