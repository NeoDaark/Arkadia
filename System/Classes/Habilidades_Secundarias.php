<?php
    require_once __DIR__."/../config.php";
    class Habilidades_Secundarias{
        /*Atributs*/
        private $id_HS;
        private $nombre;
        private $id_rama;
        private $caracteristica;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Habilidades_Secundarias(`nombre`, `id_rama`, `caracteristica`) "
                    . "VALUES ('$this->nombre', '$this->id_rama', '$this->caracteristica')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Habilidades_Secundarias where id_HS = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $db->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM Habilidades_Secundarias";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $habilidad = new Habilidades_Secundarias($obj["id_HS"],$obj["nombre"],$obj["id_rama"],$obj["caracteristica"]);
                array_push($rtn, $habilidad);
            }
            $db->close();
            return $rtn;
        }
        public function view_HS($id_HS){
            $db = new connexio();
            $sql = "SELECT * FROM Habilidades_Secundarias where id_HS='$id_HS'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $obj = $query->fetch_assoc();
                $habilidad = new Habilidades_Secundarias($obj["id_HS"],$obj["nombre"],$obj["id_rama"],$obj["caracteristica"]);
                return $habilidad;
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
            $this->id_HS = 0;
            $this->nombre = 0;
            $this->id_rama = 0;
            $this->caracteristica = 0;
        }
        
        function __construct3($a2, $a3, $a4){
            $this->id_HS = "";
            $this->nombre = $a2;
            $this->id_rama = $a3;
            $this->caracteristica = $a4;
        }
        function __construct4($a1, $a2, $a3, $a4){
            $this->id_HS = $a1;
            $this->nombre = $a2;
            $this->id_rama = $a3;
            $this->caracteristica = $a4;
        }
           
        //METODES SET
        public function setId_HS($id_HS) {
            $this->id_HS = $id_HS;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setId_Rama($id_rama) {
            $this->id_rama = $id_rama;
        }
        public function setCaracteristica($caracteristica) {
            $this->caracteristica = $caracteristica;
        }
        
        //METODES GET 
        public function getId_HS() {
            return $this->id_HS;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getId_Rama() {
            return $this->id_rama;
        }
        public function getCaracteristica() {
            return $this->caracteristica;
        }
    }
?>