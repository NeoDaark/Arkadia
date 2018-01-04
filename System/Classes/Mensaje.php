<?php
    require_once __DIR__."/../config.php";
    class Mensaje{
        /*Atributs*/
        private $id_usuario;
        private $Usuario_id_usuario;
        private $conversacion;
        private $fecha;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Mensaje(`id_usuario`, `Usuario_id_usuario`, `conversacion`, `fecha`) "
                    . "VALUES ('$this->id_usuario', '$this->Usuario_id_usuario', '$this->conversacion', '$this->fecha')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Mensaje where id_usuario = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Mensaje";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $mensaje = new Mensaje($obj["id_usuario"],$obj["Usuario_id_usuario"],$obj["conversacion"],$obj["fecha"]);
                array_push($rtn, $mensaje);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewMensaje($id_usuario){
            $db = new connexio();
            $sql = "SELECT * FROM Mensaje where id_usuario='$id_usuario'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $mensaje = new Mensaje($obj["id_usuario"],$obj["Usuario_id_usuario"],$obj["conversacion"],$obj["fecha"]);
                }
                if($count == 1){
                    return $mensaje;
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
            $this->id_usuario = 0;
            $this->Usuario_id_usuario = 0;
            $this->conversacion = 0;
            $this->fecha = 0;
        }
        
        function __construct3($a2, $a3, $a4){
            $this->id_usuario = "";
            $this->Usuario_id_usuario = $a2;
            $this->conversacion = $a3;
            $this->fecha = $a4;
        }
        function __construct4($a1, $a2, $a3, $a4){
            $this->id_usuario = $a1;
            $this->Usuario_id_usuario = $a2;
            $this->conversacion = $a3;
            $this->fecha = $a4;
        }
           
        //METODES SET
        public function setId_Usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
        public function setUsuario_Id_Usuario($Usuario_id_usuario) {
            $this->Usuario_id_usuario = $Usuario_id_usuario;
        }
        public function setConversacion($conversacion) {
            $this->conversacion = $conversacion;
        }
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
        
        //METODES GET 
        public function getId_Usuario() {
            return $this->id_usuario;
        }
        public function getUsuario_Id_Usuario() {
            return $this->Usuario_id_usuario;
        }
        public function getConversacion() {
            return $this->conversacion;
        }
        public function getFecha() {
            return $this->fecha;
        }
    }
?>