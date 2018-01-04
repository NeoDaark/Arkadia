<?php
    require_once __DIR__."/../config.php";
    class Nacionalidad{
        /*Atributs*/
        private $id;
        private $nombre;
        
        //METODES
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Nacionalidad";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Nacionalidad($obj["nombre"],$obj["id"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
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
            $this->nombre = 0;
            $this->id = 0;
        }
        
        function __construct2($a1, $a2){
            $this->nombre = $a1;
            $this->id = $a2;
        }
           
        //METODES SET
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setId($id) {
            $this->id = $id;
        }
        
        //METODES GET 
        public function getNombre() {
            return $this->nombre;
        }
        public function getId() {
            return $this->id;
        }
    }
?>