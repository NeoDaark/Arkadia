<?php
    require_once __DIR__."/../config.php";
    class Objeto_Caracteristica{
        /*Atributs*/
        private $id_caracteristica;
        private $id_objeto;
        private $valor;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Objeto_Caracteristica(`id_caracteristica`, `id_objeto`, `valor`) "
                    . "VALUES ('$this->id_caracteristica', '$this->id_objeto', '$this->valor')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Objeto_Caracteristica where id_caracteristica = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto_Caracteristica";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $objCaracter = new Objeto_Caracteristica($obj["id_caracteristica"],$obj["id_objeto"],$obj["valor"]);
                array_push($rtn, $objCaracter);
            }
            $db->close();
            return $rtn;
        }
        
        public function selectArma($id_objeto){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto_Caracteristica where id_objeto='$id_objeto' and id_caracteristica='1'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $objCaracter = new Objeto_Caracteristica($obj["id_caracteristica"],$obj["id_objeto"],$obj["valor"]);
                //var_dump($Objeto);
                array_push($rtn, $objCaracter);
            }
            $db->close();
            return $rtn;
        }
        public function selectArmadura($id_objeto){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto_Caracteristica where id_objeto='$id_objeto' and id_caracteristica='20'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $objCaracter = new Objeto_Caracteristica($obj["id_caracteristica"],$obj["id_objeto"],$obj["valor"]);
                //var_dump($Objeto);
                array_push($rtn, $objCaracter);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewObjCar($id_caracteristica){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto_Caracteristica where id_caracteristica='$id_caracteristica'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $objCaracter = new Objeto_Caracteristica($obj["id_caracteristica"],$obj["id_objeto"],$obj["valor"]);
                }
                if($count == 1){
                    return $objCaracter;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        
        public function selectObjeto($id_objeto){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto_Caracteristica where id_objeto='$id_objeto'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $objCaracter = new Objeto_Caracteristica($obj["id_caracteristica"],$obj["id_objeto"],$obj["valor"]);
                //var_dump($Objeto);
                array_push($rtn, $objCaracter);
            }
            $db->close();
            return $rtn;
        }
        
        public function selectArmaValor($id_objeto){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto_Caracteristica where id_objeto='$id_objeto' and id_caracteristica='1'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $obj = $query->fetch_assoc();
                $objCaracter = new Objeto_Caracteristica($obj["id_caracteristica"],$obj["id_objeto"],$obj["valor"]);
                return $objCaracter;
            }
        }
        public function selectArmaduraValor($id_objeto){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto_Caracteristica where id_objeto='$id_objeto' and id_caracteristica='20'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $obj = $query->fetch_assoc();
                $objCaracter = new Objeto_Caracteristica($obj["id_caracteristica"],$obj["id_objeto"],$obj["valor"]);
                return $objCaracter;
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
            $this->id_objeto = 0;
            $this->valor = 0;
        }
        
        function __construct2($a2, $a3){
            $this->id_caracteristica = "";
            $this->id_objeto = $a2;
            $this->valor = $a3;
        }
        function __construct3($a1, $a2, $a3){
            $this->id_caracteristica = $a1;
            $this->id_objeto = $a2;
            $this->valor = $a3;
        }
           
        //METODES SET
        public function setId_Caracteristica($id_caracteristica) {
            $this->id_caracteristica = $id_caracteristica;
        }
        public function setId_Objeto($id_objeto) {
            $this->id_objeto = $id_objeto;
        }
        public function setValor($valor) {
            $this->valor = $valor;
        }
        
        //METODES GET 
        public function getId_Caracteristica() {
            return $this->id_caracteristica;
        }
        public function getId_Objeto() {
            return $this->id_objeto;
        }
        public function getValor() {
            if($this->valor == null){
                return 0;
            }else{
                return $this->valor;
            }
        }
    }
?>