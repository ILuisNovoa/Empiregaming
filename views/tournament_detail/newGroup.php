
 <script>
  window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
                document.forms["miformulario"].submit();
              }
</script>

 


<!--scrip para volver a la pagina anterior--> 
 
            <form action="?controller=tour_detail&method=save" method="POST" name="miformulario">
              <!--se manda el id--> 
          <input type="hidden" name="id_tournament" value="<?php echo $data[0]->id ?>">
          
          <!--se mandan los datos del ususario en sesion--> 
          <input  type="hidden" name="Email" type=""
          value="<?php echo $_SESSION['users']->email?>">
          <input  type="hidden" name="id_team"
          value="<?php echo $teamTD[0]->id?>">
          <input  type="hidden" name="participants" type="" 
          value="<?php echo $teamTD[0]->nameteam?>">

          <!--form para el num space -->
          <input type="hidden" name="num_spaces" value="<?php echo $data[0]->num_spaces - 1 ?>"> 
          <input type="hidden" name="num" value="<?php echo $data[0]->num_spaces?>">
        </form>
