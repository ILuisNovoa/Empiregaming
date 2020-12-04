<main class="container" >
	<section class="row mt-5">
		<div class="card w-50 m-auto md-12">
			<div class="card-body w-100"><div class="row">
				<h1 class="col-md-12 d-flex justify-content-center">Configurar torneo</h1>			
			</div>
			<form action="?controller=tournament&method=update" method="POST">

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

				<input type="hidden" name="id" value="<?php echo $data[0]->id ?>">
				
				<div class="row">
					<div class="col-md-6 pr-md-1">
						<div class="form-group">
							<label>Nombre del Torneo</label>
							<input type="text" name="name" class="form-control" placeholder="Nombre del Torneo" value="<?php echo $data[0]->name ?>">
						</div>
					</div>
					<div class="col-md-6 pr-md-1">
						<div class="form-group">
							<?php
								date_default_timezone_set('America/Bogota') ;
								$fecha_actual=date("Y-m-d");
							?>
							<label>fecha y hora</label>
							<input required="" min="<?php echo $fecha_actual ?>" type="date" name="date" class="form-control" placeholder="Nombre del equipo" value="<?php echo $data[0]->date ?>" >
						</div>
					</div>
					<div class="col-md-6 pr-md-1">
						<div class="form-group">
			
							<label>Hora inicio</label>
							<input required="" id="date" type="time" name="time_start" class="form-control" placeholder="Nombre del equipo" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>" >
						</div>
					</div>
					<div class="col-md-6 pr-md-1">
						<div class="form-group">
	
							<label>Hora final</label>
							<input required="" id="date" value="<?php echo $timefinish ?>" type="time" name="time_finish" class="form-control" placeholder="Nombre del equipo"  value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>" >
						</div>
					</div>
					<div class="col-md-6 pr-md-1">
						<div class="form-group">
							<label>Precio</label>
							<input type="number" name="price" class="form-control" placeholder="Costo del torneo" value="<?php echo $data[0]->price ?>">
						</div>
					</div>
					<div class="col-md-6 pr-md-1">
						<div class="form-group">
							<label>Tipo de torneo</label>
							<select name="modality" class="form-control">
								<option class="selector">seleccione...</option>
								<option class="selector">Grupo</option>
								<option class="selector">Solo</option>
							</select>
						</div>
					</div>
					<div class="col-md-3 pr-md-1">
						<div class="form-group">
							<label>Juego</label>
							<select name="id_game" class="form-control">
								<option value="" class="selector">Seleccione...</option>                                
								<?php
								foreach ($games as $game) {
									?>
									<option class="selector" value="<?php echo $game->id ?>"><?php echo $game->name ?></option>
									<?php                                       
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3 pr-md-1">
						<div class="form-group">
							<label>Numero de llaves</label>
							<select name="num_matches" class="form-control">
								<option class="selector">seleccione...</option>
								<option class="selector">2</option>
								<option class="selector">4</option>
								<option class="selector">8</option>
							</select>
						</div>
					</div>
					
				</div>


				<div class="form-group formulari">
					<button class="btn btn-success float-right">Guardar</button>
				</div>
			</form>
		</div>
	</div>

</section>
</main>
