<?php
session_start();
include "Includes/config.php";
include "Includes/funciones.php";
if(isset($_SESSION['username'])) {
	include "Includes/class.php";
}


ini_set('error_reporting',0);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TapatioJobs</title>
    <link rel="stylesheet" href="CSS/ini.css">
		<link rel="icon" href="Images/Logo.ico">
    </script>
  </head>
  <body>
    <div class="content_total">
      <section class="sec1">
        <center><img src="" alt=""></center>
        <div class="head">
          <div class="left">
            <center>
              <img src="images/logo.png" alt="">
            </center>
          </div>
          <div class="right">
              <form class="" action="Includes/login.php" method="post" autocomplete="off">
                  <center><h2>Login</h2></center>
                  <br>
                  <p>
                    Usuario o correo electronico:
                  <input type="text" name="username" placeholder="Username or Email">
                </p>
                <br>
                <p>
                  Contraseña:
                <input type="password" name="password" placeholder="Password">
              </p>
              <br><br>
              <input type="submit" name="btn_submit" value="Login">
              </form>
            </div>
        </div>
      </section>

      <section class="sec2">
        <hr>
        <center><img src="" alt="">
        <h1>Crea tu cuenta</h1></center>

        <div class="content-all">

        <div class="content-img" title="Postulante">

                  <a href="Sub/worker.php"><img src="Images/worker.png"></a>

                  <div class="content-txt">
                      <h2>¿Eres postulante?</h2>
                      <p>
												<a href="Sub/worker.php" style="text-decoration: none; color: black"><b>Si buscas oportunidades de trabajo, crea tu perfil en <i>TapatioJobs</i> y busca entre las miles de propuestas de trabajo en diferentes empresas, de diferentes puestos en un solo lugar!.</b>
                      </a>
												</p>
                  </div>

                  <div class="content-1"></div>
                  <div class="content-2"></div>


              </div>

              <div class="content-img" title="Empleador">

                  <a href="Sub/business.php"><img src="Images/business.png"></a>

                  <div class="content-txt">
                      <h2>¿Eres empleador?</h2>
                      <p>
                        <a href="Sub/business.php" style="text-decoration: none; color: black"><b>Si eres un contratista de una empresa o buscas trabajadores para tu negocio, cre una cuenta en <i>TapatioJobs</i> y haz una publicacion de trabajo a todos los postulantes, creando especificaiones sobre la empresa, el tipo de trabajo y accede al curriculum de los postulantes para encontrar lo que buscas!.</b>
												</a>
											</p>
                  </div>

                  <div class="content-1"></div>
                  <div class="content-2"></div>

              </div>

          </div>
      </section>

      <section class="sec3">
        <hr>
        <center><img src="" alt="">
        <h1>¿Qué es <i>TapatíoJobs</i>?</h1></center>
        <p id="descrip">
          <i>TapatioJobs</i> es un sitio donde puedes ofrecer o buscar trabajo de cualquier tipo!<br>
          Puedes crear tu propio curriculum virtual para que los contratistas de las empresas puedan verlo y asi poder contactarte para el trabajo, escribir en el chat para encontrar diferentes conocimientos y hablar con personas de diferentes areas, de las cuales puedes sacar valiosa informacion de negocios y oportunidades de trabajo.<br>
          Tambien puedes crear una cuenta de contratista para tu empresa y asi poder buscar entre los miles de postulantes de las diferentes areas del estudio y encontrar aquel que mas se adapte a tu solicitud, asi mismo, puedes hacer publicaciones de trabajo y poner parametros de busqueda y asi hacer mas eficiente la busqueda.
        </p>
      </section>

      <section class="sec4">
        <hr>
        <center><img src="" alt="">
        <h1>Contactanos</h1></center>
      </section>

    </div>

  </body>
</html>
