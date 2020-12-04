	<main class="container" >
		<section class="row mt-5">
			<div class="card w-50 m-auto md-12">
				<div class="card-body w-100"><div class="row">
					<h1 class="col-md-12 d-flex justify-content-center">Ingrese el codigo de equipo</h1>			
				</div>
				<form action="?controller=team_detail&method=save" method="POST">

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
						<label>Contraseña</label>
						<input type="text" name="password" class="form-control" required=""  placeholder="Nombre del juego">
					</div>
					<input type="hidden" name="nickname" value="<?php echo  $_SESSION['users']->nickname ?>">
					<input type="hidden" name="id_user" value="<?php echo  $_SESSION['users']->id ?>">
					<input type="hidden" name="id_team" value="<?php echo $teams[0]->id ?>">
					<div class="form-group formulari">
						<button class="btn btn-success float-right">Ingresar</button>
					</div>
				</form>
			</div>
		</div>
		
	</section>
</main>

