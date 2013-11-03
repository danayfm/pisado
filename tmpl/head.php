<!doctype html>

<html>
  
  <head>
    <title>PISADO</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js" type="text/javascript"></script>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <style type="text/css">
      body {
        padding-top: 50px;
        padding-bottom: 20px;
      }
      .glyphicon {  
		margin-bottom: 10px;margin-right: 10px;}
	  small {
		display: block;
		line-height: 1.428571429;
		color: #999;
	   }
    </style>
  </head>
  
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">P.I.S.A.DO</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="index.php">Inicio</a>
            </li>
            <?php if ($user->user_is_logged_in) { ?>
            <li>
              <a href="#about">Listar</a>
            </li>
            <?php } ?>
            <li>
              <a href="#contact">Rellenar</a>
            </li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
			<?php if ($user->user_is_logged_in) { ?>
				<li id="nav-register-btn">
				  <a href="cuenta.php">	  
					<?= $user->user_name ?>
					</a>
				</li>
            <li id="nav-login-btn">
              <a href="index.php?logout"><i class="icon-login"></i>Salir</a>
            </li>
            <?php } else { ?>
			<li id="nav-login-btn">
              <a href="cuenta.php"><i class="icon-login"></i>Login</a>
            </li>
			<?php }  ?>
          </ul>
        </div>
        <!--/.navbar-collapse -->
      </div>
    </div>
    
