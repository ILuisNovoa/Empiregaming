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
                <img class="avatar" src="assets/images/anime2.png" alt="...">
                <h3 class="title"><?php echo $data[0]->name?></h3>

                <?php if ($data[0]->user == $_SESSION['users']->id)  {  ?>
                <h6 class="title">Codigo: <?php echo $data[0]->password ?></h6>
                <?php } ?>

                <p class="description">
                  Lider: <?php echo $data[0]->Capitan ?>
                </p>
              </div>
            </p>
            <p class="description">
              Descripcion:<p>
                <?php echo $data[0]->description?>

              </p>
            </p>
            <div>
              <div>

                <?php if ($data[0]->id == $_SESSION['id_team']) {?>
              
                      <a href="?controller=tournament&method=getByIdTeam&id=<?php echo $data[0]->id ?>"><button class="btn btn-succes float-right">Ver torneos del equipo</button>
                   </a> 

                 <?php } ?>


                
               <H3>Integrantes</H3>
            </div>
            <div>
              
                   <?php foreach($teamD as $team_detail): ?>
                    
                      <h6><span><?php echo $team_detail->nickname ?></span></h6>

                      <?php endforeach ?>
            
              
              </div>
              <div class="card-footer ">
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