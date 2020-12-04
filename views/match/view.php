   <link rel="stylesheet" type="text/css" href="assets/css/Maches.css">


<!-- Titulos de la pagina -->
   <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h2 class="card-title"> Partidas de: <?php echo $tournamets[0]->name ?></h2>
            <?php 
                if ($maches[0]->num_key == 8) {
                   $msg = "Cuartos de final";
                }elseif ($maches[0]->num_key == 4) {
                   $msg = "semi final";
                }elseif ($maches[0]->num_key == 2) {
                   $msg = "final";
                }
           ?>
           <h4 class="card-title"> <?php echo  $msg ?></h4>

<!-- numero actualizado de partidas -->
           <?php 
               if ($maches[0]->num_key == 8) {
                  $xd = $maches[0]->num_key = 4;
              }elseif ($maches[0]->num_key == 4) {
                  $xd = $maches[0]->num_key = 2;
              }elseif ($maches[0]->num_key == 2) {
                  $xd = $maches[0]->num_key = 0;
              }
         ?>
          

<!-- mensaje de error -->
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


<!-- validacion de finalizar torneo o ir a la parte de resultados -->
         
         <?php $s =3;

         if ($xd == 0 && $tournamets[0]->status == 3  ){  ?>
           <div>
            <a href="?controller=result"><button class="btn btn-secondary float-right">Vover a resultados</button></a>
          </div>

        <?php } elseif ($tournamets[0]->status == 4 && $_SESSION['users']->id_rol == 1 && $xd == 0 && $finishT[0]->count == 0){  ?>
          <a href="?controller=tournament&method=finish&id=<?php echo $tournamets[0]->id ?>&s=<?php echo $s ?>&p=<?php echo $maches[0]->playerwin  ?>"><button class="btn btn-secondary float-right">Finalizar torneo</button></a>

        <?php }  elseif ($maches[0]->num_key == 8 && $existe8[0]->numC == 4 
          || $maches[0]->num_key == 4 && $existe4[0]->numC == 2 
          || $maches[0]->num_key == 2 && $existe2[0]->numC == 1   ) {  ?>




<!-- ver siguiente fase segun el stado del torneo o pasar a la siguiente fase-->

          <div>
            <a href="?controller=match&method=maches&id=<?php echo $tournamets[0]->id ?>&numk=<?php echo $xd ?>"><button class="btn btn-secondary float-right">Ver siguiente fase</button></a>
          </div>

        <?php } elseif($tournamets[0]->id_status != 3 && $_SESSION['users']->id_rol == 1 )  { ?>

           <div>
            <a href="?controller=match&method=validateMatch&key=<?php echo $xd  ?>&id=<?php echo $tournamets[0]->id ?>&numk=<?php echo $numk ?>"><button class="btn btn-secondary float-right">Pasar a la siguiente fase</button></a>
          </div>
        <?php } ?>

        <?php if (
          $xd == 0 || 
          $_SESSION['users']->id_rol == 2 || 
          $existe16[0]->numC === 0 || 
          $existe4[0]->numC === 0 || 
          $existe2[0]->numC === 0 

        ){  } ?>


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
                     <h5>N/A</h5>
                     <?php
                   } 
                   ?>   
                 <?php } ?>


               </th>
               <tr>
                <td  class="isid"><?php echo $match->idmatch ?></td>

                <th rowspan="1" class="J1">

                  <input readonly="" style="background: rgba(255,255,255,1); width: 90px;" type="text" name="id_tour_detail_2" readonly="readonly" value="<?php echo $match->participante2 ?>">
                </th>
                <!--consulta ganador  -->
                <?php 
                  
                $Pwin = $match->Id_playerWin; 

                if ($Pwin == '') {
                  $Pwin = 'Esperando...';
                }else{
                $this->pdo = new Database;
                $strSql = "SELECT participants FROM tour_detail where id=$Pwin";
                $query=$this->pdo->select($strSql);

                $Pwin = $query[0]->participants;
                }
                ?>

              </tr>
              <tr>
                <td  class="isid"><p>Ganador</p></td>

                <th rowspan="1" class="J1">

                  <p><?php echo $Pwin ?></p>
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
