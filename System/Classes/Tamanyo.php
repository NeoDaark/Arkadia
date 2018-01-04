<?php
    require_once __DIR__."/../config.php";
    class Tamanyo{
        /*Atributs*/
        private $id_tamanyo;
        private $altura;
        private $peso;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Tamanyo(`id_tamanyo`, `altura`, `peso`) "
                    . "VALUES ('$this->id_tamanyo', '$this->altura', '$this->peso')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Tamanyo where id_tamanyo = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Tamanyo";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $categoria = new Tamanyo($obj["id_tamanyo"],$obj["altura"],$obj["peso"]);
                array_push($rtn, $categoria);
            }
            $db->close();
            return $rtn;
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
            $this->id_tamanyo = 0;
            $this->altura = 0;
            $this->peso = 0;
        }
        
        function __construct2($a2, $a3){
            $this->id_tamanyo = "";
            $this->altura = $a2;
            $this->peso = $a3;
        }
        function __construct3($a1, $a2, $a3){
            $this->id_tamanyo = $a1;
            $this->altura = $a2;
            $this->peso = $a3;
        }
           
        //METODES SET
        public function setId_Tamanyo($id_tamanyo) {
            $this->id_tamanyo = $id_tamanyo;
        }
        public function setAltura($altura) {
            $this->altura = $altura;
        }
        public function setpeso($peso) {
            $this->peso = $peso;
        }
        
        //METODES GET 
        public function getId_Tamanyo() {
            return $this->id_tamanyo;
        }
        public function getAltura() {
            return $this->altura;
        }
        public function getPeso() {
            return $this->peso;
        }
    }
?>