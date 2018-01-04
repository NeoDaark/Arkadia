<?php
    require_once __DIR__."/../config.php";
    class Caracteristicas_P{
        /*Atributs*/
        private $base;
        private $bono;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Caracteristicas_P(`base`, `bono`) "
                    . "VALUES ('$this->base', '$this->bono')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Caracteristicas_P where base = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Caracteristicas_P";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $caracteristicas = new Caracteristicas_P($obj["base"],$obj["bono"]);
                array_push($rtn, $caracteristicas);
            }
            $db->close();
            return $rtn;
        }
        public function viewCaracteristica($value){ 
            $db = new connexio();
            $sql = "SELECT bono FROM Caracteristicas_P WHERE base = '$value'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $obj = $query->fetch_assoc();
                return $obj['bono'];
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
            $this->base = 0;
            $this->bono = 0;
        }
        
        function __construct1($a2){
            $this->base = "";
            $this->bono = $a2;
        }
        function __construct2($a1, $a2){
            $this->base = $a1;
            $this->bono = $a2;
        }
           
        //METODES SET
        public function setBase($base) {
            $this->base = $base;
        }
        public function setBono($bono) {
            $this->bono = $bono;
        }
        
        //METODES GET 
        public function getBase() {
            return $this->base;
        }
        public function getBono() {
            return $this->bono;
        }
    }
?>