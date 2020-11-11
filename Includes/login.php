<?php
session_start();
?>
<?php
$host_db="localhost";
$user_db="root";
$pass_db="";
$db_name="tapatiojobs";
$tbl_name="business";
$tbl_name2="users";
$conexion=new mysqli($host_db,$user_db,$pass_db,$db_name);
if($conexion->connect_error) {
	die("La conexion fallo:".$conexion->connect_error);
	}

$username=$_POST['username'];
$password=$_POST['password'];

		$sql="SELECT * FROM $tbl_name WHERE username ='$username'";
		$result=$conexion->query($sql);
		if($result->num_rows === 1){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			if(password_verify($password,$row['password'])){
				$_SESSION['loggedin']=true;
				$_SESSION['username']=$username;
				$_SESSION['id_count']=$row['id_count'];
				$_SESSION['type']=1;
				header('Location: ../Mains/businesszone.php');

				}else{
					?>
					<script type="text/javascript">
						window.alert("Usuario y/o contraseña equivocada \nIntenta de nuevo");
					</script>
					<?php

					}
			}else {

					$sql="SELECT * FROM $tbl_name2 WHERE username ='$username'";
					$result=$conexion->query($sql);
					if($result->num_rows === 1){
						$row=$result->fetch_array(MYSQLI_ASSOC);
						if(password_verify($password,$row['password'])){
							$_SESSION['loggedin']=true;
							$_SESSION['username']=$username;
							$_SESSION['id_count']=$row['id_count'];
							$_SESSION['type']=2;
							header('Location: ../Mains/workzone.php');

							}else{
								?>
								<script type="text/javascript">
									window.alert("Usuario y/o contraseña equivocada \nIntenta de nuevo");
								</script>
								<?php
								}
						}else {
							?>
							<script type="text/javascript">
								window.alert("La cuenta no existe");
							</script>
							<?php
						}
			}
		    mysqli_close($conexion);

?>
