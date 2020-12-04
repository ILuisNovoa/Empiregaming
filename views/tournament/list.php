     <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header">
              <h2 class="card-title"> TORNEOS</h2>
              <div>
               <a href="?controller=tournament&method=new">
                <button class="btn btn-secondary" style="display: <?php echo  $ocultar1;?>">Crear torneo</button></a>
              </div>
            </div>


            <!-- Modal -->
            <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Seguro que quieres aplicar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

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

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <button type="button" class="btn btn-primary">Si</button>

                </div>
              </div>
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
              <table class="table tablesorter " id="example">
                <thead class=" text-primary">
                 <th>#</th>
                 <th>Organizador</th>
                 <th>Nombre torneo</th>
                 <th>Fecha</th>
                 <th>Hora Inicio y fin</th>
                 <th>Precio</th>
                 <th>Cupos</th>
                 <th>N°llaves</th>
                 <th>Modalidad</th>
                 <th>Juego</th>
                 <th>Estado</th>
                 <th style="display: <?php echo  $ocultar2;?>" >Accion</th>
               </thead>
               <tbody>
                 <?php foreach($tournaments as $tournament): ?>
                  <tr>
                    <td>
                      <?php echo $tournament->id ?>
                    </td>
                    <td>
                      <?php echo $tournament->admin ?>
                    </td>
                    <td>
                      <?php echo $tournament->name ?>
                    </td>
                    <td>
                      <?php echo $tournament->date?>
                    </td>
                    <td>
                      <?php echo $tournament->time_start;echo " ".$tournament->time_finish?>
                    </td>
                    <td>
                      <?php echo $tournament->price?>
                    </td>
                    <td>
                      <?php echo $tournament->num_spaces?>
                    </td>
                    <td>
                      <?php echo $tournament->num_keys?>
                    </td>
                    <td>
                      <?php echo $tournament->modality?>
                    </td>
                    <td>
                      <?php echo $tournament->juego?>
                    </td>
                    <td>
                      <?php echo $tournament->status ?>
                    </td>  
                    <td>
                   <?php if ($tournament->modality == 'Grupo' and $tournament->id_status == 3) { ?>
                     <a href="?controller=tour_detail&method=newGroup&id=<?php echo $tournament->id ?>&tm=<?php echo $_SESSION['capitan'][0]->count ?>&idu=<?php  echo $_SESSION['users']->id ?>"><button class="btn btn-success btn-sm">Aplicar</button>
                     </a>
                  <?php }elseif ($tournament->id_status == 3) {
                      echo "Sin accion";
                 }else{?>
                      <a href="?controller=tour_detail&method=new&id=<?php echo $tournament->id ?>" style="display: <?php echo  $ocultar2;?>">
                        <button  class="btn btn-success btn-sm ">Aplicar</button>
                      </a>
                  <?php }  ?>  

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
