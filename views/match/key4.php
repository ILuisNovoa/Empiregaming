   <link rel="stylesheet" type="text/css" href="assets/css/Maches.css">


   <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h2 class="card-title"> Partidas de: <?php echo $tournamets[0]->name ?></h2>
            <h4 class="card-title"> llave de 4 </h4>
            
            <div>
              <a href="?controller=match&method=macheskey4&id=<?php echo $tournamets[0]->id ?>"><button class="btn btn-secondary float-right">siguiente fase</button></a>
            </div>

          </div>

          
          <div>
            <?php foreach ($maches as $match ) { ?>
              <div class="caja1">  
                <!-- tablas1  -->


                
                <table class="table">
                  <tr>
                    <th colspan="4">Estado  (<?php echo $match->status ?>) </th>
                  </tr>
                  <tr>
                    <th class="isid">#</th>
                    <th colspan="2" class="J1">

                      <input readonly="" style="background: rgba(255,255,255,1); width: 90px;" type="text" name="id_tour_detail_1" readonly="readonly" value="<?php echo $match->participante1 ?>" >

                    </th>
                    <th rowspan="4" class="action">

                      <!--busca la hora local -->
                      <?php 
                      date_default_timezone_set('America/Bogota') ;
                      $fecha_actual=date("Y-m-d H:i:s");
                      ?>
                      <?php if ($_SESSION['users']->id_rol == 2) { ?>
                        ...
                      <?php }else{  ?>

                      <!-- botones --> 
                      <?php
                      if($match->id_status == 9) { 
                        ?>
                        <a href="?controller=match&method=updateStatus&id=<?php echo $match->idmatch ?>&start=<?php echo $fecha_actual ?>" class="btn btn-success btn-sm">Iniciar</a>
                        <?php
                      } elseif($match->id_status == 7) { 
                        ?>
                        <a href="?controller=match&method=finishMatch&id=<?php echo $match->idmatch ?>&idT=<?php echo $tournamets[0]->id ?>" class="btn btn-danger btn-sm" style="display: <?php echo  $ocultar1;?>">Finalizar</a>
                        <?php 
                      }elseif ($match->id_status == 8) {
                       ?>
                       <h5>FIN</h5>
                       <?php
                     } 
                     ?>   
                   <?php } ?>


                   </th>
                   <tr>
                    <td  class="isid"><?php echo $match->idmatch ?></td>
                    <th rowspan="3" class="J1">

                      <input readonly="" style="background: rgba(255,255,255,1); width: 90px;" type="text" name="id_tour_detail_2" readonly="readonly" value="<?php echo $match->participante2 ?>">


                    </th>
                  </tr>
                </table> 
              </div>
            <?php } ?>


<!-- modalll
            
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

 Modal 
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Seleccine el jugador ganador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select class="form-control">
          <option>....</option>

        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

-->



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
      </div>
    </footer>



