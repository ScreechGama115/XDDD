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
    <title>TapatioJobs</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="icon" href="../Images/Logo.ico">
  </head>
  <body>
    <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
      <center><h2>Curriculum Vitae</h2> </center>
      <p>
        <label for="textfield3"></label>
        Nombre Completo:<br>
        <input type="text" name="nombre"  required/>
      </p>
      <p>
        Email:<br>
        <input type="text" name="email" maxlength="30" required/>
      </p>
      <p>
        Username:<br>
        <input type="text" name="username"  maxlength="20" required/>
      </p>
      <p>
        Edad:<br>
        <input type="text" name="edad"  maxlength="20"/>
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
        <label for="fileField">Elige tu foto de perfil (Usa en la que te veas formal)</label><br>
        <input type="file" name="avatar" id="avatar" required/>
      </p>
      <p>
        <label for="fileField">Elige tu foto para el muro <br>*(Usa imagenes que representen la empresa)</label><br>
        <input type="file" name="muro" id="avatar" required/>
      </p>
      <p>
        Grado academico y carrera:<br>
        <input type="text" name="carrera"  maxlength="200" required/>
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
        Ubicacion donde vives:<br>
        <textarea name="ubicacion" rows="5" cols="80" required></textarea>
      </p>
      <p>
        Experiencia laboral:<br>
        <textarea name="experiencia" rows="5" cols="80" required></textarea>
      </p>
      <p>
        Habilidades:<br>
        <textarea name="habilidades" rows="5" cols="80" required></textarea>
      </p>
      <p>
        Softwares que manejas:<br>
        <textarea name="software" rows="5" cols="80" required></textarea>
      </p>
      <p>
        Debilidades:<br>
        <textarea name="debilidades" rows="5" cols="80" required></textarea>
      </p>
      <p>
        Descripcion Personal<br> (¿Como te describes a ti mismo?):<br>
        <textarea name="descripcion" rows="5" cols="80" required></textarea>
      </p>
      <center>
        <p>
          <input type="submit" name="guardar" value="Registrarse" />
        </p>
        <p>
          <input type="submit" name="cuenta" value="Ya tengo cuenta..." />
        </p>

      </center>
    </form>

    <?php
    if ($_POST['guardar']) {
      if ($_POST['password'] == $_POST['passwordconfirm']) {

            	$nombre = clean($_POST['nombre']);
              $username = clean($_POST['username']);
              $edad = clean($_POST['edad']);
              $email = clean($_POST['email']);
            	$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
              $carrera = clean($_POST['carrera']);
              $telefono1 = clean($_POST['telefono1']);
              $telefono2 = clean($_POST['telefono2']);
              $ubicacion = clean($_POST['ubicacion']);
              $descripcion = clean($_POST['descripcion']);
              $experiencia = clean($_POST['experiencia']);
              $habilidades = clean($_POST['habilidades']);
              $software = clean($_POST['software']);
              $debilidades = clean($_POST['debilidades']);

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
                $id2 = $_POST['username'];

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

            	$c = mysql_num_rows(mysql_query("SELECT * FROM users WHERE name = '$usuario' OR email = '$email'"));
            	if ($c == 1) { ?>
              <script type="text/javascript">
                window.alert("El nombre o el email ya estan registrados \nVerifica la información");
              </script>
              <?php }
            	else {
            		$iw = mysql_query("INSERT INTO users (name,password,username,edad,avatar,muro,ubicacion,carrera,email,telefono1,telefono2,experiencia,habilidades,software,debilidades,descripcion,fecha) values ('$nombre','$password','$username','$edad','$destino1','$destino2','$ubicacion','$carrera','$email','$telefono1','$telefono2','$experiencia','$habilidades','$software','$debilidades','$descripcion',NOW())");
                $it = mysql_query("INSERT INTO type (name,username,type,fecha) values ('$empresa','$username',2,NOW())");
                if ($iw && $it) { ?>
                <script type="text/javascript">
                  window.alert("El curriculum fue creado con exito! \nBienvenido a la comunidad de TapatioJobs!");
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
