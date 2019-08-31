<?php

class Util {
	function alfanumerico($valor){
		try {

			$res1 = intval(preg_replace('/[^0-9]+/', '', $valor), 10);

			$res2 = preg_replace('/[^A-Za-z]+/', '', $valor);

			return ($res1 && $res2) ? true : false;

		} catch (Exception $e) {
           return "Error: ".$e;
        }

	}

	function capital_letter($valor){
		try {

			$array = array("A","B","C","D","E","F","G","H","I","J","K","L","K","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
			$first = $valor[0];
			$sw=false;

			foreach($array as $capital){
				if($capital==$first){
					$sw=true;
					break;
				}
			}

			return $sw;

		} catch (Exception $e) {
           return "Error: ".$e;
        }
	}

	function caracters_special($valor){
		try {
			// Ya que no especificaba muy bien, entendi que minimo tenia que tener uno de estos 3 caracteres especiales
			$pos = strrpos($valor, "#");
			$pos2 = strrpos($valor, "@");
			$pos3 = strrpos($valor, "$");

			$sw = false;

			if ($pos !== false || $pos2 !== false || $pos3 !== false ) { 
			    $sw = true;
			}

			return $sw;

		} catch (Exception $e) {
           return "Error: ".$e;
        }
	}

	function pass_sin_repetir($valor){
		require_once ('data/user.class.php');
		$obj_user = new User();
		try {			

			$sw = true;

			// supuestamente ya estan guardadas en MD5 o sha

			$ultimas = json_decode($obj_user->ultimas_password(458));

			foreach($ultimas as $ultima){
				if($valor==$ultima->clave){
					$sw=false;
				}
			}			

			return $sw;

		} catch (Exception $e) {
           return "Error: ".$e;
        }
	}

	function pass_sin_id($valor){
		require_once ('data/user.class.php');
		$obj_user = new User();
		try {			

			$user_id = json_decode($obj_user->user_id(458));

			$user_id = "".$user_id."";

			$pos = strrpos($valor, $user_id);

			echo $pos;
			
			$sw = true;

			if ($pos !== false) { 
			    $sw = false;
			}	

			return $sw;

		} catch (Exception $e) {
           return "Error: ".$e;
        }
	}

	function sin_consecutivas($valor){
		$obj_user = new User();
		try {			

			$full_name = json_decode($obj_user->full_name(458));

			$max1=strlen($full_name);
			$max2=strlen($valor);

			$sw = true;

			for($x=1;$x<=$max1-1;$x++){
				for($z=1;$z<=$max2-1;$z++){
					if($full_name[$x]==$valor[$z] && $full_name[$x+1] == $valor[$z+1]){
						$sw = false;
					}
				}
				
			}			

			return $sw;

		} catch (Exception $e) {
           return "Error: ".$e;
        }
	}
}

?>