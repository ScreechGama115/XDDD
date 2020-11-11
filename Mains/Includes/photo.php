<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("Location: ../../index.php");
}

ini_set('error_reporting',0);


?>
<style type="text/css">

.fperfil{
  margin-left: 15%;
  margin-top: 5%;
}

#navegador{
  text-align: center;
  position: relative;
	padding: 5px 5px 5px 5px;
	background-color: rgba(50, 50, 50, .3);
	border-radius: 5px;
}
#navegador ul{
   list-style-type: none;
}
#navegador li{
   display: block;
   text-align: center;
   margin: 0 10px 0 0;
}

#navegador .btn_menu a{
  display: block;
  padding: 20px 10px 20px 10px;
  background-color: gray;
  text-decoration: none;
  color: #fff;
  font-size: 15px;
  margin-top: 5%;
	margin-left: 2.5%;
	z-index: 1;
}

#navegador .btn_menu:hover{
  background-color: #0101DF;
  transform: scale(1.1);
  transition: 0.4s;
}

.barra{
    margin-top: 1%;
		width: 20%;
    padding: 5px 5px;
		position: absolute;
		background-color: rgba(255, 255, 255);
		margin-left: 2.5%;
		border-radius: 5px;
		float: right;
	}
@media screen and (max-width:1080px) {
  #navegador a {
    margin-top: 20%;
    display: block;
    padding: 15px 20px 15px 20px;
    background: rgba(0, 0, 0);
    text-decoration: none;
    color: white;
    font-size: 20px;
  }
#navegador a {
  font-size: 30px;
}
input#abrir-cerrar:checked ~ #sidebar {
    width:500px;
}

input#abrir-cerrar:checked + label[for="abrir-cerrar"], input#abrir-cerrar:checked ~ #contenido {
    margin-left:500px;
    transition: margin-left .4s;
    transition: 0.6s;
}

label[for="abrir-cerrar"] {
    padding: 1rem;
    font-size: 25px;
    background-color:#000;
}
    }
</style>
<div class="barra">
  <div id="navegador">

    <center>
      <h1 style="margin-left: 10%"><?php echo $_SESSION['username']; ?></h1>


		<li class="btn_menu"><a href="index.php"><b>| Inicio |</b></a></li>
		<li class="btn_menu"><a href="tareas.php"><b>| Tareas |</b></a></li>
		</center>
	</div>
		<a href="editarperfil.php?id=<?php echo $_SESSION['id_count']; ?>"><img src="<?php echo $row['avatar']; ?>" height="200" width="200" style="border-radius:50%;" class="fperfil"/></a>


</div>
