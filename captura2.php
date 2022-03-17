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
          <li><a href="captura.php"><span>CAPTURA</span></a></li>
          <li><a href="Listado.php"><span>LISTADO</span></a></li>
          <li><a class="current"><span>EVALUACION</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div id="container">
    <div id="sidebar">
      <h2>BUSCAR PROSPECTO </h2>
      <form action="buscar.php" method="post">
        <fieldset>
        <legend>Search</legend>
        <div> <span>
          <label for="txtsearch"> Buscar Pelicula:<img src="images/magnify.png" alt="search" /></label>
          </span> <span>
          <input type="text" value=""name="txtsearch" title="Text input: search" id="txtsearch" size="25" />
		  <br> 
		  <input type="submit" name="Enviar" value="Enviar">
		  <br>
          </span> </div>
        </fieldset>
      </form>
      <p>&nbsp;</p>
    </div>
    <div id="content">
      <h2>EVALUACION DE PROSPECTO  </h2>
      
	 	<?PHP
   require_once("validar.php");
   $R1 = new Conexiones();
   
   $elementos = $R1->Impresion_captura();
   $control = 0;
   ?>
   
  <form method="$_POST" action="Accion.php">
        <table width="425">
          <tr>
            <td width="102"><p>ID: </p>
              <h3><input type="text" name ="id_env" value="<?php echo "$elementos[0]"; ?>" readonly="readonly" size="5"></h3>
			</td>
            <td width="122"><p>Estado: </p>
                <label></label>
               <h3><input type="text" value="<?php echo "$elementos[11]"; ?>" readonly="readonly" size="9"></h3>
			</td>
            <td width="185"><p>Acciones: </p>
                <p>
                  <select name="estado" id = "estado"  selected = "<?php echo"$elementos[11]"; ?>">
                    <option value= 1 >Aceptar</option>
                    <option value= 2 >Rechazar</option>
                  </select>
              </p></td>
          </tr>
        </table>
     <input type="submit" name="enviar" value="Enviar">
	</form>

  <?PHP
  
    //$R1->Actualizar_est();
    
  
   ?>
    <table>
	  <tr>
	  <td>
	   <p>Nombre:</p>
	   <input type="text" value="<?php echo "$elementos[1]"; ?>" readonly="readonly" size="20">
	  </td>
	  <td>
	  <p>Primer Apellido:</p>
	   <input type="text" value="<?php echo "$elementos[2]"; ?>" readonly="readonly" size="20">
	  </td>
	  <td>
	  <p>Segundo Apellido:</p>
	   <input type="text" value="<?php echo "$elementos[3]"; ?>" readonly="readonly" size="20">
	  </td> 
	   </tr>
	   <tr>
	   <td>
	   <p>Calle:</p>
	   <input type="text" value="<?php echo "$elementos[4]"; ?>" readonly="readonly" size="20">
	   </td>
	   <td>
	   <p>Numero:</p>
	   <input type="int" value="<?php echo "$elementos[5]"; ?>" readonly="readonly" size="20">
	   </td>
	   <td>
	   <p>Colonia:</p>
	   <input type="text" value="<?php echo "$elementos[6]"; ?>" readonly="readonly" size="20">
	   </td>
	   </tr>
	   <tr>
	   <td>
	   <p>Codigo Postal:</p>
	   <input type="int" value="<?php echo "$elementos[7]"; ?>" readonly="readonly">
	   </td>
	   <td>
	   <p>Telefono:</p>
	   <input type="int" value="<?php echo "$elementos[8]"; ?>" readonly="readonly">
	   </td>
	   <td>
	   <p>RFC:</p>
	   <input type="text" value="<?php echo "$elementos[9]"; ?>" readonly="readonly">
	   </td>
	  
	   </tr>
	  </table>
	  <br>
	<?php
   echo "<br><A href='index.php'> Regresar </A>";
	?>    
    </div>
  </div>
</div>
<div id="footer"><ul>
          <li><a href="index.php" class="current"><span>SALIR</span></a></li>
        </ul></div>
</body>
</html>
