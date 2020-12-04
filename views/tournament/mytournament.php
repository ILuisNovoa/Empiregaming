     <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header">
              <h2 class="card-title"> Mis torneos </h2>
            </div>
            <!-- Modal -->
     

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
                 <th>Fecha y Hora</th>
                 <th>precio</th>
                 <th>Cupos</th>
                 <th>numero de llaves</th>
                 <th>modalidad</th>
                 <th>Juego</th>
                 <th>estado</th>
                 <th>Accion</th>
               </thead>
               <tbody>
                 <?php foreach($data as $tournament): ?>
                  <tr>
                    <td>
                      <?php echo $tournament->id?>
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

                      <a href="?controller=tournament&method=viewTournamentId&id=<?php echo $tournament->id ?>">
                        <button  class="btn btn-success btn-sm"  >Ir a torneo</button></a>
                        <?php if ($tournament->id_status == 3){ ?> 

                          <button  class="btn btn-danger btn-sm">Configurar</button>

                        <?php }else{?>
                      <a href="?controller=tournament&method=edit&id=<?php echo $tournament->id ?>">
                        <button class="btn btn-info btn-sm"> Configurar</button></a>
                        <?php } ?> 
                      </td>
                   
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
