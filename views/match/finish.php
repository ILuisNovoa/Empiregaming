	<main class="container" >
		<section class="row mt-5">
			<div class="card w-50 m-auto md-12">
				<div class="card-body w-100"><div class="row">
					<h1 class="col-md-12 d-flex justify-content-center">Finalizar encuentro</h1>			
				</div>
				<form action="?controller=match&method=update" method="POST">

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



					<div class="form-group formulari">
						<label>Seleccione al ganador</label>

						<!--busca la hora local -->
						<?php 
						date_default_timezone_set('America/Bogota') ;
						$fecha_actual=date("Y-m-d H:i:s");
						?>

						<input type="hidden" name="finish" value="<?php echo $fecha_actual ?>">

						<input type="hidden" name="id_status" value="8">

						<input type="hidden" name="id_tournament" value="<?php echo $tournaments[0]->id ?>">

						<input type="hidden" name="id" value="<?php echo $maches[0]->idmatch ?>">

						<input type="hidden" name="num_key" value="<?php echo $maches[0]->num_key ?>">

						<select class="form-control" name="id_playerWin" required="" >
							<option class="selector"></option>
							<?php foreach ($maches as $match ) { ?>
								<option class="selector" value="<?php echo $match->id_tour_detail_1 ?>">
									<?php echo $match->participante1;  ?>
								</option>
								<option class="selector" value="<?php echo $match->id_tour_detail_2 ?>">
									<?php echo $match->participante2; ?>
								</option>
							<?php } ?>
							
						</select>
					</div>
					<div class="form-group formulari">
						<button class="btn btn-success float-right">Finalizar</button>
					</div>
				</form>
			</div>
		</div>
		
	</section>
</main>

