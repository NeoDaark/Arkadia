<?php
    require_once __DIR__."/../config.php";
    class Efecto{
        /*Atributs*/
        private $id_efecto;
        private $nombre;
        private $coste;
        private $gnosis;
        private $penalizador;
        private $id_poder;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Efecto(`nombre`, `coste`, `gnosis`, `penalizador`, `id_poder`) "
                    . "VALUES ('$this->nombre', '$this->coste', '$this->gnosis', '$this->penalizador', '$this->id_poder')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Efecto where id_efecto = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Efecto";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $efecto = new Efecto($obj["id_efecto"],$obj["nombre"],$obj["coste"],$obj["gnosis"],$obj["penalizador"],$obj["id_poder"]);
                array_push($rtn, $efecto);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewEfecto($id_efecto){
            $db = new connexio();
            $sql = "SELECT * FROM Efecto where id_efecto='$id_efecto'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $efecto = new Efecto($obj["id_efecto"],$obj["nombre"],$obj["coste"],$obj["gnosis"],$obj["penalizador"],$obj["id_poder"]);
                }
                if($count == 1){
                    return $efecto;
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
            $this->id_efecto = 0;
            $this->nombre = 0;
            $this->coste = 0;
            $this->gnosis = 0;
            $this->penalizador = 0;
            $this->id_poder = 0;
        }
        
        function __construct5($a2, $a3, $a4, $a5, $a6){
            $this->id_efecto = "";
            $this->nombre = $a2;
            $this->coste = $a3;
            $this->gnosis = $a4;
            $this->penalizador = $a5;
            $this->id_poder = $a6;
        }
        function __construct6($a1, $a2, $a3, $a4, $a5, $a6){
            $this->id_efecto = $a1;
            $this->nombre = $a2;
            $this->coste = $a3;
            $this->gnosis = $a4;
            $this->penalizador = $a5;
            $this->id_poder = $a6;
        }
           
        //METODES SET
        public function setId_Efecto($id_efecto) {
            $this->id_efecto = $id_efecto;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setCoste($coste) {
            $this->coste = $coste;
        }
        public function setGnosis($gnosis) {
            $this->gnosis = $gnosis;
        }
        public function setPenalizador($penalizador) {
            $this->penalizador = $penalizador;
        }
        public function setId_Poder($id_poder) {
            $this->id_poder = $id_poder;
        }
        
        //METODES GET 
        public function getId_Efecto() {
            return $this->id_efecto;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getCoste() {
            return $this->coste;
        }
        public function getGnosis() {
            return $this->gnosis;
        }
        public function getPenalizador() {
            return $this->penalizador;
        }
        public function getId_Poder() {
            return $this->id_poder;
        }
    }
?>