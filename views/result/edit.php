<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="description" content="Empire gaimg pagina cuyo objetivo es el de gestionar adecuadamente torneos de video juegos en en la empresa.">
	<title>EmpyreGaming</title>
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
					<h1 class="col-md-12 d-flex justify-content-center">Editar Resultado</h1>			
				</div>
				<form action="?controller=result&method=update" method="POST">

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
						<label>Id de partida</label>
						<input type="datetime-local" name="date" class="form-control" placeholder="id_match" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>">
					</div>
					<div class="form-group formulari">
						<label>Ganadores</label>
						<input type="text" name="winners" class="form-control" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>">
					</div>
					<div class="form-group formulari">
						<label>Descripcion</label>
						<input type="text" name="description" class="form-control" value="<?php echo isset($error['errorMessage']) ? $error['name'] : '' ?>">
					</div>
					<div class="form-group formulari">
						<?php
						foreach ($tournament as $tournament) {
							?>
							<input type="hidden" name="id" class="form-control" readonly="readonly" placeholder="Nombre del equipo" value="<?php echo $_SESSION['users']->id ?>">
							<?php  
						}
						?>
					</div>


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