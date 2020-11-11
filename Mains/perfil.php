<?php
session_start();
include "../Includes/config.php";
include "../Includes/funciones.php";

if(!isset($_SESSION['username'])) {
	header("Location: ../index.php");
}

ini_set('error_reporting',0);
?>
<?php
if(isset($_GET['id'])) {
	$type= mysql_query("SELECT * FROM type WHERE id = '".$_GET['id']."'");
	while($ty=mysql_fetch_array($type)) {
	if ($ty['type'] == 1) {
		$query = mysql_query("SELECT * FROM business WHERE id_count = '".$_GET['id']."'");
	}elseif ($ty['type'] == 2) {
		$query = mysql_query("SELECT * FROM users WHERE id_count = '".$_GET['id']."'");
	}

	while($row=mysql_fetch_array($query)) {

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSS/main.css">
<title>TapatioJobs (<?php echo $row['username'];?>)</title>
</head>

<body>

<?php include "Includes/barra_navegador.php"; ?>


<div class="content" style="padding:15px 15px 15px 15px; font-size:24">

	<div class="ini">
		<p>
			<img src="<?php echo $row['avatar']; ?>"style="border-radius:50%; position:absolute" class="fperfil"/>
		</p>
		<div class="muro">
			<img src="<?php echo $row['muro'];?>" class="fmuro" style="height:100%; width:100%"/>

			<center> <h5 style="font-size: 30px; margin-top:-4%"><p style="color:white" id="nm"><?php echo $row['username']; ?> </p></h5> </center>
		</div>

	</div>
<center> <h1 style="text-decoration:underline">Datos de Curriculum</h1> </center>
	<div class="information">
		<p>
			<b><?php echo $row['name']; ?></b>
		</p>
		<p>
			<b><?php echo $row['email']; ?></b>
		</p>
		<p>
			<b><?php echo $row['telefono1']; ?></b>
		</p>
		<p>
			<b><?php echo $row['telefono2']; ?></b>
		</p>
		<p>
			<b><?php echo $row['ubicacion']; ?></b>
		</p>
		<p>
			<b><?php echo $row['edad']; ?></b>
		</p>
		<p>
			<b><?php echo $row['carrera']; ?></b>
		</p>
		<p>
			<b><?php echo $row['experiencia']; ?></b>
		</p>
		<p>
			<b><?php echo $row['habilidades']; ?></b>
		</p>
		<p>
			<b><?php echo $row['software']; ?></b>
		</p>
		<p>
			<b><?php echo $row['debilidades']; ?></b>
		</p>
		<p>
			<b><?php echo $row['descripcion']; ?></b>
		</p>
	</div>
	<p>
	<?php if($_SESSION['id_count'] == $_GET['id'] && $ty['type'] == $_SESSION['type']) {?>
	<a href="editarperfil.php?id=<?php echo $_SESSION['id_count']; ?>" style="text-decoration:none">Editar mi perfil</a>
	<?php } ?>
</div>

<?php
	}

}
}
?>

</body>
</html>
