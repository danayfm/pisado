
<div class="container">
      <div class="row">
          <?php if (!empty($pisado->error)) { ?>
              <div class="alert alert-dismissable alert-info">
                  <?php echo $pisado->error ?>
                  <br></div>
          <?php } ?>
          <form accept-charset="UTF-8" role="form" method="post">
          <h1>Escribe tu pisado:<br></h1>
          <textarea rows="8" class="form-control" required name="texto"></textarea>
          <label class="form-label">Email (recomendamos no usar el de la universidad):</label>
          <input class="form-control input-sm" type="email" required name="email">
          <input type="hidden" name="insertPisado"/>
           <hr>
           <button type="submit" class="btn btn-success btn-block">Submit</button>
        </form>
      </div>