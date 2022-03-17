<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CONTROL</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="wrap">
  <div id="masthead">
    <h1>CONTROL / CAPTURA </h1>
    <div id="menucontainer">
      <div id="menunav">
        <ul>
          <li><a href="index.php"><span>INICIO</span></a></li>
          <li><a href="captura.php" class="current"><span>CAPTURA</span></a></li>
          <li><a href="Listado.php"><span>LISTADO</span></a></li>
          <li><a><span>EVALUACION</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div id="content"  align="center">
      <h2>CAPTURA DE PROSPECTOS</h2>
      <p>Datos importantes para el registro</p>
	  <form  method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>
				<p>Nombre:</p>
				<input type="text" name="nombre" value = "<?php if($_POST){ $nom=$_REQUEST['nombre']; echo "$nom";}?>" required>
			</td>
			<td>
				<p>Primer Apellido:</p>
				<input type="text" name="p_apellido" value = "<?php if($_POST){ $p_ap=$_REQUEST['p_apellido']; echo "$p_ap";}?>" required>
			</td>
			<td>
				<p>Segundo Apellido:</p>
				<input type="text" name="s_apellido" value = "<?php if($_POST){ $s_ap=$_REQUEST['s_apellido']; echo "$s_ap";}?>" required>
			</td>
		</tr>
		<tr>
			<td>
				<p>Calle:</p>
				<input type="text" name="calle" value = "<?php if($_POST){$callie=$_REQUEST['calle']; echo "$callie";}?>" required>
			</td>
			<td>
				<p>Numero:</p>
				<input type="int" name="numero" value = "<?php if($_POST){$num=$_REQUEST['numero']; echo "$num";}?>" required>
			</td>
			<td>
				<p>Colonia:</p>
				<input type="text" name="colonia" value = "<?php if($_POST){$col=$_REQUEST['colonia']; echo "$col";}?>" required>
			</td>
		</tr>
		<tr>
			<td>
				<p>Codigo Postal:</p>
				<input type="int" name="c_p" minlength="5" maxlength="5" size="5" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  value = "<?php if($_POST){$c_p=$_REQUEST['c_p']; echo "$c_p";}?>" required>
			</td>
			<td>
				<p>Telefono:</p>
				<input type="int" name="telefono" minlength="10" maxlength="10" size="10" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  value = "<?php if($_POST){$tel=$_REQUEST['telefono']; echo "$tel";}?>" required>
			</td>
			<td>
				<p>RFC:</p>
				<input type="text" name="RFC" minlength="13" maxlength="13" size="13" value = "<?php if($_POST){$rfc=$_REQUEST['RFC']; echo "$rfc";}?>" required>
			</td>

		</tr>
	</table>
	<br>
	Documentos:
	<input type="file" name="archivo">
	<br><br>
	<input type="submit" name="enviar" value="Enviar">
</form>
      <p>
        <?php
	if($_POST){
		require_once ("validar.php");
		$valid=new Conexiones();
		switch($valid->validar()){
			case 1:
				echo'<script type="text/javascript">
                alert("Numero ya utilizado en otro prospecto");
	            //window.location.href="DOS.php";
                </script>';
				break;
			case 2:
				echo'<script type="text/javascript">
                alert("RFC registrada en otro prospecto");
	            //window.location.href="DOS.php";
                </script>';
				break;
			case 3:
				echo'<script type="text/javascript">
                alert("Registrado con exito");
	            //window.location.href="DOS.php";
                </script>';
				break;
		}
	}
?>
      </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
  </div>
</div>
<div id="footer"><ul>
          <li><a href="index.php" class="current"><span>SALIR</span></a></li>
        </ul></div>
</body>
</html>