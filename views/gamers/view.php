

     <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card  card-user">
                  <div class="card-body ">
                    <p class="card-text">
                      <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <img class="avatar" src="assets/images/anime2.png" alt="...">

                          <input type="hidden" name="id" value="<?php echo $data[0]->id ?>">


                        <h5 class="title"><?php echo $data[0]->name?> <?php echo $data[0]->last_name?></h5>
                        <p class="description">
                          <?php echo $data[0]->nickname ?>
                        </p>
                      </div>
                    </p>
                    <p class="description" style="display: <?php echo  $ocultar1;?>">
                      Correo : <?php echo $data[0]->email?>
                    </p>
                    <p class="description">
                      Nivel : <?php echo $data[0]->level?>
                    </p>
                    
                  </div>
                  <div class="card-footer ">
                  </div>
                </div>
              </div>
            <div class="card-footer ">
            </div>
          </div>
          <footer class="footer">
          <div class="container-fluid">
            <div class="copyright float-right">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>  derechos <i class="tim-icons icon-heart-2"></i> reservados
              <a href="https://www.facebook.com" target="_blank">EmpireGaming</a> Luis Novoa 
            </div>
          </footer>
        </div>
      </div>