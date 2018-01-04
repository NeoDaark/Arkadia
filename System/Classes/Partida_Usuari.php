<?php
    require_once __DIR__."/../config.php";
    class Partida_Usuari{
        /*Atributs*/
        private $id_usuario;
        private $id_partida;
        private $pos;
        private $aceptado;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Partida_Usuari(`id_usuario`, `id_partida`, `pos`, `aceptado`) "
                    . "VALUES ('$this->id_usuario', '$this->id_partida', '$this->pos', '$this->aceptado')");
            $db->close();
            return $result;
        }
        public function mod(){
            $db = new connexio();
            $result = $db->query("UPDATE Partida_Usuari SET  aceptado='$this->aceptado' WHERE id_usuario= '$this->id_usuario' and id_partida= '$this->id_partida'");
            $db->close();
            return $result;
        }
        public function deletepart($idu){
            $db = new connexio();
            $result = $sql = "delete from Partida_Usuari WHERE id_partida= '$idu'";
            $db->query($sql);
            return $result;
        }
        public function delete($idu){
            $db = new connexio();
            $result = $sql = "delete from Partida_Usuari WHERE id_usuario= '$idu' and aceptado= 'false'";
            $db->query($sql);
            return $result;
        }
        public function signout($idu, $idp){
            $db = new connexio();
            $sql = "delete from Partida_Usuari WHERE id_usuario= '$idu' and id_partida= '$idp'";
            $result = $db->query($sql);
            var_dump($result);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"]);
                //var_dump($Partida);
                array_push($rtn, $partida_usuari);
            }
            $db->close();
            return $rtn;
        }
        public function viewPos($id_usuario, $pos){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_usuario='$id_usuario' AND pos='$pos'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"]);
                }
                if($count == 1){
                    return $partida_usuari;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        public function viewMaster($id_usuario){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_usuario='$id_usuario' and aceptado='master' ORDER BY pos ASC";
            $query = $db->query($sql);
            $db->close();
            $rtn = array();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"],$obj["aceptado"]);
                    array_push($rtn, $partida_usuari);
                }
                return $rtn;
            }else{
                return null;
            }
        }
        public function viewUser($id_usuario){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_usuario='$id_usuario' and aceptado='true'";
            $query = $db->query($sql);
            $db->close();
            $rtn = array();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"],$obj["aceptado"]);
                    array_push($rtn, $partida_usuari);
                }
                return $rtn;
            }else{
                return null;
            }
        }
        public function viewInvited($id_usuario){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_usuario='$id_usuario' and aceptado='false' and pos = '-1'";
            $query = $db->query($sql);
            $db->close();
            $rtn = array();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"],$obj["aceptado"]);
                    array_push($rtn, $partida_usuari);
                }
                return $rtn;
            }else{
                return null;
            }
        }
        public function viewSolid($id_partida){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_partida='$id_partida' and aceptado='false' and pos = '-2'";
            $query = $db->query($sql);
            $db->close();
            $rtn = array();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"],$obj["aceptado"]);
                    array_push($rtn, $partida_usuari);
                }
                return $rtn;
            }else{
                return null;
            }
        }
        public function countUsers($id_partida){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_partida='$id_partida' and aceptado='true'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                }
                return $count;
            }else{
                return 0;
            }
        }
        public function testInvited($id_usuario, $id_partida){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_usuario='$id_usuario' and id_partida='$id_partida' and aceptado='true'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                return true;
            }else{
                return false;
            }
        }
        public function selectUsers($id_partida){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_partida='$id_partida' and aceptado='true'";
            $query = $db->query($sql);
            $db->close();
            $rtn = array();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"],$obj["aceptado"]);
                    array_push($rtn, $partida_usuari);
                }
                return $rtn;
            }else{
                return null;
            }
        }
        
        public function selectMaster($id_partida){
            $db = new connexio();
            $sql = "SELECT id_usuario FROM Partida_Usuari where id_partida='$id_partida' and aceptado='master'";
            $query = $db->query($sql);
            $obj = $query->fetch_assoc();
            $db->close();
            return $obj;
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
            $this->id_usuario = 0;
            $this->id_partida = 0;
            $this->pos = 0;
            $this->aceptado = '';
        }
        function __construct4($a1, $a2, $a3, $a4){
            $this->id_usuario = $a1;
            $this->id_partida = $a2;
            $this->pos = $a3;
            $this->aceptado = $a4;
        }
           
        //METODES SET
        public function setId_Usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
        public function setId_Partida($id_partida) {
            $this->id_partida = $id_partida;
        }
        public function setPos($pos) {
            $this->pos = $pos;
        }
        
        //METODES GET 
        public function getId_Usuario() {
            return $this->id_usuario;
        }
        public function getId_Partida() {
            return $this->id_partida;
        }
        public function getPos() {
            return $this->pos;
        }
    }
?>