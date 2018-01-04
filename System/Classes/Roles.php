<?php
    require_once __DIR__."/../config.php";
    class Roles{
        /*Atributs*/
        private $id_tipo;
        private $nombre;
        
        //METODES
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Roles";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Roles = new Roles($obj["id_tipo"],$obj["nombre"]);
                //var_dump($Roles);
                array_push($rtn, $Roles);
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
            $this->id_tipo=0;
            $this->nombre = "";
        }
        function __construct1($a2){
            $this->id_tipo=0;
            $this->nombre = $a2;
        }
        function __construct2($a1, $a2){
            $this->id_tipo=$a1;
            $this->nombre = $a2;
        }
           
        //METODES SET
        public function setId_Tipo($id_tipo) {
            $this->id_tipo = $id_tipo;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        
        //METODES GET 
        public function getId_Tipo(){
            return $this->id_tipo;
        }
        public function getNombre(){
            return $this->nombre;
        }
    }
?>

