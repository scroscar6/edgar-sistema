<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="favicon.ico" />
	<title><?php echo $ConfigNombre;?></title>
	<style type="text/css">
    .cp_error { 
		 background-color:#F7F3F7; 
		 border:1px #1B6FEF solid; margin:4px; padding:2px; width: 600px;}
    .cp_error .cp_error_title { 
		 background-color:#1B6FEF;  
		 position:relative;
		 font: bold 14px Arial, Helvetica, sans-serif;  color:#FFFFFF; 
		 padding:4px;  }
    .cp_error .cp_error_reason { 
		 font:normal 12px/20px Arial, Helvetica, sans-serif; 
		 color:#375264; margin:5px; }
    .cp_error .cp_error_author { 
		 font:normal 12px Arial, Helvetica, sans-serif; 
		 color:#375264;  
		 padding: 4px;}
    </style>
</head>
<body>
	<div align="center">
		<div class="cp_error" style="margin-top: 40px;">
			<div class="cp_error_title" align="left">El sitio web está desconectado</div>
			<div class="cp_error_reason" align="left">
			<?php
				switch($iderrno){
					case 0:
						echo "La conexión con MySQL Server #".mysql_errno()." no pudo ser establecida.";
					break;
					case 1:
						echo "Base de datos desconocida #".mysql_errno()." no pudo ser seleccionada.";
					break;
					case 2:
						echo "Este sitio se encuentra actualmente en mantenimiento. Estaremos de vuelta muy pronto.";
					break;
				}
			?>
			
			</div>
			<div class="cp_error_author" align="right" style="margin-top: 4px;">Disculpen los inconvenientes,<br /><strong><?php echo $ConfigNombre;?></strong></div>
		</div>
	</div>
</body>
</html>