   <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title"> Crear Torneo</h2>
              </div>
              <div class="card-body">
              	
              	<form action="?controller=tournament&method=save" method="POST">
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
				<div class="row">
					<div class="col-md-6 pr-md-1">
						<div class="form-group">
							<label>Nombre del Torneo</label>
							<input required="" type="text" name="name" class="form-control" placeholder="Nombre del Torneo" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>">
						</div>
					</div>
					<div class="col-md-6 pr-md-1">
						<div class="form-group">
							<?php
								date_default_timezone_set('America/Bogota') ;
								$fecha_actual=date("Y-m-d");
							?>
							
							<label>fecha</label>
							<input required="" id="date" type="date" name="date" class="form-control" placeholder="Nombre del equipo" min="<?php echo $fecha_actual ?>" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>" >
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
							<input required="" type="number" name="price" class="form-control" placeholder="Costo del torneo" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>">
						</div>
					</div>

					


					<div class="col-md-6 pr-md-1">
						<div class="form-group">
							<label>Tipo de torneo</label>
							<select name="modality" class="form-control" required="">
								<option class="selector">seleccione...</option>
								<option class="selector">Grupo</option>
								<option class="selector">Solo</option>
							</select>
						</div>
					</div>
					<div class="col-md-3 pr-md-1">
						<div class="form-group">
							<label>Juego</label>
							<select name="id_game" class="form-control" required="">
								<option value="" class="selector">Seleccione...</option>                                
								<?php
								foreach ($games as $game) {
									?>
									<option class="selector" value="<?php echo $game->id ?>">
										<?php echo $game->name ?></option>
									<?php                                       
								}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-3 pr-md-1">
						<div class="form-group">
							<label>Numero de llaves</label>
							<select name="num_spaces" class="form-control" required="">
								<option class="selector">seleccione...</option>
								<option class="selector">2</option>
								<option class="selector">4</option>
								<option class="selector">8</option>
								<option class="selector">16</option>
							</select>
						</div>
					</div>
					<div class="form-group formulari">
						

							<input type="hidden" name="id_user" value="<?php echo $_SESSION['users']->id ?>">

					</div>
				</div>
				



				<div class="form-group formulari">
					<button class="btn btn-success float-right">Crear torneo</button>
				</div>
			</form>

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
<!-- Modal -->
























