<?php
session_start();
include "../../Includes/config.php";
include "../../Includes/funciones.php";

if(!isset($_SESSION['username'])) {
	header("Location: ../../index.php");
}

ini_set('error_reporting',0);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/main.css">
		<link rel="shortcut icon" href="../../Images/Logo.ico" />
    <title>tapatiojobs (Salas)</title>
		<script src="../js/jquery-3.2.1.js"></script>
		<script src="../js/script.js"></script>
  </head>
  <body>


	<?php include "barra_navegador.php" ?>

<div>
	<div class="wrap">
		<h1>Categorias de salas</h1>
		<div class="store-wrapper">
		<div class="category_list">
					<a href="#" class="category_item">Crear Sala</a>
					<a href="#" class="category_item" category="all">Todo</a>
					<?php
					$query = mysql_query("SELECT * FROM salas");

					while($row1=mysql_fetch_array($query)) {
					 ?>
				<a href="#" class="category_item" category="<?php echo $row1['categoria']; ?>"><?php echo $row1['categoria']; ?></a>
				<?php
					}
					?>
			</div>
			<section class="room-list">
				<?php
				$query1 = mysql_query("SELECT * FROM salas");
						while($row=mysql_fetch_array($query1)) {
				 ?>
				<div class="room-item" category="<?php echo $row['categoria']; ?>">
					<img src="<?php echo $row['foto']; ?>" alt="" >
					<a href="room.php?id=<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></a>
				</div>
				<?php
					}
					?>
			</section>

		</div>
	</div>


    </div>
  </body>
</html>
