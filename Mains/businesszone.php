<?php
session_start();
include "../Includes/config.php";
include "../Includes/funciones.php";

if(!isset($_SESSION['username'])) {
	header("Location: ../index.php");
}

ini_set('error_reporting',0);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/main.css">
		<link rel="shortcut icon" href="../Images/Logo.ico" />
    <title>tapatiojobs (Business)</title>

  </head>
  <body>

 <?php
 /*-----------------------------Consulta para el usuario--------------------------------*/
 $query = mysql_query("SELECT * FROM business WHERE id_count = '".$_SESSION['id_count']."'");

 while($row=mysql_fetch_array($query)) {

 $empr = mysql_query("SELECT * FROM business WHERE id_count = '".$row['id_count']."'");
 $empresa = mysql_fetch_array($empr);
/*------------------------------------------------------------------*/
  ?>
	<?php include "Includes/barra_navegador.php" ?>

	<div class="top">
		<center>
		<img class="logo" src="../Images/Logo.png" alt="">
		 <br><h1 id="titulo" style="font-size:400%; text-decoration: underline; color: black"><?php echo $empresa['name'];?></h1> </center>
	</div>
<div class="content">
	<br>
	<div class="ini">
		<p>
			<a href="editarperfil.php?id=<?php echo $_SESSION['id']; ?>"><img src="<?php echo $row['avatar']; ?>"style="border-radius:50%; position:absolute" class="fperfil"/></a>
		</p>
		<div class="muro">
			<img src="<?php echo $row['muro'];?>" class="fmuro" style="height:100%; width:100%"/>

			<center> <h5 style="font-size: 30px; margin-top:-4%"><p style="color:white" id="nm"><?php echo $_SESSION['username']; ?> </p></h5> </center>
		</div>

	</div>
    </div>
<?php } ?>
  </body>
</html>
