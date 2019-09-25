<?php
class Conexion{
    private $user="u700606897_prub";
    private $ip="localhost";
    private $bd="u700606897_namop";
    private $pass="Policontraseña123";
    public $conexion;

//"localhost","u713209196_namo","educardenas97","u713209196_namofpuna"

    public function __construct(){
        /*
            FUNCION UTILIZADA PARA PODER INSTANCIAR LA CLASE (CREAR EL OBJETO)
            $variable=new Conexion()
        */
        $this->conexion= new mysqli("localhost",$this->user,$this->pass,$this->bd);
        //"localhost","u700606897_prub","Policontraseña123","u700606897_namop")

    }
    public function __construct1($user,$ip,$bd,$pass){
        /*
            FUNCION UTILIZADA PARA PODER INSTANCIAR LA CLASE (CREAR EL OBJETO) CON LA DIFERENCIA QUE SE INICIA CON LOS DATOS PROPORCIONADOS EN EL ARGUMENTO
            $variable=new Conexion(<USUARIO>,<ip del servidor>,<base de datos>,<contraseña>)
        */
        $conexion=mysql_connect($ip,$user,$pass,$bd);
        if ($this->conexion == 0) DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
       return true;
    }
}


class Consultas extends Conexion{
    public function insertarDato($tabla,$campos,$valores){
        /*
        METODO PARA INSERTAR UN REGISTRO NUEVO A LA BASE DE DATOS
        $objetoConsultas->insertarDato(<tablade la bd>,<Array de campos>,<string de valores>)
        $consulta->insertarDato('remision_enviada',['campo1','campo2','campo3'],"'valor1','valor2','valor3'");
        NOTA : los valores tienen que estar en un string, en el mismo orden que se pasaron los campos
        */
        $this->conexion->query("INSERT INTO ".$tabla." ( ".(implode(",", $campos))." ) VALUES (".$valores.")");
    }
    public function consultarDatos($campos,$tabla,$orden="",$campoCondicion="",$valorCondicion=""){
        /*
            METODO PARA PODER OBTENER DATOS DE UNA TABLA ESPECIFICADA
            $objetoConsultas->consultarDatos(<Array de campos a consultar>,<tabla de la bd>,<Metodo de ordenar>,<condicion para la consulta>)
            Ej: $objetoConsultas->consultarDatos(['id','descripcion','categorias','order by id DESC']);
        */

        $texto=(implode(",", $campos));
        $query="SELECT ".$texto." FROM ".$tabla;
        if(($campoCondicion!="")&&($valorCondicion!="")){
            $query.=" WHERE ".$campoCondicion." = '".$valorCondicion."' ";
        }
        //echo $query;
        return $this->conexion->query($query);
    }
    function consultarDatosQ($campos,$tabla,$orden="",$campoCondicion="",$valorCondicion=""){

        $texto=(implode(",", $campos));
        $query="SELECT ".$texto." FROM ".$tabla." ";
        if(is_array($campoCondicion)==TRUE){
            $query.="WHERE ";
            for ($i=0; $i <count($campoCondicion)-1 ; $i++) {
                $query.=$campoCondicion[$i]." = '".$valorCondicion[$i]."' && ";
            }
            $query.=$campoCondicion[$i]." = '".$valorCondicion[$i]."' ";
            //echo "query".$query;
        }else{
            if(($campoCondicion!="")&&($valorCondicion!="")){
                $query.="WHERE ".$campoCondicion." = '".$valorCondicion."' ";
            }
        }
        $query.=$orden;
        //echo $query;
        return $this->conexion->query($query);
    }

}

?>
