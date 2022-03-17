<?php
$estado = $_REQUEST['estado'];
$id = $_REQUEST['id_env'];
//echo "$id<br>";
//echo "$estado<br>";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "prospectos");
if (mysqli_query($link, "UPDATE prospecto SET status = $estado WHERE id_prospecto= $id;")) {
  //echo "ESTADO ACTULIZADO CORRECTAMENTE";
}

$result=mysqli_query($link,"select * from prospecto where id_prospecto = $id");
        $row = mysqli_fetch_array($result);
        $nom = $row['nombre'];
        echo $nom;
header("location: captura2.php?nom=$nom");
?>