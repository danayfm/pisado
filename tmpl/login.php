
<?php 
 if (!$user->user_is_logged_in) { ?>
 <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">Login para delegados
            </div>
            <div class="panel-body">
              <form accept-charset="UTF-8" role="form" method="post">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="NIA" name="user_nia" type="text">
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Contrase&ntilde;a" name="user_password" value type="password">
                  </div>
                  <input class="btn btn-lg btn-success btn-block" value="Login" type="submit">
                </fieldset>
              </form>
            </div>
          </div>
          <div class="alert alert-dismissable alert-info">Este login es &uacute;nicamente para los <b>delegados</b>. Para completar un pisado
             <b>no </b>hace falta iniciar sesi&oacute;n.<br></div>
         
         <?php if (!empty($user->error)) { ?>
				<div class="alert alert-dismissable alert-info">
					<?php echo $user->error ?>
				<br></div>   
		<?php } ?>  
      
        </div>
      </div>
    </div>
    
<?php } else { ?>
	
	
	<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?= $user->user_name ?></h4> 
                        <small><cite title="Universidad Carlos III">Universidad Carlos III <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?= $user->user_email ?>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>                         
                            <?= $user->getCourse() ?>       
                         </p>
                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>  
