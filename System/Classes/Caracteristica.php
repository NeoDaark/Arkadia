<?php
    require_once __DIR__."/../config.php";
    class Caracteristica{
        /*Atributs*/
        private $id_caracteristica;
        private $nombre;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Caracteristica(`nombre`) "
                    . "VALUES ('$this->nombre')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Caracteristica where id_caracteristica = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Caracteristica";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $caracteristica = new Caracteristica($obj["id_caracteristica"],$obj["nombre"]);
                //var_dump($Partida);
                array_push($rtn, $caracteristica);
            }
            $db->close();
            return $rtn;
        }
        public function viewArma(){
            $db = new connexio();
            $sql = "SELECT * FROM Caracteristica where id_caracteristica between 1 and 14";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $caracteristica = new Caracteristica($obj["id_caracteristica"],$obj["nombre"]);
                //var_dump($Partida);
                array_push($rtn, $caracteristica);
            }
            $db->close();
            return $rtn;
        }
        public function viewArmaduras(){
            $db = new connexio();
            $sql = "SELECT * FROM Caracteristica where id_caracteristica between 15 and 26";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $caracteristica = new Caracteristica($obj["id_caracteristica"],$obj["nombre"]);
                //var_dump($Partida);
                array_push($rtn, $caracteristica);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewCar($id_caracteristica){
            $db = new connexio();
            $sql = "SELECT * FROM Caracteristica where id_caracteristica='$id_caracteristica'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $id_caracteristica = new Caracteristica($obj["id_caracteristica"],$obj["nombre"]);
                }
                if($count == 1){
                    return $id_caracteristica;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        

        //CONSTRUCTORS
        function __construct(){
            $args = func_get_args();
            $num = func_num_args();
            $f='__construct'. $num;
            if (method_exists($this, $f)) {
                call_user_func_array(array($this, $f), $args);
            }
        }
        function __construct0(){
            $this->id_caracteristica = 0;
            $this->nombre = 0;
        }
        
        function __construct1($a2){
            $this->id_caracteristica = "";
            $this->nombre = $a2;
        }
        function __construct2($a1, $a2){
            $this->id_caracteristica = $a1;
            $this->nombre = $a2;
        }
           
        //METODES SET
        public function setId_Caracteristica($id_caracteristica) {
            $this->id_caracteristica = $id_caracteristica;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        
        //METODES GET 
        public function getId_Caracteristica() {
            return $this->id_caracteristica;
        }
        public function getNombre() {
            return $this->nombre;
        }
    }
?>