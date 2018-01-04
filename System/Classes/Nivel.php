<?php
    require_once __DIR__."/../config.php";
    class Nivel{
        /*Atributs*/
        private $nivel;
        private $puntos;
        private $incr_caracteristica;
        private $exp_necesaria;
        private $presencia_base;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Nivel(`nivel`, `puntos`, `incr_caracteristica`, `exp_necesaria`, `presencia_base`) "
                    . "VALUES ('$this->nivel', '$this->puntos', '$this->incr_caracteristica', '$this->exp_necesaria', '$this->presencia_base')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Nivel where nivel = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Nivel";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $nivel = new Nivel($obj["nivel"],$obj["puntos"],$obj["incr_caracteristica"],$obj["exp_necesaria"],$obj["presencia_base"]);
                array_push($rtn, $nivel);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewNivel($nivel){
            $db = new connexio();
            $sql = "SELECT * FROM Nivel where nivel='$nivel'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $nivel = new Nivel($obj["nivel"],$obj["puntos"],$obj["incr_caracteristica"],$obj["exp_necesaria"],$obj["presencia_base"]);
                }
                if($count == 1){
                    return $nivel;
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
            $this->nivel = 0;
            $this->puntos = 0;
            $this->incr_caracteristica = 0;
            $this->exp_necesaria = 0;
            $this->presencia_base = 0;
        }
        
        function __construct4($a2, $a3, $a4, $a5){
            $this->nivel = "";
            $this->puntos = $a2;
            $this->incr_caracteristica = $a3;
            $this->exp_necesaria = $a4;
            $this->presencia_base = $a5;
        }
        function __construct5($a1, $a2, $a3, $a4, $a5){
            $this->nivel = $a1;
            $this->puntos = $a2;
            $this->incr_caracteristica = $a3;
            $this->exp_necesaria = $a4;
            $this->presencia_base = $a5;
        }
           
        //METODES SET
        public function setNivel($nivel) {
            $this->nivel = $nivel;
        }
        public function setPuntos($puntos) {
            $this->puntos = $puntos;
        }
        public function setIncr_Caracteristica($incr_caracteristica) {
            $this->incr_caracteristica = $incr_caracteristica;
        }
        public function setExp_Necesaria($exp_necesaria) {
            $this->exp_necesaria = $exp_necesaria;
        }
        public function setPresencia_Base($presencia_base) {
            $this->presencia_base = $presencia_base;
        }
        
        //METODES GET 
        public function getNivel() {
            return $this->nivel;
        }
        public function getPuntos() {
            return $this->puntos;
        }
        public function getIncr_Caracteristica() {
            return $this->incr_caracteristica;
        }
        public function getExp_Necesaria() {
            return $this->exp_necesaria;
        }
        public function getPresencia_Base() {
            return $this->presencia_base;
        }
    }
?>