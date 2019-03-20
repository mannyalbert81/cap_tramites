<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Capremci </title>

    <!-- Bootstrap -->
    <link href="view/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="view/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="view/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="view/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="view/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
     
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="form-login" action="<?php echo $helper->url("usuarios","Loguear"); ?>" method="post" ">
              <img src="view/images/logo.png" class="img-rounded" alt="Sonda Logo">
              
              <div>
                <input id="usuario" name="usuario" type="text" class="form-control" placeholder="usuario" required="" />
              </div>
              <div>
                <input id="clave" name="clave"   type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
              	<button type="submit"  class="btn btn-primary submit" >Iniciar Sesión</button>
                
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-archive"></i> Capremci</h1>
                  <p>©2019 All Rights Reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>

              </div>
    </div>
  </body>
</html>
