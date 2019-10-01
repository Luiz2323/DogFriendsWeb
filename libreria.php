<?php


class Conexion 
{
	
	public function conectar(){
		$servidor = "localhost";
		$usuario = "root";
		$clave = "";
		$bdatos = "dogfriends";
		$idconexion = null;


		try{
			$idconexion = new PDO("mysql:host=$servidor; dbname=$bdatos;
				charset=UTF8", $usuario, $clave);
			return $idconexion;
			//echo "<pre>";
			//print_r($idenlance);
			//echo "</pre>";
		}
		catch(PDOException $ex){
				echo "Error de conexion".$ex->getMessage()."<br>";
				echo "Contacte con el Administrador de la base de datos<br>";

			die();
		}

		
	}

}

	class Crud {
		public $tablas;
		public $campos;
		public $expresion;
		public $condicion;
		public $agrupamiento;
		public $ordenamiento;
		public $valores;
		public $filas;

		public function Crud(){
			$this->tablas = null;
			$this->campos = null;
			$this->valores = null;
			$this->filas = null;
			$this->expresion = null;
			$this->condicion = null;
			$this->ordenamiento = null;
			$this->agrupamiento = null;
			$this->filas = null;
		}



		public function create($idenlance){

			$tablas = $this->tablas;
			$campos = $this->campos;
			$valores = $this->valores;
			

			$sSQL = "INSERT INTO $tablas($campos) VALUES ($valores)";

			$pst = $idenlance->prepare($sSQL);

			$pst->execute();

			$vrerror=$pst->errorInfo();

			$this->manejo_error("Error al tratar de ingresar un registro la tabla: $tablas", $vrerror);
		}

		public function manejo_error($msg, $error){
			if ($error[0]!="00000") {
				
			echo $msg." ".$error[2]."<br>";
			echo 'Consultar con el administrador de base de datos';
			die();
		}
	}  

		

	

	

	public function read(){
		$tabla = $this->tablas;
		$expresion = $this->expresion;
		$condicion = $this->condicion;
		$agrupamiento = $this->agrupamiento;
		$ordenamiento = $this->ordenamiento;

		$sSQL = "SELECT $expresion FROM $tabla ";

		if (isset($condicion)) {
			$sSQL = $sSQL ."WHERE $condicion ";
		}

		if (isset($agrupamiento)) {
			$sSQL = $sSQL."GROUP BY $agrupamiento ";
		}

		if (isset($ordenamiento)) {
		
			$sSQL = $sSQL. "ORDER BY $ordenamiento ";
		}

	//	echo $sSQL;

		$objconexion = new conexion();
		$idenlance = $objconexion->conectar();
		$pst = $idenlance->prepare($sSQL);
		$pst -> execute();
		$vrerror = $pst->errorinfo();
		$this->manejo_error("Ocurrio un error al consultar la informacion de la tabla: $tabla",$vrerror);

		$numfil  = $pst->rowCount();

		if ($numfil>0) {
			
			//recorre los registros de un arreglo asociativo donde se devuelve el nombre de los campos de la tabla como un indice y se muestra en un arreglo con la funcion FETH_ASSOC

			while ($registro=$pst->fetch(PDO::FETCH_ASSOC)) {
			    $this->filas[]=$registro;
			}
		}
		return $numfil;
	}
		public function update(){
			$tablas = $this->tablas;
			$expresion = $this->

			expresion;
			$condicion = $this->condicion;

			$sSQL = "UPDATE $tablas SET $expresion";

			if (isset($condicion)) {
				# code...
				$sSQL = $sSQL . " WHERE $condicion ";

			}
			$objconexion = new Conexion();
			$idenlance = $objconexion->conectar();
			$pst = $idenlance->prepare($sSQL);
			$pst->execute();
			$vrerror = $pst->errorInfo();
			$this->manejo_error("Ocurrio un error al tratar de actualizar la informacion de la tabla, $tablas",$vrerror);
		}



	}

	class Utilidades {

		public function Utilidades(){
			
		}

		public function consecutivo($tablas, $campo){
			$objCrud  =  new Crud();
			//recorrer el campo en maximo valor 
			$objCrud->expresion = "max($campo) as maximo";
			$objCrud->tablas = $tablas;
			$objCrud->condicion = null;
			$objCrud->agrupamiento = null;
			$objCrud->ordenamiento = null;

			$cantidad  = $objCrud->read();
			$registro  = $objCrud->filas;
			$vrconsecutivo = $registro[0]["maximo"]+1;

			return $vrconsecutivo;
		}

		public function llenar_combo($partabla, $parcampos, $parvalenviado){

			$objCrud = new Crud();
			$objCrud->tablas = $partabla." ";
			$objCrud->expresion = $parvalenviado.",";
			$objCrud->expresion = $objCrud->expresion.$parcampos;
			$objCrud->condicion = null;
			$objCrud->agrupamiento = null;
			$objCrud->ordenamiento = $parcampos;
			$vrcantidad =  $objCrud->read();
			$ardatos = $objCrud->filas;

		//	echo '<pre>';

		//	print_r($ardatos);

		//	echo '</pre>';

			foreach ($ardatos as $arresultado) {
				$valmostrar = "";
				foreach ($arresultado as $indice => $valor) {
				 	if ($indice == $parvalenviado) {
				 		$valorenviado = $valor;
				 	}

				 	$valmostrar = $valmostrar ."&nbsp".$valor;
				 } 
			}

			echo "<option value = '$valorenviado'>$valmostrar </option>";
		}
		public function llenar_seleccionado($tabla, $campos, $enviado, $sel){
			$objCrud = new Crud();
			$objCrud->tablas=$tabla;
			$aux=$enviado ." as enviado";
			$objCrud->expresion=$aux ."," .$campos;
			$objCrud->condicion=null;
			$objCrud->agrupamiento=null;
			$objCrud->ordenamiento=$campos;
			$objCrud->read();
			$vrregistro=$objCrud->filas;

			foreach ($vrregistro as $arreglo ) {
				$valenviado="";
				$valmostrar="";
				foreach ($arreglo as $indice => $valor) {
					if ($indice=="enviado") {
						$valenviado=$valor;

					}else{
						$valmostrar=$valmostrar. "&nbsp" .$valor;
					}
				}
				if ($valenviado==$sel) {
					echo "<option value='$valenviado' selected $sel> $valmostrar</option>";
				}else{
					echo "<option value='$valenviado'>  $valmostrar</option>";
				}
			}

		}

		public function validarUsuario(){
			if (!iseset($_SESSION["usuario"])) {
				# code...
				header("refresh:3 url=for_ingreso.php "); 
				echo "Acceso denegado, Iniciar sesi&oacute;n <br>";

				die();
			}
		}

		public function validarAdministrador(){
			if ($_SESSION["usu_nivel"]!=1) {
				# code...
				header("refresh:3; url=for_ingreso.php");
				echo "Acceso denegado, Iniciar sesi&oacute;n con otro usuario";
				die();

			}
		}
		public function fecha_ac(){
			return date("y,m,d");
		}
	}






 //$objconexion = new Conexion();
 //$idconexion = $objconexion ->conectar();



 ?>