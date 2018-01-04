<?php
    require_once __DIR__."/../config.php";
    class Tipo{
        /*Atributs*/
        private $id_tipo;
        private $nombre;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Tipo(`nombre`) "
                    . "VALUES ('$this->nombre')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Tipo where id_tipo = $var";
            $db->query($sql);
            return $result;
        }
    
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Tipo";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Tipo($obj["id_tipo"],$obj["nombre"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
        public function view_nombre($id_tipo){
            $db = new connexio();
            $sql = "SELECT nombre FROM Tipo where id_tipo = '$id_tipo'";
            $query = $db->query($sql);
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $nombre = new Tipo($obj["nombre"]);
                }
                if($count == 1){
                    return $nombre;
                }else{
                    return null;
                }
            }else{
                return null;
            }
            $db->close();
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
            $this->id_tipo = 0;
            $this->nombre = 0;
        }
        
        function __construct1($a2){
            $this->id_tipo = 0;
            $this->nombre = $a2;
        }
        
        function __construct2($a1, $a2){
            $this->id_tipo = $a1;
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
        public function getId_Tipo() {
            return $this->id_tipo;
        }
        public function getNombre() {
            return $this->nombre;
        }
    }
?>