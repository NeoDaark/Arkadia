<?php
    require_once __DIR__."/../config.php";
    class Partida{
        /*Atributs*/
        private $id_partida;
        private $id_usuario;
        private $nombre;
        private $imagen;
        private $descripcion;
        private $anyo;
        private $nv_sobrenatural;
        private $limite;
        private $token;
        private $diario;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Partida(`id_usuario`, `nombre`, `imagen`, `descripcion`, `anyo`, `nv_sobrenatural`, `limite`) VALUES ('$this->id_usuario', '$this->nombre', '$this->imagen', '$this->descripcion', '$this->anyo', '$this->nv_sobrenatural', '$this->limite')");
            $id = $db->insert_id; // retorna el id autogenerat de aquest ultim insert.
            $db->close();
            return $id;
        }
        public function modPartida($id, $imagen, $descripcion, $anyo, $nivel, $limite){
            $db = new connexio();
            $result = $db->query("UPDATE Partida SET imagen='$imagen', descripcion='$descripcion',  anyo='$anyo', nv_sobrenatural='$nivel', limite='$limite' WHERE id_partida= '$id'");
            $db->close();
            return $result;
        }
        public function modToken($id_partida, $token){
            $db = new connexio();
            $result = $db->query("UPDATE Partida SET token='$token' WHERE id_partida= '$id_partida'");
            $db->close();
            return $result;
        }
        public function modDiario($id_partida, $diario){
            $db = new connexio();
            $result = $db->query("UPDATE Partida SET diario='$diario' WHERE id_partida= '$id_partida'");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "DELETE FROM Partida WHERE id_partida=$var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Partida";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $rtn = array();
                while($obj = $query->fetch_assoc()){
                    $Partida = new Partida($obj["id_partida"],$obj["id_usuario"],$obj["nombre"],$obj["imagen"],$obj["descripcion"],$obj["anyo"],$obj["nv_sobrenatural"],$obj["limite"],$obj["token"],$obj['diario']);
                    //var_dump($Partida);
                    array_push($rtn, $Partida);
                }
                return $rtn;
            }else{
                return null;
            }
        }
        
        public function buscPartida($search){
            $db = new connexio();
            $sql = "SELECT * FROM Partida where nombre  LIKE '%$search%'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Partida = new Partida($obj["id_partida"],$obj["id_usuario"],$obj["nombre"],$obj["imagen"],$obj["descripcion"],$obj["anyo"],$obj["nv_sobrenatural"],$obj["limite"],$obj["token"],$obj['diario']);
                //var_dump($Partida);
                array_push($rtn, $Partida);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewPartida($id){
            $db = new connexio();
            $sql = "SELECT * FROM Partida where id_partida='$id'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $Partida = new Partida($obj["id_partida"],$obj["id_usuario"],$obj["nombre"],$obj["imagen"],$obj["descripcion"],$obj["anyo"],$obj["nv_sobrenatural"],$obj["limite"],$obj["token"],$obj['diario']);
                }
                if($count == 1){
                    return $Partida;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        public function viewPartida2($id){
            $db = new connexio();
            $sql = "SELECT * FROM Partida where id_usuario='$id'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $Partida = new Partida($obj["id_partida"],$obj["id_usuario"],$obj["nombre"],$obj["imagen"],$obj["descripcion"],$obj["anyo"],$obj["nv_sobrenatural"],$obj["limite"],$obj["token"],$obj['diario']);
                }
                if($count == 1){
                    return $Partida;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        public function returnId_Partida($token){ 
            $db = new connexio();
            $sql = "SELECT id_partida FROM Partida WHERE token='$token'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $id = $obj["id_partida"];
                }
                return $id;
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
            $this->id_partida = 0;
            $this->id_usuario = 0;
            $this->nombre = "";
            $this->imagen = "";
            $this->descripcion = "";
            $this->anyo = "";
            $this->nv_sobrenatural = 0;
            $this->limite = 0;
            $this->token = "";
            $this->diario = "";
        }
        
        function __construct7($a2, $a3, $a4, $a5, $a6, $a7, $a8){
            $this->id_partida = 0;
            $this->id_usuario = $a2;
            $this->nombre = $a3;
            $this->imagen = $a4;
            $this->descripcion = $a5;
            $this->anyo = $a6;
            $this->nv_sobrenatural = $a7;
            $this->limite = $a8;
            $this->token = "";
            $this->diario = "";
        }
        
        function __construct10($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10){
            $this->id_partida = $a1;
            $this->id_usuario = $a2;
            $this->nombre = $a3;
            $this->imagen = $a4;
            $this->descripcion = $a5;
            $this->anyo = $a6;
            $this->nv_sobrenatural = $a7;
            $this->limite = $a8;
            $this->token = $a9;
            $this->diario = $a10;
        }
           
        //METODES SET
        public function setId_Partida($id_partida) {
            $this->id_partida = $id_partida;
        }
        public function setId_Usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public function setAnyo($anyo) {
            $this->anyo = $anyo;
        }
        public function setNv_Sobrenatural($nv_sobrenatural) {
            $this->nv_sobrenatural = $nv_sobrenatural;
        }
        public function setLimite($limite) {
            $this->limite = $limite;
        }
        public function setLToken($token) {
            $this->token = $token;
        }
        public function setDiario($diario) {
            $this->diario = $diario;
        }
        
        //METODES GET 
        public function getId_Partida() {
            return $this->id_partida;
        }
        public function getId_Usuario() {
            return $this->id_usuario;
        }
        public function getNombre() {
            return $this->nombre;
        }
         public function getImagen() {
            return $this->imagen;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }
        public function getAnyo() {
            return $this->anyo;
        }
        public function getNv_Sobrenatural() {
            return $this->nv_sobrenatural;
        }
        public function getLimite() {
            return $this->limite;
        }
        public function getToken() {
            return $this->token;
        }
        public function getDiario() {
            return $this->diario;
        }
    }
?>
