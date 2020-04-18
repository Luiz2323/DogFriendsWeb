	<?php 

						include_once("02_libreria.php");
						 $objConexion = new Conexion();
				         $idconexion  = $objConexion->conectar();

						

					    	 if(isset($_REQUEST["btnEnviar"])){
					       
					    	$nombreVete = htmlspecialchars($_REQUEST["NombreVeter"]);
					    	$DireccionVete    = htmlspecialchars($_REQUEST["DireccionVete"]);
					    	$TelefonoVete      = htmlspecialchars($_REQUEST["TelefonoVete"]);
					    	$CorreoVete     = htmlspecialchars($_REQUEST["CorreoVete"]);
					    	$ContrasenaVete     = htmlspecialchars($_REQUEST["ContrasenaVete"]);
					    	$passwordEncryt = password_hash($ContrasenaVete, PASSWORD_BCRYPT);
					
					    	
					    			try{
					    			$objCrud = new Crud();
					    				$objCrud->tablas = "usuario";
					    				$objCrud->campos = "Correo,Contrasena";
					    				$objCrud->valores = "'$CorreoVete','$passwordEncryt'";
					    				$objCrud->create($idconexion);
					    				

					    			}catch(Exception $e){
					    				echo "<script>
					    				alert('Error en el registro '.$e);
					    				windows.location='FormPacRegis.php'
					    				</script>";

					    			}

					    			try{


					    	$objCrud = new Crud();

					    				$id = $objCrud->validarUsuario("usuario","id_usuario","");
					    				$objCrud->tablas = "veterinarias";
					    				$objCrud->campos = " Nombre, Telefono, Direccion,id_usuario";
					    				$objCrud->valores = "'$nombreVete','$TelefonoVete','$DireccionVete',$id";
					    				$objCrud->create($idconexion);
					    				echo "<script>
					    				alert('Su registro se completo exitosamente');
					    				windows.location='FormPacRegis.php'
					    				</script>";
					    				
					    				header("refresh:0;url=login.php");


					    			}catch(Exception $e){
					    				echo "<script>
					    				alert('Error en el registro '.$e);
					    				windows.location='FormPacRegis.php'
					    				</script>";

					    			}

					    


					    	
					 
					    	
					    				
					    			
					    		
					    	

					    }
					    $idconexion = $objConexion->desconectar($idconexion);





						?>







<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <meta charset="UTF-8">
  <title>Registro Veterinaria</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
  <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/main.css"> 
    
  
</head>
<body>
  <div class="container">
    <br>
    <br>
    
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <fieldset>
            <legend class="text-center header">Registrar  una veterinaria</legend>
            <form action='<?php echo $_SERVER["PHP_SELF"];?>' enctype="multipart/form-data" method="POST" class="form-horizontal">
            <br>
              <div class="col-md-8 col-md-offset-3">
                <div class="form-group">
                     <div class="col-md-2">
                        <label for="" class="col-md-3 col-form-label">Nombre Veterinaria</label>
                      </div>
                  
                      <div class="col-md-6">
                       <input type="text" class="form-control" name="NombreVeter" required="required">
                      </div>
                </div>

                <div class="form-group">
                     <div class="col-md-2">
                        <label for="" class="col-md-3 col-form-label">Direccion:</label>
                      </div>
                  
                      <div class="col-md-6">
                       <input type="text" class="form-control" name="DireccionVete" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-2">
                       <label for="" class="col-md-3 col-form-label">Telefono:</label>
                      </div>
                  
                      <div class="col-md-6">
                       <input type="number" class="form-control" name="TelefonoVete" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-2">
                       <label for="" class="col-md-3 col-form-label">Correo:</label>
                      </div>
                  
                      <div class="col-md-6">
                       <input type="text" class="form-control" name="CorreoVete" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-2">
                        <label for="" class="col-md-3 col-form-label">Contraseña:</label>
                      </div>
                  
                      <div class="col-md-6">
                        <input type="password" class="form-control" name="ContrasenaVete" required="required">
                      </div>
                  </div>

                 

                  

                  <div class="col-md-2 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" name="btnEnviar"><h4>Registrar</h4></button>
                  </div>

                   

   
              </div>
          
            </form>

            <div class="col-md-2 col-md-offset-4" style="margin-left:900px; margin-top: -380px; ">
            <center>  <a href="login.php">Iniciar sesion</a></center>
            </div>
          </fieldset>
          
        </div>
        
      </div>
    </div>
  </div>

  

  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="js/main.js"></script>
  
</body>
</html>