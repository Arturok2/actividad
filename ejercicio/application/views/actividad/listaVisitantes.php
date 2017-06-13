<div id="container">
	<div style="float: right; margin: 20px;">
	<?php 
	if($this->session->has_userdata('autenticado')==null)  
		echo anchor('actividad/login', 'Ingresar'); 
	else 
		echo anchor('actividad/logout', 'Salir');
	?></div>
	<center>
	<h1>Listado de usuarios que visitaron la aplicaci&oacute;n</h1>
	<br/>
	<table border="5", bordercolor="#F2F2F2">
		<th>IP</th><th>Plataforma</th><th>Dispositivo</th><th>Navegador</th><th>Fecha</th><th>Visitas</th>
		<tr>
		<?php 
			foreach ($listado as $row) {
				echo "<td>".$row -> ip . "</td>";
				echo "<td>".$row -> plataforma . "</td>";
				echo "<td>".$row -> dispositivo . "</td>";
				echo "<td>".$row -> navegador . "</td>";
				echo "<td>".$row -> fecha . "</td>";
				echo "<td>".$row -> visitas . "</td>";
			}
		?>
		</tr>
	</table>
	<br/>
	</center>
	<p class="footer"><?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>