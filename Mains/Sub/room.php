<?php
session_start();
include "../../Includes/config.php";
include "../../Includes/funciones.php";

if(!isset($_SESSION['username'])) {
	header("Location: ../../index.php");
}

ini_set('error_reporting',0);
include "barra_navegador.php";
if(isset($_GET['id'])) {

	$query = mysql_query("SELECT * FROM mensajes WHERE sala = '".$_GET['id']."'");

	while($row=mysql_fetch_array($query)) {
		$sal = mysql_query("SELECT * FROM salas WHERE id = '".$row['sala']."'");
		$sala = mysql_fetch_array($sal);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="CSS/main.css">
<link rel="shortcut icon" href="../../../Images/Logo.ico" />
<title>TapatioJobs (<?php echo $sala['nombre']?>)</title>
<script src="../js/jquery-3.2.1.js"></script>
<script src="../js/script.js"></script>
</head>

<body>



	  <?php
		$rows=mysql_fetch_array($querys);
		}
		?>
		<div class="top">
			<img src="<?php echo $sala['foto']; ?>" alt="" style="margin: 2% 1% 1% 1%">
			<h1 style="color:#999; margin-top: 7.5%">Bienvenidos al chat de <?php echo $sala['nombre']; ?></h1>
		</div>
		<div class="content" id="content">
			<?php

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
			<br><br>
					<div class="comentarios">
					<div class="comentario burbuja">
						<a href="../perfil.php?id=<?php echo $us['id_count']; ?>" style="text-decoration:none"><img src="../<?php echo $us['avatar'] ?>" width="40px" height="40px" alt="" style="border-radius: 50%"></a>
						<a href="../perfil.php?id=<?php echo $us['id_count']; ?>" style="text-decoration:none"><b><?php echo $us['username']; ?></b></a>
						<br><hr>
						<p>&nbsp;<?php echo $com['texto']; ?></p>
						<p id="date"><b><?php echo $com['fecha']; ?></b></p>
					</div>
				</div>

			<?php
			}
			?>

			<?php

			$id = $_SESSION['id_count'];
			$text = $_POST['msj'];
			$sala = $_GET['id'];
			$type = $_SESSION['type'];

			if(isset($_POST['envio'])) {
				if ($_post['msj'] = ""){
					//code...
				}else{

			$insert = mysql_query("INSERT INTO mensajes (id_count,texto,sala,type,fecha) values ('$id','$text','$sala','$type',NOW())");

			if($insert) {
				echo '<meta http-equiv="refresh" content="0.000001" />';
			}else{
				?>
				<script type="text/javascript">
					window.alert("Hubo algun fallo en el envio");
				</script>
				<?php
			}
			}
	}

			}
				?>
		</div>
		<div class="content2">
			<footer>
				<form class="" action="" method="post">
					<textarea name="msj" rows="2" cols="80" placeholder="Mensaje...." autofocus ></textarea>
					<input type="submit" name="envio" value="►">
				</form>
			</footer>
		</div>
	</div>
</div>
<script type="text/javascript">
		function reload(){
			$('#content').animate({ scrollTop: 		$('#content').prop('scrollHeight')}, 1000);
		}
		window.onload = reload();
</script>
</body>
</html>
