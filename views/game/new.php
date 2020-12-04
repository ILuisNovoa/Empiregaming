	<main class="container" >
		<section class="row mt-5">
			<div class="card w-50 m-auto md-12">
				<div class="card-body w-100"><div class="row">
					<h1 class="col-md-12 d-flex justify-content-center">Crear juego</h1>			
				</div>
				<form action="?controller=game&method=save" method="POST">

			

					<div class="form-group formulari">
						<label>Nombre del juego</label>
						<input type="text" name="name" class="form-control" required=""  placeholder="Nombre del juego" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>" >
					</div>
					<div class="form-group formulari">
						<button class="btn btn-success float-right">Registrar juego</button>
					</div>
				</form>
			</div>
		</div>
		
	</section>
</main>

