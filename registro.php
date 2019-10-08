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
                       <input type="text" class="form-control" name="" required="required">
                      </div>
                </div>

                <div class="form-group">
                     <div class="col-md-2">
                        <label for="" class="col-md-3 col-form-label">Direccion:</label>
                      </div>
                  
                      <div class="col-md-6">
                       <input type="text" class="form-control" name="" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-2">
                       <label for="" class="col-md-3 col-form-label">Telefono:</label>
                      </div>
                  
                      <div class="col-md-6">
                       <input type="text" class="form-control" name="" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-2">
                       <label for="" class="col-md-3 col-form-label">Correo:</label>
                      </div>
                  
                      <div class="col-md-6">
                       <input type="text" class="form-control" name="" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-2">
                        <label for="" class="col-md-3 col-form-label">Contraseña:</label>
                      </div>
                  
                      <div class="col-md-6">
                        <input type="password" class="form-control" name="" required="required">
                      </div>
                  </div>

                 

                  

                  <div class="col-md-2 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" name=""><h4>Registrar</h4></button>
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