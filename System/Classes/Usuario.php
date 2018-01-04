<?php
    require_once __DIR__."/../config.php";
    class Usuario{
        /*Atributs*/
        private $id_usuario;
        private $nickname;
        private $email;
        private $password;
        private $nombre;
        private $apellido;
        private $telefono;
        private $id_tipo;
        private $imagen;
        private $num_partidas;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db2 = $db->query("INSERT INTO Usuario(`nickname`, `email`, `password`, `id_tipo`) "
                    . "VALUES ('$this->nickname', '$this->email', '$this->password', '$this->id_tipo')");
            $db->close();
            return $db2;
        }
        public function modIdentity($id, $nombre, $apellido){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  nombre='$nombre', apellido='$apellido' WHERE id_usuario= '$id'");
            $db->close();
            return $result;
        }
        public function modPass($id, $pass){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  password='$pass' WHERE id_usuario= '$id'");
            $db->close();
            return $result;
        }
        public function modPhone($id, $telefono){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  telefono='$telefono' WHERE id_usuario= '$id'");
            $db->close();
            return $result;
        }
        public function modImage($id, $imagen){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  imagen='$imagen' WHERE id_usuario= '$id'");
            $db->close();
            return $result;
        }
        public function modEmail($id, $email){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  email='$email' WHERE id_usuario= '$id'");
            $db->close();
            return $result;
        }
        public function modNickname($id, $nickname){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  nickname='$nickname' WHERE id_usuario= '$id'");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Usuario where id_usuario = $var";
            $db->query($sql);
            return $result;
        }
        
        public function userflag($id, $nickname){
            $db = new connexio();
            $sql = "SELECT * FROM Usuario WHERE nickname = '$nickname' and id_usuario= '$id'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                return 'yes';
            } else {
                return 'no';
            }
        }
        public function userexiste($nickname){
            $db = new connexio();
            $sql = "SELECT * FROM Usuario WHERE nickname = '$nickname'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                return 'yes';
            } else {
                return 'no';
            }
        }
        
        public function mailflag($id, $email){
            $db = new connexio();
            $sql = "SELECT * FROM Usuario WHERE email = '$email' and id_usuario= '$id'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                return 'yes';
            } else {
                return 'no';
            }
        }
        public function mailexiste($email){
            $db = new connexio();
            $sql = "SELECT * FROM Usuario WHERE email = '$email'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                return 'yes';
            } else {
                return 'no';
            }
        }
        
        public function verificar_login($nickname,$password){ 
            $db = new connexio();
            $sql = "SELECT * FROM Usuario WHERE nickname = '$nickname' and password = '$password'";
            $query = $db->query($sql);
            $count = 0;
            $datos = "";
            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $count++;
                    $datos = $row;
                }
            } else {
                $count = 0;
            }
            $db->close();
            if($count == 1){
                return $datos;
            }else{
                return null;
            }
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Usuario;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Usuario = new Usuario($obj["id_usuario"],$obj["nickname"],$obj["email"],$obj["password"],$obj["nombre"],$obj["apellido"],$obj["telefono"],$obj["id_tipo"],$obj["imagen"]);
                //var_dump($Usuario);
                array_push($rtn, $Usuario);
            }
            $db->close();
            return $rtn;
        }
        public function view_comp($id){
            $db = new connexio();
            $sql = "SELECT * FROM Usuario where id_usuario='$id'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Usuario = new Usuario($obj["nickname"],$obj["email"],$obj["password"],$obj["nombre"],$obj["apellido"],$obj["telefono"],$obj["id_tipo"],$obj["imagen"]);
                //var_dump($Usuario);
                array_push($rtn, $Usuario);
            }
            $db->close();
            return $rtn;
        }
        public function return_user($id){ 
            $db = new connexio();
            $sql = "SELECT * FROM Usuario WHERE id_usuario = '$id'";
            $query = $db->query($sql);
            $count = 0;
            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $count++;
                    $datos = $row;
                }
            } else {
                $count = 0;
            }
            $db->close();
            if($count == 1){
                return $datos;
            }else{
                return "error";
            }
        }
        
        public function modNum_Partidas($id, $num_partidas){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  num_partidas='$num_partidas' WHERE id_usuario= '$id'");
            $db->close();
            return $result;
        }
        public function returnNum_Partidas($id_usuario){ 
            $db = new connexio();
            $sql = "SELECT num_partidas FROM Usuario WHERE id_usuario='$id_usuario'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count = $obj["num_partidas"];
                }
                return $count;
            }else{
                return null;
            }
        }
        
        public function buscUsuario($search){
            $db = new connexio();
            $sql = "SELECT id_usuario, nickname FROM Usuario where nickname  LIKE '%".$search."%' LIMIT 5";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                array_push($rtn, $obj);
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
            $this->id_usuario=0;
            $this->nickname = "";
            $this->email = "";
            $this->password = "";
            $this->nombre = "";
            $this->apellido = "";
            $this->telefono = "";
            $this->id_tipo = "";
            $this->imagen = "";
        }
        
        function __construct4($a2, $a3, $a4, $a8){
            $this->id_usuario=0;
            $this->nickname = $a2;
            $this->email = $a3;
            $this->password = $a4;
            $this->nombre = "";
            $this->apellido = "";
            $this->telefono = "";
            $this->id_tipo = $a8;
            $this->imagen = ""; 
        }
        
        function __construct8($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9){
            $this->id_usuario=0;
            $this->nickname = $a2;
            $this->email = $a3;
            $this->password = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->telefono = $a7;
            $this->id_tipo = $a8;
            $this->imagen = $a9; 
        }
        
        function __construct9($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9){
            $this->id_usuario=$a1;
            $this->nickname = $a2;
            $this->email = $a3;
            $this->password = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->telefono = $a7;
            $this->id_tipo = $a8;
            $this->imagen = $a9;
        }
           
        //METODES SET
        public function setId_Usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
        public function setNickname($nickname) {
            $this->nickname = $nickname;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setTelefon($telefono) {
            $this->telefono = $telefono;
        }
        public function setId_Tipo($id_tipo) {
            $this->id_tipo = $id_tipo;
        }
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
        
        //METODES GET 
        public function getId_Usuario() {
            return $this->id_usuario;
        }
        public function getNickname() {
            return $this->nickname;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getTelefon() {
            return $this->telefono;
        }
        public function getId_Tipo() {
            return $this->id_tipo;
        }
        public function getImagen() {
            return $this->imagen;
        }
    }
?>