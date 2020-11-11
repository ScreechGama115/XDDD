<?php
session_start();
include "../Includes/config.php";
include "../Includes/funciones.php";

ini_set('error_reporting',0);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TapatioJobs (Business)</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="icon" href="../Images/Logo.ico">
  </head>
  <body>
    <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
      <center><h2>Perfil de la empresa</h2> </center>
      <p>
        <label for="textfield3"></label>
        Nombre de la empresa:<br>
        <input type="text" name="nombre_empre"  required maxlength="30"/>
      </p>
      <p>
        Email:<br>
        <input type="text" name="email" maxlength="30" required/>
      </p>
      <p>
        Nombre de administrador de cuenta:<br>
        <input type="text" name="name_admin"  maxlength="20" required/>
      </p>
      <p>
        Username:<br>
        <input type="text" name="username"  maxlength="20" required/>
      </p>
      <p>
        Contraseña:<br>
        <input type="password" name="password" required/>
      </p>
      <p>
        Confirmar Contraseña:<br>
        <input type="password" name="passwordconfirm" required/>
      </p>
      <p>
        <label for="fileField">Elige tu foto de perfil</label><br>
        <input type="file" name="avatar" id="avatar" required/>
      </p>
      <p>
        <label for="fileField">Elige tu foto para el muro <br>*(Usa imagenes que representen la empresa)</label><br>
        <input type="file" name="muro" id="avatar" required/>
      </p>
      <p>
        Numero de telefono #1:<br>
        <input type="text" name="telefono1"  maxlength="20" required/>
      </p>
      <p>
        Numero de telefono #2:<br>
        <input type="text" name="telefono2"  maxlength="20"/>
      </p>
      <p>
        Ubicacion del edificio<br>
        <textarea name="ubicacion" rows="5" cols="80" required></textarea>
      </p>
      <p>
        Especificacion de servicios:<br>
        <textarea name="servicio" rows="5" cols="80" required></textarea>
      </p>
      <p>
        Descripcion general de la empresa:<br>
        <textarea name="descripcion" rows="5" cols="80" required></textarea>
      </p>
      <center>
        <p>
          <input type="submit" name="guardar" value="Registrarse" />
        </p>

      </center>
    </form>

    <?php
    if ($_POST['guardar']) {
      if ($_POST['password'] == $_POST['passwordconfirm']) {

            	$empresa = clean($_POST['nombre_empre']);
              $username = clean($_POST['username']);
              $name_admin = clean($_POST['name_admin']);
              $email = clean($_POST['email']);
            	$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
              $telefono1 = clean($_POST['telefono1']);
              $telefono2 = clean($_POST['telefono2']);
              $ubicacion = clean($_POST['ubicacion']);
              $descripcion = clean($_POST['descripcion']);
              $servicio = clean($_POST['servicio']);

              	$tips = 'jpg';
              	$type = array('image/jpeg' => 'jpg');
              	$id = $_POST['username'];

              	$nombrefoto1=$_FILES['avatar']['name'];
              	$ruta1=$_FILES['avatar']['tmp_name'];
              	$name = $id.'.'.$tips;
              	if(is_uploaded_file($ruta1))
              	{
              	$destino1 =  "../Photos/".$name;
              	copy($ruta1,$destino1);
              	}
              	else
              	{
              		$destino1 = $row['avatar'];
              	}

                $tips2 = 'jpg';
              	$type2 = array('image/jpeg' => 'jpg');
              	$id2 = $_POST['nombre_empre'];

              	$nombrefoto2=$_FILES['avatar']['name'];
              	$ruta2=$_FILES['avatar']['tmp_name'];
              	$name2 = $id2.'.'.$tips2;
              	if(is_uploaded_file($ruta2))
              	{
              	$destino2 =  "../Walls/".$name2;
              	copy($ruta2,$destino2);
              	}
              	else
              	{
              		$destino2 = $row['avatar'];
              	}

            	$c = mysql_num_rows(mysql_query("SELECT * FROM business WHERE name = '$empresa' OR email = '$email' OR name_admin = '$name_admin'"));
            	if ($c == 1) { ?>
              <script type="text/javascript">
                window.alert("El nombre o el email ya estan registrados \nVerifica la información");
              </script>
              <?php }
            	else {
            		$ib = mysql_query("INSERT INTO business (name,password,username,telefono1,telefono2,avatar,muro,name_admin,email,ubicacion,servicio,descripcion,fecha) values ('$empresa','$password','$username','$telefono1','$telefono2','$destino1','$destino2','$name_admin','$email','$ubicacion','$servicio','$descripcion',NOW())");
                $it = mysql_query("INSERT INTO type (name,username,type,fecha) values ('$empresa','$username',1,NOW())");
            		if ($ib && $it) { ?>
                <script type="text/javascript">
                  window.alert("El perfil ha sido creado con exito! \nBienvenido a la comunidad de TapatioJobs!");
                </script>
                <?php echo '<meta http-equiv="refresh" content="1;url=../index.php" />'; }
              }

      }else{
        ?>
        <script type="text/javascript">
          window.alert("Las contraseñas no coindiden");
        </script>
        <?php }
      }
    if ($_POST['cuenta']) {
      header('location:../index.php');
    }
     ?>
  </body>
</html>
