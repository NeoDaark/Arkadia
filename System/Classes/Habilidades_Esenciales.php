<?php
    require_once __DIR__."/../config.php";
    class Habilidades_Esenciales{
        /*Atributs*/
        private $id_habilidad;
        private $nombre;
        private $efecto;
        private $coste;
        private $gnosis;
        private $tipo;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Habilidades_Esenciales(`nombre`, `efecto`, `coste`, `gnosis`, `tipo`) "
                    . "VALUES ('$this->nombre', '$this->efecto', '$this->coste', '$this->gnosis', '$this->tipo')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Habilidades_Esenciales where id_habilidad = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Habilidades_Esenciales";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $habilidad = new Habilidades_Esenciales($obj["id_habilidad"],$obj["nombre"],$obj["efecto"],$obj["coste"],$obj["gnosis"],$obj["tipo"]);
                array_push($rtn, $habilidad);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewHabEs($id_habilidad){
            $db = new connexio();
            $sql = "SELECT * FROM Habilidades_Esenciales where id_habilidad='$id_habilidad'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $habilidad = new Habilidades_Esenciales($obj["id_habilidad"],$obj["nombre"],$obj["efecto"],$obj["coste"],$obj["gnosis"],$obj["tipo"]);
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
            $this->id_habilidad = 0;
            $this->nombre = 0;
            $this->efecto = 0;
            $this->coste = 0;
            $this->gnosis = 0;
            $this->tipo = 0;
        }
        
        function __construct5($a2, $a3, $a4, $a5, $a6){
            $this->id_habilidad = "";
            $this->nombre = $a2;
            $this->efecto = $a3;
            $this->coste = $a4;
            $this->gnosis = $a5;
            $this->tipo = $a6;
        }
        function __construct6($a1, $a2, $a3, $a4, $a5, $a6){
            $this->id_habilidad = $a1;
            $this->nombre = $a2;
            $this->efecto = $a3;
            $this->coste = $a4;
            $this->gnosis = $a5;
            $this->tipo = $a6;
        }
           
        //METODES SET
        public function setId_Habilidad($id_habilidad) {
            $this->id_habilidad = $id_habilidad;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setEfecto($efecto) {
            $this->efecto = $efecto;
        }
        public function setCoste($coste) {
            $this->coste = $coste;
        }
        public function setGnosis($gnosis) {
            $this->gnosis = $gnosisr;
        }
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }
        
        //METODES GET 
        public function getId_Habilidad() {
            return $this->id_habilidad;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getEfecto() {
            return $this->efecto;
        }
        public function getCoste() {
            return $this->coste;
        }
        public function getGnosis() {
            return $this->gnosis;
        }
        public function getTipo() {
            return $this->tipo;
        }
    }
?>