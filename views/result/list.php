
   <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title"> RESULTADOS</h2>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="example">
                    <thead class=" text-primary">
                        <th>Numero de llaves</th>
                        <th>Torneo</th>
                        <th>Ganador</th>
                        <th>Ver partidas</th>
                    </thead>
                    <tbody>
                       <?php foreach($results as $result): ?>
                      <tr>
                            <td>
                                <?php echo $result->keyss ?>
                            </td>
                            <td>
                                <?php echo $result->tournament ?>
                            </td>
                            <td>
                                <?php echo $result->player?>
                            </td>
                            <td>       
                               <a href="?controller=match&method=maches&id=<?php echo $result->idt ?>&numk=<?php echo $result->keyss ?><?php  ?>" class="btn btn-warning">ver partida</a>
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