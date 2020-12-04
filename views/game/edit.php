<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="description" content="Empire gaimg pagina cuyo objetivo es el de gestionar adecuadamente torneos de video juegos en en la empresa.">
	<title>EmpyreG</title>
	<link rel="stylesheet" type="text/css" href="asses/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="asses/css/home.css">
	<link rel="stylesheet" type="text/js" href="asses/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/js" href="asses/js/jquery.js">
	<link rel="stylesheet" type="text/js" href="asses/js/popper.min.js">

</head>

<body>

	<main class="container" >
		

		<section class="row mt-5">
			<div class="card w-50 m-auto md-12">
				<div class="card-body w-100"><div class="row">
					<h1 class="col-md-12 d-flex justify-content-center">Editar Juego</h1>			
				</div>
				<form action="?controller=game&method=update" method="POST">

										<input type="hidden" name="id" value="<?php echo $data[0]->id ?>">

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
						<label>Nombre del Juego</label>
						<input type="text" name="name" class="form-control" placeholder="Nombre del Juego" value="<?php echo $data[0]->name ?>">
					<div class="form-group formulari">
						<button class="btn btn-secondary">guardar</button>
					</div>
				</form>
			</div>
		</div>

	</section>
</main>

<script src="../asses/js/jquery.min.js"></script>
<script src="../asses/js/popper.min.js"></script>
<script src="../asses/js/bootstrap.min.js"></script>
</body>

</html>