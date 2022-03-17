<?PHP
class Conexiones
{
    private $link;
    private $Element;

    public function __construct()
    {
        $this->link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($this->link, "prospectos");
        $this->Element = ['nombre', 'p_apellido', 's_apellido', 'calle', 'numero', 'colonia', 'c_p', 'telefono', 'RFC', 'archivo'];
    }

    public function validar()
    {
        $nom = $_REQUEST['nombre'];
        $p_ap = $_REQUEST['p_apellido'];
        $s_ap = $_REQUEST['s_apellido'];
        $callie = $_REQUEST['calle'];
        $num = $_REQUEST['numero'];
        $col = $_REQUEST['colonia'];
        $c_p = $_REQUEST['c_p'];
        $tel = $_REQUEST['telefono'];
        $rfc = $_REQUEST['RFC'];
        $im = $_FILES['archivo']['name'];
        $stat = 0;

        if ($_FILES['archivo']['name']) {
            $ruta = "documentos/" . $im;
            copy($_FILES['archivo']['tmp_name'], $ruta);
        }

        //-------------------
        $nuevo_prosp = mysqli_query($this->link, "select telefono from prospecto where telefono like '$tel';");
        if (mysqli_num_rows($nuevo_prosp) > 0) {
            return (1);
        }
        // ------------ Si no esta registrado el usuario continua el script
        else {
            // ==============================================
            // Comprobamos si el email esta registrado

            $nuevo_rfc = mysqli_query($this->link, "select RFC from prospecto where RFC like '$rfc'");
            if (mysqli_num_rows($nuevo_rfc) > 0) {
                return (2);
            }
            // ------------ Si no esta registrado el e-mail continua el script
            else {
                mysqli_query($this->link, "INSERT INTO prospecto(nombre,p_apellido,s_apellido,calle,numero,colonia,c_p,telefono,RFC,docs,status) VALUES('$nom','$p_ap','$s_ap','$callie',$num,'$col',$c_p,$tel,'$rfc','$im',$stat);");
                mysqli_close($this->link);
                return (3);
            }
            // ==============================================
        }
    }
    function buscar()
    {
        $bus = $_REQUEST['txtsearch'];
        echo "El dato a buscar es: $bus <br>";

        $result = mysqli_query($this->link, "select * from prospecto where nombre like '%$bus%'");
        echo "<table border='1'>";
        echo "<TR><TD> Id</TD><TD> nombre </TD>
         <TD> Apellido 1</TD><TD>Apellido 2</TD><TD> Telefono </TD><TD> RFC </TD> <TD> Estado </TD> </TR>";


        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_prospecto'];
            $nom = $row['nombre'];
            $p_ap = $row['p_apellido'];
            $s_ap = $row['s_apellido'];
            $tel = $row['telefono'];
            $rfc = $row['RFC'];
            $stat = $row['status'];

            echo "<TR><TD>$id</TD><TD><A href='consulta2.php?nom=$nom'>$nom</A></TD><TD>$p_ap</TD><TD>$s_ap</TD> <TD>$tel</TD> <TD>$rfc</TD> <TD>$stat</TD> </TR>";
        }
        mysqli_free_result($result);
        mysqli_close($this->link);
        echo "</table>";
    }
    
    function Actualizar_est()
    {
        echo "Actualizado........";
        $estado = $_REQUEST['estado'];
        $id = $_REQUEST['id_env'];
        //echo "$id<br>";
        //echo "$estado<br>";
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "prospectos");
        if (mysqli_query($link, "UPDATE prospecto SET status = $estado WHERE id_prospecto= $id;")) {
            //echo "ESTADO ACTULIZADO CORRECTAMENTE";
        }

        $result = mysqli_query($link, "select * from prospecto where id_prospecto = $id");
        $row = mysqli_fetch_array($result);
        $nom = $row['nombre'];
        echo $nom;
        header("location: captura2.php?nom=$nom");
    }

    function Listado()
    {
        $result = mysqli_query($this->link, "select * from prospecto");

        echo "<table border='1'>";
        echo "<TR><TD> Id</TD><TD> nombre </TD>
         <TD> Apellido 1</TD><TD>Apellido 2</TD><TD> Telefono </TD><TD> RFC </TD> <TD>Estado</TD> </TR>";

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_prospecto'];
            $nom = $row['nombre'];
            $p_ap = $row['p_apellido'];
            $s_ap = $row['s_apellido'];
            $tel = $row['telefono'];
            $rfc = $row['RFC'];
            $stat = $row['status'];

            if ($stat == 0) {
                $estados = "Enviado";
            } else {
                if ($stat == 1) {
                    $estados = "Aceptado";
                } else {
                    $estados = "Rechazado";
                }
            }

            echo "<TR><TD>$id</TD><TD><A href='captura2.php?nom=$nom'>$nom</A></TD><TD>$p_ap</TD><TD>$s_ap</TD> <TD>$tel</TD> <TD>$rfc</TD> <TD>$estados</TD> </TR>";
        }
        echo "</table>";
    }

    function Impresion_captura(){
        $busq=$_GET['nom'];
      
        $result=mysqli_query($this->link,"select * from prospecto where nombre like '%$busq%'");
        
        
        $row=mysqli_fetch_array($result);
        $this->Element[0]=$row['id_prospecto'];
        $this->Element[1]=$row['nombre'];
        $this->Element[2]=$row['p_apellido'];
        $this->Element[3]=$row['s_apellido'];
        $this->Element[4]=$row['calle'];
        $this->Element[5]=$row['numero'];
        $this->Element[6]=$row['colonia'];
        $this->Element[7]=$row['c_p'];
        $this->Element[8]=$row['telefono'];
        $this->Element[9]=$row['RFC'];
        $this->Element[10]=$row['docs'];
     
        if($row['status']==0){
            $this->Element[11] = "Enviado";
        }else{
                if($row['status']==1){
                    $this->Element[11] = "Aceptado";
             }else{
                $this->Element[11] = "Rechazado";
             }
        }
        return ($this->Element);
    }
}
