
<?php 

 	class Conexion {

 		public function conectar(){

 			$servidor 	= "localhost";
 			$usuario  	= "root";
 			$clave    	= "";
 			$bdatos   	= "Dogs";
 			$idconexion = null;
 		
 		try {
 			
 			$idconexion= new PDO ("mysql:host=$servidor;dbname=$bdatos; charset=UTF8", $usuario, $clave);
 			echo "Conexion exitosa <br>";
 			return $idconexion;
 		} catch (PDOException $e) {
 			echo "Error de conexion:". $e->getMessage()."<br>";
 			echo "Contacte al Adminstrador del servidor de BDD.. <br>";
 			die();
 			
 		}
 	}
 	public function desconectar($idconexion){
			$idconexion = null;
			return $idconexion;
		}

}
 	

 	Class Crud{

 		public $tablas;
 		public $campos;
 		Public $valores;
 		public $expresion;
 		public $condicion;
 		public $ordenamiento;
 		public $agrupamiento;
 		public $filas;


 		public function Crud(){

 			$this->tablas 		= null;
 			$this->campos		= null;
 			$this->valores		= null;
 			$this->expresion 	= null;
 			$this->condicion	= null;
 			$this->ordenamiento	= null;
 			$this->agrupamiento	= null;
 			$this->filas 		= null;

 		}


 		public  function validarUsuario($tabla,$lugar){
	    			if ($lugar == "id_usuario") {
	    				
	    			
	    			$objCrud             = new Crud();
					  $objCrud->tablas     = "$tabla";
					  $objCrud->expresion  = "*";
					  $objCrud->condicion  = "1";
					  $vrcanUsuarios       = $objCrud->read();


					  $arUsuario           = $objCrud->filas;
					  $id = $arUsuario[0]['idUsuario'];
					  return $id;

	    			
	    			}
	    		}

 		public function create($idenlace){

 			$tablas =$this->tablas;
 			$campos =$this->campos;
 			$valores =$this->valores;

 			$sSQL ="INSERT INTO $tablas($campos) VALUES ($valores)";
 			$pst = $idenlace->prepare($sSQL);
 			$pst->execute();
 			$vrerror=$pst->errorInfo();
 			$this->manejo_error("Error al tratar de ingresar un registro a tabla: $tablas", $vrerror);

 		}

 		public function manejo_error($msg, $error){

	 		if ($error[0]!="00000") {

	 			echo $msg ." ". $error[2] . "<br>";
	 			echo "Consultar con el administrador de Bdd <br>";
	 			die();

	 		}

	 	}

	 	public function read(){


	 		$tabla 			= $this->tablas;
	 		$expresion		= $this->expresion;
	 		$condicion		= $this->condicion;
	 		$agrupamiento	= $this->agrupamiento;
	 		$ordenamiento	= $this->ordenamiento;

	 		$sSQL	= "SELECT $expresion FROM $tabla ";

	 		if (isset($condicion)) {

	 			$sSQL = $sSQL ."WHERE $condicion ";
	 		
	 		}
	 		if (isset($agrupamiento)) {

	 			$sSQL = $sSQL ."GROUP BY $agrupamiento ";
	 	
	 		}
	 		if (isset($ordenamiento)) {

	 			$sSQL = $sSQL . "ORDER BY $ordenamiento ";

	 		}
	

	 		$objConexion 	= new Conexion();
	 		$idenlace 		= $objConexion->conectar();
	 		$pst			= $idenlace->prepare($sSQL);
	 		$pst->execute();
	 		$vrerror		= $pst->errorinfo();
	 		
	 		$this->manejo_error("Error al tratar de ingresar un registro a tabla: $tabla", $vrerror);

	 		$numfil			=$pst->rowCount();

	 		if ($numfil>0) {

	 			while ($registro=$pst->fetch(PDO::FETCH_ASSOC)) {

	 				$this->filas[]=$registro;
	 				
	 			}

	 		
	 		}

	 		return $numfil;

	 	}
 	}

class Utilidades{

	public function Utilidades(){


	}

	public function consecutivo($tabla, $campo){

		$objCrud 				= new Crud();
	
		$objCrud->expresion 	= "max($campo) as maximo";
		$objCrud->tablas		= $tabla;
		$objCrud->condicion		= null;
		$objCrud->agrupamiento	= null;
		$objCrud->ordenamiento	= null;

		$cantidad				= $objCrud->read();
		$registro 				= $objCrud->filas;
		$vrconsecutivo			= $registro[0]["maximo"]+1;
		return $vrconsecutivo;



	}

public function llenar_combo($partabla,$parcampos,$parvalenviado){
           	  
               $objcrud               = new Crud();
               $objcrud->tablas       = $partabla;
               $objcrud->expresion    = $parvalenviado.",";
               $objcrud->expresion    = $objcrud->expresion .$parcampos;
               $objcrud->condicion    = null;
               $objcrud->agrupamiento = null;
               $objcrud->ordenamiento = $parcampos;
               $vrcantidad            =$objcrud->read();
               $ardatos               =$objcrud->filas;
           
               echo "<pre>";
               print_r($ardatos);
               echo "</pre>";
             
               foreach ($ardatos as  $arresultado) {
                    $valmostrar = "";
                    foreach ($arresultado as $indice => $valor) {
                        if($indice==$parvalenviado){
                            $valorenviado = $valor;
                        }
                        
                     $valmostrar = $valmostrar ."&nbsp;".$valor;
                        
                    }
                  
                    echo "<option value='$valorenviado'>$valmostrar</option>";
                    

                }

            }

	    		
    		}


    	

    

    	

    

  

  ?>
