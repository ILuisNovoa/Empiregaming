   <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title"> Juegos</h2>
                <div>
                  <a href="?controller=game&method=new">
                  <button class="btn btn-secondary " >Agregar</button></a>
                </div>
              </div>
    
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="example">
                    <thead class="text-primary">
                       <th>#</th>
                        <th>Nombre</th>
                    </thead>
                    <tbody>
                       <?php foreach($games as $game): ?>
                      <tr>
                        <td>
                                <?php echo $game->id ?>
                            </td>a
                            <td>
                                <?php echo $game->name ?>
                            </td>
                            <td>
                               
                               <a href="?controller=game&method=edit&id=<?php echo $game->id ?>"><i class="fas fa-cog fa-2x" style="padding-left: 8px;"></i> 
                               </a>
                               <?php
                               if($game->status_id == 1) { 
                                ?>
                                <a href="?controller=game&method=updateStatus&id=<?php echo $game->id ?>"><i class="far fa-check-circle fa-2x"></i></a>
                                <?php
                              } elseif($game->status_id == 2) { 
                                ?>
                                <a href="?controller=game&method=updateStatus&id=<?php echo $game->id ?>" ><i class="far fa-circle fa-2x"></i></a>
                                <?php
                              } 
                              ?>
                              
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