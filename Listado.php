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
      <h1>CONTROL / LISTADO </h1>
      <div id="menucontainer">
        <div id="menunav">
          <ul>
            <li><a href="index.php"><span>INICIO</span></a></li>
            <li><a href="captura.php"><span>CAPTURA</span></a></li>
            <li><a href="Listado.php" class="current"><span>LISTADO</span></a></li>
            <li><a><span>EVALUACION</span></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div id="container">
      <div id="sidebar">
        <h2>BUSCAR PROSPECTO </h2>
        <form action="buscar.php" method="post">
          <fieldset>
            <legend></legend>
            <div> <span>
                <label for="txtsearch"> Buscar:<img src="images/magnify.png" alt="search" /></label>
              </span> <span>
                <input type="text" value="" name="txtsearch" title="Text input: search" id="txtsearch" size="25" />
                <br>
                <input type="submit" name="Enviar" value="Enviar">
                <br>
              </span> </div>
          </fieldset>
        </form>
        <p>&nbsp;</p>
      </div>
      <div id="content">
        <h2>LISTA DE PROSPECTOS REGISTRADOS </h2>
        <p>
          <?PHP
          require_once ("validar.php");
          $R1 = new Conexiones();
          $R1->Listado();
          ?>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp; </p>
      </div>
    </div>
  </div>
  <div id="footer">
    <ul>
      <li><a href="index.php" class="current"><span>SALIR</span></a></li>
    </ul>
  </div>
</body>

</html>