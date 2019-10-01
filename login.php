<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <meta charset="UTF-8">
  <title>Ingreso</title>
  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
  <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/main.css"> 
    
       
  

<!---->

    
  
</head>
<body>
  <div class="container">
    <br>
    <br>
    
    <div class="row">
      <div class="col-md-12">
        <div class="well well-sm">
          <fieldset>
            <legend class="text-center header">Formulario de ingreso</legend>
            <form action="libreria_login.php" method="POST" class="form-horizontal">
            <br>
              <div class="col-md-8 col-md-offset-3">
                <div class="form-group">
                     <div class="col-md-2">
                        <label for="" class="col-md-3 col-form-label">Usuario</label>
                      </div>
                  
                      <div class="col-md-6">
                       <input type="text" class="form-control" name="correo" required="required">
                      </div>
                </div>

                <div class="form-group">
                     <div class="col-md-2">
                        <label for="" class="col-md-3 col-form-label">Contraseña</label>
                      </div>
                  
                      <div class="col-md-6">
                       <input type="password" class="form-control" name="password" required="required">
                      </div>
                  </div>

                  

                  <div class="col-md-2 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" name="btnAdicionar"><h4>Iniciar</h4></button>
                  </div>

   
              </div>
          
            </form>
          </fieldset>
          
        </div>
        
      </div>
    </div>
  </div>

  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="js/main.js"></script>
  
</body>
</html>