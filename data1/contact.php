<?php include'include/header1.php'; ?>
<?php include 'validacion.php';?>

		<!-- Main -->
			<section id="main" class="container 75%">
				<header>
					<h2>Contactenos</h2>
					<p>Para solicitar mayor informacion de nuestros lugares nos puede contactar y le estaremos respondiendo en breve.</p>
				</header>
				<div class="box">
					<form method="post" action="validacion.php" >
						<div class="row uniform 50%">
							<div class="6u 12u(3)">
								<input type="text" name="nombre" id="nombre" value="" placeholder="Nombre" />
							</div>
							<div class="6u 12u(3)">
								<input type="email" name="email" id="email" value="" placeholder="Correo" />
							</div>
						</div>
						<div class="row uniform 50%">
							<div class="12u">
								<input type="text" name="asunto" id="asunto" value="" placeholder="Asunto" />
							</div>
						</div>
						<div class="row uniform 50%">
							<div class="12u">
								<textarea name="mensaje" id="mensaje" placeholder="escriba su mensaje" rows="6"></textarea>
							</div>
						</div>
						<div class="row uniform">
							<div class="12u">
								<ul class="actions align-center">
									<li><input type="submit" value="Enviar Mensaje" /></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
			</section>
			
