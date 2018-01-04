<?php
    require_once __DIR__."/../config.php";
    class Categoria{
        /*Atributs*/
        private $id_categoria;
        private $nombre;
        private $descripcion;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Categoria(`nombre`, `descripcion`) "
                    . "VALUES ('$this->nombre', '$this->descripcion')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Categoria where id_categoria = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Categoria";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $categoria = new Categoria($obj["id_categoria"],$obj["nombre"],$obj["descripcion"]);
                array_push($rtn, $categoria);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewCar($id_categoria){
            $db = new connexio();
            $sql = "SELECT * FROM Categoria where id_categoria='$id_categoria'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $id_categoria = new Categoria($obj["id_categoria"],$obj["nombre"],$obj["descripcion"]);
                }
                if($count == 1){
                    return $id_categoria;
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
            $this->id_categoria = 0;
            $this->nombre = 0;
            $this->descripcion = 0;
        }
        
        function __construct2($a2, $a3){
            $this->id_categoria = "";
            $this->nombre = $a2;
            $this->descripcion = $a3;
        }
        function __construct3($a1, $a2, $a3){
            $this->id_categoria = $a1;
            $this->nombre = $a2;
            $this->descripcion = $a3;
        }
           
        //METODES SET
        public function setId_Categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        //METODES GET 
        public function getId_Categoria() {
            return $this->id_categoria;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }
    }
?>