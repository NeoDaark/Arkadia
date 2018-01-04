<?php
    require_once __DIR__."/../config.php";
    class Poderes_Monstruo{
        /*Atributs*/
        private $id_poder;
        private $nombre;
        private $descripcion;
        private $explicacion;
        private $prohibicion;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Poderes_Monstruo(`nombre`, `descripcion`, `explicacion`, `prohibicion`) "
                    . "VALUES ('$this->nombre', '$this->descripcion', '$this->explicacion', '$this->prohibicion')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Poderes_Monstruo where id_poder = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Poderes_Monstruo";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $poder = new Poderes_Monstruo($obj["descripcion"],$obj["nombre"],$obj["explicacion"],$obj["prohibicion"],$obj["id_poder"]);
                array_push($rtn, $poder);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewCat($descripcion){
            $db = new connexio();
            $sql = "SELECT * FROM Poderes_Monstruo where descripcion='$descripcion'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $poder = new Poderes_Monstruo($obj["descripcion"],$obj["nombre"],$obj["explicacion"],$obj["prohibicion"],$obj["id_poder"]);
                }
                if($count == 1){
                    return $poder;
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
            $this->id_poder = 0;
            $this->nombre = 0;
            $this->descripcion = 0;
            $this->explicacion = 0;
            $this->prohibicion = 0;
        }
        
        function __construct5($a2, $a3, $a4, $a5){
            $this->id_poder = "";
            $this->nombre = $a2;
            $this->descripcion = $a3;
            $this->explicacion = $a4;
            $this->prohibicion = $a5;
        }
        function __construct6($a1, $a2, $a3, $a4, $a5){
             $this->id_poder = $a1;
            $this->nombre = $a2;
            $this->descripcion = $a3;
            $this->explicacion = $a4;
            $this->prohibicion = $a5;
        }
           
        //METODES SET
        public function setId_Poder($id_poder) {
            $this->id_poder = $id_poder;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public function setExplicacion($explicacion) {
            $this->explicacion = $explicacion;
        }
        public function setProhibicion($prohibicion) {
            $this->prohibicion = $prohibicion;
        }
        
        //METODES GET 
        public function getId_Poder() {
            return $this->id_poder;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }
        public function getExplicacion() {
            return $this->explicacion;
        }
        public function getProhibicion() {
            return $this->prohibicion;
        }
    }
?>