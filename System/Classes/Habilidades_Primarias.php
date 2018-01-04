<?php
    require_once __DIR__."/../config.php";
    class Habilidades_Primarias{
        /*Atributs*/
        private $id_HP;
        private $nombre;
        private $caracteristica;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Habilidades_Primarias(`nombre`, `caracteristica`) "
                    . "VALUES ('$this->nombre', '$this->caracteristica')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Habilidades_Primarias where id_HP = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Habilidades_Primarias";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $habilidad = new Habilidades_Primarias($obj["id_HP"],$obj["nombre"],$obj["caracteristica"]);
                array_push($rtn, $habilidad);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewHP($id_HP){
            $db = new connexio();
            $sql = "SELECT * FROM Habilidades_Primarias where id_HP='$id_HP'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $habilidad = new Habilidades_Primarias($obj["id_HP"],$obj["nombre"],$obj["caracteristica"]);
                }
                if($count == 1){
                    return $habilidad;
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
            $this->id_HP = 0;
            $this->nombre = 0;
            $this->caracteristica = 0;
        }
        
        function __construct2($a2, $a3){
            $this->id_HP = "";
            $this->nombre = $a2;
            $this->caracteristica = $a3;
        }
        function __construct3($a1, $a2, $a3){
            $this->id_HP = $a1;
            $this->nombre = $a2;
            $this->caracteristica = $a3;
        }
           
        //METODES SET
        public function setId_HP($id_HP) {
            $this->id_HP = $id_HP;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setCaracteristica($caracteristica) {
            $this->caracteristica = $caracteristica;
        }
        
        //METODES GET 
        public function getId_HP() {
            return $this->id_HP;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getCaracteristica() {
            return $this->caracteristica;
        }
    }
?>