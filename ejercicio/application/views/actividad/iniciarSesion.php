<div id="container">
	<div style="float: right; margin: 20px;"><?php echo anchor('actividad', 'Regresar a inicio');	?></div>
	<h1>Iniciar sesi&oacute;n</h1>
	<div id="body">
		<center>
			<?php echo form_open (base_url().'actividad/iniciarsesion'); ?>
			</br>Usuario: <br/>
			<input type="text" class="form-control" name="nusuario"> <br/>
			Password: <br/>
			<input type="password" class="form-control" name="npassword"> <br/><br/>
			<input type="submit" name="ingresar" value="Ingresar">
			<br> <?php echo validation_errors(); 
			if($this->session->flashdata('usuario_incorrecto'))
			{ 
				echo "<p>".$this->session->flashdata('usuario_incorrecto')."</p>";
			}
			echo form_close();
			?>
		</center>
	</div>
	<p class="footer"><?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>