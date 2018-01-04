<?php
    require_once __DIR__."/../config.php";
    class Objeto{
        /*Atributs*/
        private $id_objeto;
        private $nombre;
        private $descripcion;
        private $peso;
        private $precio;
        private $public;
        private $disponibilidad;
        private $calidad;
        private $id_tipo;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db2 = $db->query("INSERT INTO Objeto(`nombre`, `descripcion`, `peso`, `precio`, `public`, `disponibilidad`, `calidad`, `id_tipo`) "
                    . "VALUES ('$this->nombre', '$this->descripcion', '$this->peso','$this->precio', '$this->public', '$this->disponibilidad', '$this->calidad', '$this->id_tipo')");
            $db->close();
            return $db2;
        }
       
         public function modObj($id_objeto,$nombre,$descripcion,$peso,$precio,$disponibilidad,$calidad){
            $db = new connexio();
            $result = $db->query("UPDATE Objeto SET nombre='$nombre', descripcion='$descripcion', peso='$peso', precio='$precio', disponibilidad='$disponibilidad', calidad='$calidad' WHERE id_objeto= '$id_objeto'");
            $db->close();
            return $result;
        }
        
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Objeto where id_objeto = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Objeto = new Objeto($obj["id_objeto"],$obj["nombre"],$obj["descripcion"],$obj["peso"],$obj["precio"],$obj["public"],$obj["disponibilidad"],$obj["calidad"],$obj["id_tipo"]);
                //var_dump($Objeto);
                array_push($rtn, $Objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewObj($id){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto where id_objeto='$id'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Objeto = new Objeto($obj["id_objeto"],$obj["nombre"],$obj["descripcion"],$obj["peso"],$obj["precio"],$obj["public"],$obj["disponibilidad"],$obj["calidad"],$obj["id_tipo"]);
                //var_dump($Objeto);
                array_push($rtn, $Objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewArmas(){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto where id_tipo='3' and public='true'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Objeto = new Objeto($obj["id_objeto"],$obj["nombre"],$obj["descripcion"],$obj["peso"],$obj["precio"],$obj["public"],$obj["disponibilidad"],$obj["calidad"],$obj["id_tipo"]);
                //var_dump($Objeto);
                array_push($rtn, $Objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewArmadura(){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto where id_tipo='2' and public='true'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Objeto = new Objeto($obj["id_objeto"],$obj["nombre"],$obj["descripcion"],$obj["peso"],$obj["precio"],$obj["public"],$obj["disponibilidad"],$obj["calidad"],$obj["id_tipo"]);
                //var_dump($Objeto);
                array_push($rtn, $Objeto);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewLast(){
            $db = new connexio();
            $sql = "SELECT * FROM `objeto` order by id_objeto desc limit 1";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Objeto = new Objeto($obj["id_objeto"],$obj["nombre"],$obj["descripcion"],$obj["peso"],$obj["precio"],$obj["public"],$obj["disponibilidad"],$obj["calidad"],$obj["id_tipo"]);
                //var_dump($Objeto);
                array_push($rtn, $Objeto);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewObjetosPublicos(){
            $db = new connexio();
            $sql = "SELECT * FROM Objeto where public='true'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Objeto = new Objeto($obj["nombre"],$obj["descripcion"],$obj["peso"],$obj["precio"],$obj["public"],$obj["disponibilidad"],$obj["calidad"],$obj["id_tipo"]);
                //var_dump($Objeto);
                array_push($rtn, $Objeto);
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
            $this->id_objeto=0;
            $this->nombre = "";
            $this->descripcion = "";
            $this->peso = "";
            $this->precio = "";
            $this->public = "";
            $this->disponibilidad = "";
            $this->calidad = "";
            $this->id_tipo = "";
        }
        
        function __construct8($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9){
            $this->id_objeto=0;
            $this->nombre = $a2;
            $this->descripcion = $a3;
            $this->peso = $a4;
            $this->precio = $a5;
            $this->public = $a6;
            $this->disponibilidad = $a7;
            $this->calidad = $a8;
            $this->id_tipo = $a9; 
        }
        
        function __construct9($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9){
            $this->id_objeto=$a1;
            $this->nombre = $a2;
            $this->descripcion = $a3;
            $this->peso = $a4;
            $this->precio = $a5;
            $this->public = $a6;
            $this->disponibilidad = $a7;
            $this->calidad = $a8;
            $this->id_tipo = $a9;
        }
           
        //METODES SET
        public function setId_Objeto($id_objeto) {
            $this->id_objeto = $id_objeto;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public function setPeso($peso) {
            $this->peso = $peso;
        }
        public function setPrecio($precio) {
            $this->precio = $precio;
        }
        public function setPublic($public) {
            $this->public = $public;
        }
        public function setDisponibilidad($disponibilidad) {
            $this->disponibilidad = $disponibilidad;
        }
        public function setCalidad($calidad) {
            $this->calidad = $calidad;
        }
        public function setId_Tipo($id_tipo) {
            $this->id_tipo = $id_tipo;
        }
        
        //METODES GET 
        public function getId_Objeto() {
            return $this->id_objeto;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }
        public function getPeso() {
            return $this->peso;
        }
        public function getPrecio() {
            return $this->precio;
        }
        public function getPublic() {
            return $this->public;
        }
        public function getDisponibilidad() {
            return $this->disponibilidad;
        }
        public function getCalidad() {
            return $this->calidad;
        }
        public function getId_Tipo() {
            return $this->id_tipo;
        }
    }
?>
