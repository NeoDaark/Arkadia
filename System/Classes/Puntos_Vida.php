<?php
    require_once __DIR__."/../config.php";
    class Puntos_Vida{
        /*Atributs*/
        private $id_constitucion;
        private $cantidad;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Puntos_Vida(`id_constitucion`, `cantidad`) "
                    . "VALUES ('$this->id_constitucion', '$this->cantidad')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Puntos_Vida where id_constitucion = $var";
            $db->query($sql);
            return $result;
        }
    
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Puntos_Vida";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Puntos_Vida($obj["cantidad"],$obj["id_constitucion"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewVida($id){
            $db = new connexio();
            $sql = "SELECT * FROM Puntos_Vida where id_constitucion='$id'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Puntos_Vida($obj["id_constitucion"],$obj["cantidad"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
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
            $this->id_constitucion = 0;
            $this->cantidad = 0;
        }
        
        function __construct2($a1, $a2){
            $this->id_constitucion = $a1;
            $this->cantidad = $a2;
        }
           
        //METODES SET
        public function setId_Constitucion($id_constitucion) {
            $this->id_constitucion = $id_constitucion;
        }
        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        }
        
        //METODES GET 
        public function getId_Constitucion() {
            return $this->id_constitucion;
        }
        public function getCantidad() {
            return $this->cantidad;
        }
    }
?>