<?php
    require_once __DIR__."/../config.php";
    class Ventaja{
        /*Atributs*/
        private $id_ventaja;
        private $tipo;
        private $nombre;
        private $descripcion;
        private $efectos;
        private $limitacion;
        private $puntos_creacion;
        
        //METODES
       public function add(){
            $db = new connexio();
            $db2 = $db->query("INSERT INTO Ventaja(`tipo`, `nombre`, `descripcion`, `efectos`, `limitacion`, `puntos_creacion`) "
                    . "VALUES ('$this->tipo', '$this->nombre', '$this->descripcion', '$this->efectos', '$this->limitacion', '$this->puntos_creacion')");
            $db->close();
            return $db2;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Ventaja";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Ventaja = new Ventaja($obj["id_ventaja"],$obj["tipo"],$obj["nombre"],$obj["descripcion"],$obj["efectos"],$obj["limitacion"],$obj["puntos_creacion"]);
                //var_dump($Ventaja);
                array_push($rtn, $Ventaja);
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
            $this->id_ventaja = 0;
            $this->tipo = "";
            $this->nombre = "";
            $this->descripcion = "";
            $this->efectos = "";
            $this->limitacion = "";
            $this->puntos_creacion = "";
        }
        
        function __construct6($a2, $a3, $a4, $a5, $a6, $a7){
            $this->id_ventaja = 0;
            $this->tipo = $a2;
            $this->nombre = $a3;
            $this->descripcion = $a4;
            $this->efectos = $a5;
            $this->limitacion = $a6;
            $this->puntos_creacion = $a7;
        }
        
        function __construct7($a1, $a2, $a3, $a4, $a5, $a6, $a7){
            $this->id_ventaja = $a1;
            $this->tipo = $a2;
            $this->nombre = $a3;
            $this->descripcion = $a4;
            $this->efectos = $a5;
            $this->limitacion = $a6;
            $this->puntos_creacion = $a7;
        }
           
        //METODES SET
        public function setId_Ventaja($id_ventaja) {
            $this->id_ventaja = $id_ventaja;
        }
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public function setEfectos($efectos) {
            $this->efectos = $efectos;
        }
        public function setLimitacion($limitacion) {
            $this->limitacion = $limitacion;
        }
        public function setPuntos_Creacion($puntos_creacion) {
            $this->puntos_creacion = $puntos_creacion;
        }
        
        //METODES GET 
        public function getId_Ventaja() {
            return $this->id_ventaja;
        }
        public function getTipo() {
            return $this->tipo;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }
        public function getEfectos() {
            return $this->efectos;
        }
        public function getLimitacion() {
            return $this->limitacion;
        }
        public function getPuntos_Creacion() {
            return $this->puntos_creacion;
        }
    }
?>