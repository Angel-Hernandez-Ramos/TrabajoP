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
      <h1>CONTROL / INICIO</h1>
      <div id="menucontainer">
        <div id="menunav">
          <ul>
            <li><a href="index.php" class="current"><span>INICIO</span></a></li>
            <li><a href="captura.php"><span>CAPTURA</span></a></li>
            <li><a href="Listado.php"><span>LISTADO</span></a></li>
            <li><a><span>EVALUACION</span></a></li>
            <li></li>
          </ul>
        </div>
      </div>
    </div>
    <div id="container">
      <div id="sidebar">
        <h2>BUSCAR </h2>
        <form action="buscar.php" method="post">
          <fieldset>
            <legend></legend>
            <div> <span>
                <label for="txtsearch"> Buscar Prospecto:<img src="images/magnify.png" alt="search" /></label>
              </span> <span>
                <input type="text" value="" name="txtsearch" title="Text input: search" id="txtsearch" size="25" />
                <br>
                <input type="submit" name="Enviar" value="Enviar">
                <br>
              </span> </div>
          </fieldset>
        </form>
        <div id="navcontainer"></div>
        <p>&nbsp;</p>
      </div>
      <div id="content">
        <h2>ANALISIS DE PROSPECTOS </h2>
        <?php
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "prospectos");

        $result = mysqli_query($link, "select * from prospecto;");
        $total_reg = mysqli_num_rows($result);
       
        $result = mysqli_query($link, "select * from prospecto where status = 0;");
        $total_env = mysqli_num_rows($result);
      
        $result = mysqli_query($link, "select * from prospecto where status = 1;");
        $total_acep = mysqli_num_rows($result);

        $result = mysqli_query($link, "select * from prospecto where status = 2;");
        $total_rech = mysqli_num_rows($result);
    
        ?>
        <table>
          <tr>
            <td>
              <h3>
                <p>Registrados</p>
              </h3>
              <input type="text" name="nombre" value="<?php echo "$total_reg"; ?>" size="4" readonly="readonly" required>
            </td>
            <td>
              <h3>
                <p>Enviados</p>
              </h3>
              <input type="text" name="nombre" value="<?php echo "$total_env"; ?>" size="4" readonly="readonly" required>
            </td>
            <td>
              <h3>
                <p>Aceptados</p>
              </h3>
              <input type="text" name="nombre" value="<?php echo "$total_acep"; ?>" size="4" readonly="readonly" required>
            </td>
            <td>
              <h3>
                <p>Rechazados</p>
              </h3>
              <input type="text" name="nombre" value="<?php echo "$total_rech"; ?>" size="4" readonly="readonly" required>
            </td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>
  <div id="footer">
    <ul>
      <li> Angel Hernandez Ramos</li>
    </ul>
  </div>
</body>

</html>