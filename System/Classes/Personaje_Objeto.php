<?php
    require_once __DIR__."/../config.php";
    class Personaje_Objeto{
        /*Atributs*/
        private $id_personaje;
        private $id_objeto;
        private $cantidad;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Personaje_Objeto(`id_personaje`, `id_objeto`) "
                    . "VALUES ('$this->id_personaje', '$this->id_objeto')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje_Objeto where id_objeto = $var";
            $db->query($sql);
            return $result;
        }
        public function delete2($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje_Objeto where id_personaje = $var";
            $db->query($sql);
            return $result;
        }
        
        public function modPerObj($id_personaje, $id_objeto, $arma){
            $db = new connexio();
            $result = $db->query("UPDATE Personaje_Objeto SET  id_objeto='$arma' WHERE id_personaje= '$id_personaje' and id_objeto='$id_objeto'");
            $db->close();
            return $result;
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_Objeto";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Personaje_Objeto($obj["id_personaje"],$obj["id_objeto"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
         
        public function viewObj($id_personaje){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_Objeto where id_personaje='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_objeto = new Personaje_Objeto($obj["id_personaje"],$obj["id_objeto"]);
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
        public function viewObjPerson($id_personaje){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_Objeto WHERE id_personaje='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            $rtn = array();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $partida_objeto = new Personaje_Objeto($obj["id_personaje"],$obj["id_objeto"],$obj["cantidad"]);
                    array_push($rtn, $partida_objeto);
                }
                return $rtn;
            }else{
                return null;
            }
        }
        public function viewObjPerson2($id_personaje){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_Objeto where id_personaje='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            $rtn = array();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $partida_objeto = new Personaje_Objeto($obj["id_personaje"],$obj["id_objeto"],$obj["cantidad"]);
                    array_push($rtn, $partida_objeto);
                }
                return $rtn;
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
            $this->id_objeto = 0;
        }
        
        function __construct2($a1, $a2){
            $this->id_personaje = $a1;
            $this->id_objeto = $a2;
        }
        function __construct3($a1, $a2, $a3){
            $this->id_personaje = $a1;
            $this->id_objeto = $a2;
            $this->cantidad = $a3;
        }
           
        //METODES SET
        public function setId_Personaje($id_personaje) {
            $this->id_personaje = $id_personaje;
        }
        public function setId_Objeto($id_objeto) {
            $this->id_objeto = $id_objeto;
        }
        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        }
        
        //METODES GET 
        public function getId_Personaje() {
            return $this->id_personaje;
        }
        public function getId_Objeto() {
            return $this->id_objeto;
        }
        public function getCantidad() {
            return $this->cantidad;
        }
    }
?>