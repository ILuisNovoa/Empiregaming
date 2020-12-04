   <script>
  window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
                document.forms["miformulario"].submit();
              }
</script>
   <link rel="stylesheet" type="text/css" href="assets/css/Maches.css">

             <form action="?controller=match&method=save4" method="post" name="miformulario">

                    <input type="hidden" name="id_tournament" value="<?php echo $tournamets[0]->id ?>">
                    <br>


                    <input type="hidden" name="id_tour_detail_1" value="<?php echo $data[0]->id_playerWin ?>">

                    <input type="hidden" name="one" value="<?php echo $data[1]->id_playerWin ?>">

                    
                    <
                    <input type="hidden" name="id_tour_detail_2" value="<?php echo $maches[0]->id_playerWin ?>">

                    <input type="hidden" name="ones" value="<?php echo $maches[1]->id_playerWin ?>">


             </form>
           </div>

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
     


