   <div class="content">
   	<div class="row">
   		<div class="col-md-12">
   			<div class="card ">
   				<div class="card-header">
   					<h2 class="card-title"> Editar perfil</h2>
   				</div>
   				<div class="card-body">
   					
   					<form action="?controller=user&method=update" method="POST">
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
   									<label>Nombre</label>
   									<input type="text" name="name" class="form-control" placeholder="Nombre ususario" value="<?php echo $_SESSION['users']->name ?>" >
   								</div>
   							</div>
   							<div class="col-md-6 pr-md-1">
   								<div class="form-group">
   									<label>Apellido</label>
   									<input type="text" name="last_name" class="form-control" placeholder="Apellido usuario" value="<?php echo $_SESSION['users']->last_name?>">
   								</div>
   							</div>
   							<div class="col-md-6 pr-md-1">
   								<div class="form-group">
   									<label>Apodo</label>
   									<input type="text" name="nickname" class="form-control" placeholder="apodo" value="<?php echo $_SESSION['users']->nickname?>">
   								</div>
   							</div>
   							<div class="col-md-6 pr-md-1">
   								<div class="form-group">
   									<label>Imagen</label>
   									<select class="form-control" name="image_id">
   										<?php
   										foreach ($images as $image){  
   											?>
   											<option class="selector" value=" <?php echo  $image->id ?>">
   												<?php  echo $image->name;?>
   											</option>
   											
   										<?php }  ?>
   									</select>
   								</div>
   							</div>

   							<input type="hidden" name="id" value="<?php echo $_SESSION['users']->id?>" >
   							
   						</div>
   						<div class="form-group formulari">
   							<button class="btn btn-success float-right">Guardar cambios</button>
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





















