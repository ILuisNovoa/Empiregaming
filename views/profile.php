  <!--body -->     
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

                        <div class="title" style="padding-left: 0px">
                          <?php   echo '<img class="avatar" src="data:url/jpeg;base64,'.base64_encode( $_SESSION['users']->imagess ).'"/>'?>
                          
                        </div>
                        <h5 class="title"><?php echo $_SESSION['users']->name?> <?php echo $_SESSION['users']->last_name?></h5>
                        <p class="description">
                          <?php echo $_SESSION['users']->nickname ?>
                        </p>
                      
                      </div>
                    </p>
                    <p class="description">
                      Correo:<?php echo $_SESSION['users']->email?>
                    </p>
                    <p class="description">
                      Nivel :<?php echo $_SESSION['users']->level?>
                    </p>

                  </div>
                  <div class="card-footer ">
                  </div>
                </div>
              </div>
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
        
        <!--end body -->