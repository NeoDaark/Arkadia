<?php
    require_once __DIR__."/../config.php";
    class Personaje_HS{
        /*Atributs*/
        private $id_HS;
        private $id_personaje;
        private $valor;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Personaje_HS(`id_personaje`, `id_HS`, `valor`) "
                    . "VALUES ('$this->id_personaje', '$this->id_HS', '$this->valor')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje_HS where id_HS = $var";
            $db->query($sql);
            return $result;
        }
        public function delete2($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje_HS where id_personaje = $var";
            $db->query($sql);
            return $result;
        }
    
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_HS";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Personaje_HS($obj["id_personaje"],$obj["id_HS"],$obj["valor"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewObj($id_personaje){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_HS where id_personaje='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_objeto = new Personaje_HS($obj["id_personaje"],$obj["id_HS"]);
                }
                if($count == 1){
                    return $partida_objeto;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        
         public function modPerHS($id_personaje, $id_HS, $valor){
            $db = new connexio();
            
            $sqlmod = "UPDATE Personaje_HS SET valor='$valor' WHERE id_personaje = '$id_personaje' and id_HS='$id_HS'";
            
            $result = $db->query($sqlmod);
            
            $db->close();
            return $result;
        }
        
        public function viewPersonaje_HS($id_personaje){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_HS where id_personaje='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            $rtn = array();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $personaje_hs = new Personaje_HS($obj["id_personaje"],$obj["id_HS"],$obj['valor']);
                    array_push($rtn, $personaje_hs);
                }
                return $rtn;
            }else{
                return null;
            }
        }
        
        public function viewPersonaje_HS2($id_personaje, $id_HS){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_HS where id_personaje='$id_personaje' and id_HS='$id_HS'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
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
            $this->id_personaje = 0;
            $this->id_HS = 0;
            $this->valor = 0;
        }
        
        function __construct3($a1, $a2, $a3){
            $this->id_personaje = $a1;
            $this->id_HS = $a2;
            $this->valor = $a3;

        }
           
        //METODES SET
        public function setId_Personaje($id_personaje) {
            $this->id_personaje = $id_personaje;
        }
        public function setId_HS($id_HS) {
            $this->id_HS = $id_HS;
        }
        public function setValor($valor) {
            $this->valor = $valor;
        }
        
        //METODES GET 
        public function getId_Personaje() {
            return $this->id_personaje;
        }
        public function getId_HS() {
            return $this->id_HS;
        }
        public function getValor() {
            return $this->valor;
        }
    }
?>