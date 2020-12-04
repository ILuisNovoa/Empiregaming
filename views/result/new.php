<main class="container" >
	<section class="row mt-5">
		<div class="card w-50 m-auto md-12">
			<div class="card-body w-100"><div class="row">
				<h1 class="col-md-12 d-flex justify-content-center">Crear Resultado</h1>			
			</div>
			<form action="?controller=result&method=save" method="POST">

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
							<label>Id de Partida</label>
							<input type="text" name="id_match" class="form-control" placeholder="id de Partida" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>">
						</div>
					</div>
					<div class="col-md-6 pr-md-1">
						<div class="form-group">
							<label>Ganadores</label>
							<input type="text" name="winners" class="form-control" placeholder="Nombre del equipo" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>">
						</div>
					</div>
					<div class="col-md-6 pr-md-1">
						<div class="form-group formulari">
						<label>Descripcion</label>
						<input type="text" name="description" class="form-control" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>">
					</div>
				<div class="form-group formulari">
					<button class="btn btn-secondary">Crear</button>
				</div>
			</form>
		</div>
	</div>

</section>
</main>
