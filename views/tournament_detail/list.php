     <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header">
              <h2 class="card-title"> Torneo: <?php echo $data[0]->name ?> </h2>
              <div style="display: <?php echo  $ocultar1;?>">

                <?php 
                foreach ($matches as $match ) {
                  $match->count;
                }
                  if ($match->count > 0) { ?>

                  <a href="?controller=match&method=maches&id=<?php echo $data[0]->id ?>&numk=<?php echo $data[0]->num_keys ?>"><button class="btn btn-secondary ">Ir a partida</button></a> 
                    
                 <?php }else{?>
                <a href="?controller=tournament&method=validateparts&id=<?php echo $data[0]->id ?>&num_spaces=<?php echo $data[0]->num_spaces ?>"><button class="btn btn-secondary ">Iniciar Torneo</button></a> 

              <?php } ?>
              </div>
              <div>
                <h4>Cupos disponibles: <?php echo $data[0]->num_spaces ?></h4>
                <h4>Participantes</h4>
              </div>
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
            <div class="card-body">
              <div class="table-responsive ps">
                <table class="table tablesorter " id="">
                  <thead class=" text-primary">
                   <th>#</th>
                   <th>Participantes</th>
                   <th style="display: <?php echo  $ocultar1;?>">Email</th>
                   <th>estado</th>
                   <th>Perfil</th>
                   <th style="display: <?php echo  $ocultar1;?>">Acción</th>
                 </thead>
                 <tbody>
                   <?php foreach($tournament as $tournaments): ?>
                    <tr>
                      <td>
                        <?php echo $tournaments->id?>
                      </td>
                      <td>
                        <?php echo $tournaments->participants ?>
                      </td>
                      <td style="display: <?php echo  $ocultar1;?>">
                        <?php echo $tournaments->Email ?>
                      </td>
                      <td>
                        <?php echo $tournaments->status?>
                      </td>
                      <td>
                        <?php if ($data[0]->modality == 'Grupo'){  ?>

                        <a href="?controller=team&method=viewMyTeamId&id=<?php echo $tournaments->id_team ?>"><i class="fas fa-users fa-3x"></i></a>
                        <?php }else{  ?>                      
                       <a href="?controller=gamer&method=viewProfile&id=<?php echo $tournaments->id_user ?>"><i class="fas fa-user-circle fa-3x"></i></a>
                     <?php } ?>
                     </td>

                     <?php if ($matches[0]->count > 0) { ?>
                       <td>sin accion</td>
                     <?php }else {  ?>


                     <td>
                      <a href="?controller=tour_detail&method=delete&id=<?php echo $tournaments->id ?>&num_spaces=<?php echo $data[0]->num_spaces + 1 ?>&id_tournament=<?php echo $data[0]->id ?>"style="display: <?php echo  $ocultar1;?>" >
                        <button  class="btn btn-danger btn-sm"  >quitar </button></a>
                        <?php
                        if($tournaments->status_id == 6) { 
                          ?>
                          <a style="display: <?php echo  $ocultar1;?>" href="?controller=tour_detail&method=updateStatus&id=<?php echo $tournaments->id ?>"><button class="btn btn-success btn-sm">Inscribir</button></a>
                          <?php
                        } elseif($tournaments->status_id == 5) { 
                          ?>
                          <a style="display: <?php echo  $ocultar1;?>" href="?controller=tour_detail&method=updateStatus&id=<?php echo $tournaments->id ?>" ><button class="btn btn-success btn-sm">Pre-incribir</button></a>
                          <?php
                        } 
                        ?>
                      </td>
                    <?php } ?>

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



