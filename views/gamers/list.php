<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title"> Jugadores</h2>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="example">
                    <thead class=" text-primary">
                      <tr>
                        <th>#</th>
                        <th>Nombres</th>
                        <th>Apodo</th>
                        <th style="display: <?php echo  $ocultar1;?>">Email</th>
                        <th>Ver perfil</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php foreach($users as $user): ?>
                      <tr>
                        <td>
                                <?php echo $user->id ?>
                            </td>
                            <td>
                                <?php echo $user->name ?>
                            </td>
                            <td>
                                <?php echo $user->nickname ?>
                            </td>
                            <td style="display: <?php echo  $ocultar1;?>">
                                <?php echo $user->email ?>
                            </td>
                            <td>
                              
                              <a href="?controller=gamer&method=viewProfile&id=<?php echo $user->id ?>"><i class="fas fa-user-circle fa-3x"></i></a>
                              
                            </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
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