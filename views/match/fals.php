  <script>
  window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
                document.forms["miformulario"].submit();
              }
</script>

             <form action="?controller=match&method=save" method="post" name="miformulario">

                    <input type="hidden" name="id_tournament" value="<?php echo $tournamets[0]->id ?>">
                    <input type="hidden" name="num_key" value="<?php echo $tournamets[0]->num_keys ?>">
                    <br>


                    <input type="hidden" name="id_tour_detail_1" value="<?php echo $data[0]->id ?>">
                    <input type="hidden" name="one" value="<?php echo $data[1]->id ?>">

                    <input type="hidden" name="dos" value="<?php echo $data[2]->id ?>">

                    <input type="hidden" name="tres" value="<?php echo $data[3]->id ?>">
                    <br>


                    
                    <input type="hidden" name="id_tour_detail_2" value="<?php echo $tour_details[0]->id ?>">

                    <input type="hidden" name="ones" value="<?php echo $tour_details[1]->id ?>">

                    <input type="hidden" name="doss" value="<?php echo $tour_details[2]->id ?>">

                    <input type="hidden" name="tress" value="<?php echo $tour_details[3]->id ?>">


             </form>
      
     


