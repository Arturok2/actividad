<div id="container">
	<div style="float: right; margin: 20px;">
	<?php 
	if($this->session->has_userdata('autenticado')==null)  
		echo anchor('actividad/login', 'Ingresar'); 
	else 
		echo anchor('actividad/logout', 'Salir');
	?></div>
	<h1>Bienvenido a mi Aplicaci&oacute;n</h1>
	<div id="body">
		<p>En esta actividad se mostrara informaci&oacute;n de rastreo de los visitantes de esta p&aacute;gina.</p>
		<span>Direcci&oacute;n IP: </span> <?php echo $informacion['ip'] . "<br/>"; ?>
		<span>Plataforma: </span> <?php echo $informacion['plataforma'] . "<br/>"; ?>
		<span>Tipo de dispositivo: </span> <?php echo $informacion['dispositivo'] . "<br/>"; ?>
		<span>Navegador web: </span> <?php echo $informacion['navegador'] . "<br/>"; ?>
	</div>
	<p class="footer"><?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>