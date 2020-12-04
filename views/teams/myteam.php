<!--body -->     
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card  card-user">
          <div class="card-body ">
            <p class="card-text">
              <div class="author">
              
               <?php

               $num = $data[0]->numReg;
               $name = $data[0]->name;
               $ide = $data[0]->id_team;

                if ($num ==0) {
                 echo "<h1> ¡USTED NO PERTENECE NINGUN EQUIPO! </h1>";
                 echo "<h6> intenta crear uno <h6>";
                  echo "  <div><a href=\"?controller=team&method=new\"><button class=\"btn btn-success\">Crear equipo</button> </div>";
               }else{

                   echo " <div><h1>". $name ."</h1> </div>";
                   echo "  <div><a href=\"?controller=team&method=viewMyTeamId&id=".$ide."\"><button class=\"btn btn-success\">Ver Equipo</button> </div>";

                 }

                    ?>

                 

                </div>
              </p>
              <div class="card-footer ">
           </div>
         </div><a href=""></a>
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