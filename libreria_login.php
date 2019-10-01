<?php 

	if (isset($_POST["correo"])) {
		
		$admincorreo=htmlspecialchars($_POST["correo"]);
		$adminclave=htmlspecialchars($_POST["password"]);
		//$vrusuclaveps = md5($vrusuclave);

		include("libreria.php");

		$objCrud = new Crud();
		$objCrud->tablas = "usuarios";
		$objCrud->expresion = "*";
		$objCrud->condicion = "correo = '$admincorreo' AND password ='$adminclave'";


		$vradmin =$objCrud->read();

		if ($vradmin==0) {
		# code...
			echo "Acceso denegado..... <br>";
			echo "redireccionando...<br>";
			header("refresh:3; url=login.php");
			die();
		}

		$arAdmin = $objCrud->filas;

		$admincorreo = $arAdmin[0]["correo"];
		$adminclave = $arAdmin[0]["password"];
		
		session_start();
		$_SESSION["correo"] = $admincorreo;
		$_SESSION["password"] = $adminclave;
		

		echo "Accso autorizado.....<br>";
		header("refresh:3; url=index.html");
		}
	
 ?>