<?php
    require_once __DIR__."/../config.php";
    class Rama{
        /*Atributs*/
        private $id_rama;
        private $nombre;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Rama(`nombre`) "
                    . "VALUES ('$this->nombre')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Rama where id_rama = $var";
            $db->query($sql);
            return $result;
        }
    
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Rama";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Rama($obj["id_rama"],$obj["nombre"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewRama($id){
            $db = new connexio();
            $sql = "SELECT * FROM Rama where id_rama='$id'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_objeto = new Rama($obj["id_rama"], $obj["nombre"]);
                }
                if($count == 1){
                    return $partida_objeto;
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
            $this->id_rama = 0;
            $this->nombre = 0;
        }
        
        function __construct1($a2){
            $this->id_rama = 0;
            $this->nombre = $a2;
        }
           
        //METODES SET
        public function setId_Rama($id_rama) {
            $this->id_rama = $id_rama;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        
        //METODES GET 
        public function getId_Rama() {
            return $this->id_rama;
        }
        public function getNombre() {
            return $this->nombre;
        }
    }
?>