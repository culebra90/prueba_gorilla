<html>
	<head>
		<title>PASSWORD GORILLA</title>
	</head>
	<body>
		<form action="index.php" method="POST">
			contraseña actual  <input type="text" name="pass-now">
			<br>
			contraseña nueva <input type="text" name="pass1">
			<br>
			confirmar contraseña <input type="text" name="pass2"><br>
			<input type="submit" value="enviar">
		</form>
	</body>
</html>

<?php

 error_reporting(E_ALL);
      ini_set('display_errors', '1');

require('util/util.php');

$obj_u = new Util();

if(isset($_POST['pass1'],$_POST['pass2'],$_POST['pass-now'])){
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$pass3 = $_POST['pass-now'];

	$sw = true;

	if($pass1==$pass2){

		if(strlen($pass1)>=8 && strlen($pass2)>=8 && strlen($pass3)){

			if($obj_u->alfanumerico($pass1)){

				if($obj_u->capital_letter($pass1)){

					if($obj_u->caracters_special($pass1)){

						if($obj_u->pass_sin_repetir($pass1)){

							if($obj_u->pass_sin_id($pass1)){

								if($obj_u->sin_consecutivas($pass1)){

									echo "contraseña cambiada";
								}

								echo "sin user id";
								
							}else{
								echo "con user id";
							}
						}else{
								echo "se repetio";
						}						
					}else{
						$sw = false;
						echo "sin caracter especial";
					}
				}else{
					$sw = false;
					echo "no tiene letra capital";
				}
			}else{
				$sw = false;
				echo "no es alfanumerico";
			}
		}else{
			$sw = false;
			echo "no tienen mas de 8 caracteres";
		}
	}else{
		echo "las contraseñas no son iguales";
	}
	
}
?>