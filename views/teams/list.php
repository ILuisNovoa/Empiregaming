<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h2 class="card-title"> EQUIPOS</h2>
          <div >

             

            <a href="?controller=team&method=new">
              <button class="btn btn-secondary" style="display: <?php echo $ocultar2; ?>">Crear Equipo</button></a>
            </div>
            <?php
                   if(isset($error['errorMessage'])){
                    ?>
                    <div class="alert alert-danger alert-dismissable alert-width" role="alert">
                      <button class="close" data-dismiss="alert">&times;</button>
                      <p class="text-dark"><?php echo $error['errorMessage'] ?></p>
                    </div>  
                    <?php
                  }
                  ?>        
            <!-- Modal -->
            
            <div class="card-body">
              <div class="table-responsive ps">
                <table class="table tablesorter " id="example">
                  <thead class=" text-primary">
                    <tr>
                      <th>#</th>
                      <th>Equipo</th>
                      <th>Capitan</th>
                      <!--- <th>Nivel</th>-->
                      <th>Pefil</th>
                      <th style="display: <?php echo $ocultar2; ?>">Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($users as $teams): ?>
                      <tr>
                        <td>
                          <?php echo $teams->id ?>
                        </td>
                        <td>
                          <?php echo $teams->name ?>
                        </td>
                        <td>
                          <?php echo $teams->Capitan?>
                        </td>
                        <td>
                         <a href="?controller=team&method=viewMyTeamId&id=<?php echo $teams->id ?>"><i class="fas fa-users fa-3x"></i></a>
                       </td>
                       
                       <td>
                         <a href="?controller=team_detail&method=new&id=<?php echo $teams->id ?>&idu=<?php echo $_SESSION['users']->id  ?>" style="display: <?php echo  $ocultar2;?>">
                          <button  class="btn btn-success btn-sm">Aplicar</button></a>
                        </td>
                      </tr>

                      <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered " role="document">
                          <div class="modal-content card">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Aplicar a equipo</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <form action="?controller=team&method=new&id=<?php echo $teams->id ?>" method="POST">
                                <label>Codigo del equipo</label>
                                <input type="text" name="password" class="form-control">
                                <input type="" name="" value="<?php echo $teams->id?>">


                              </div>
                              <div class="modal-footer">
                                <a href="?controller=team&method=validatePSS&password=password"><button type="button" class="btn btn-success">Buscar</button></a>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach ?>
                  </tbody>
                </table>
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
