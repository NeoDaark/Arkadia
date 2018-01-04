<?php
    require_once __DIR__."/../config.php";
    class Partida_Objeto{
        /*Atributs*/
        private $id_partida;
        private $id_objeto;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Partida_Objeto(`id_objeto`, `id_partida`) "
                    . "VALUES ('$this->id_objeto', '$this->id_partida')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Partida_Objeto where id_partida = $var";
            $db->query($sql);
            return $result;
        }
        public function delete2($var){
            $db = new connexio();
            $result = $sql = "delete from Partida_Objeto where id_objeto = $var";
            $db->query($sql);
            return $result;
        }
    
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Objeto";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Partida_Objeto($obj["id_objeto"],$obj["id_partida"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewObj($id_objeto){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Objeto where id_objeto='$id_objeto'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_objeto = new Partida_Objeto($obj["id_objeto"],$obj["id_partida"]);
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
        public function view_Objetos_Partida($id_partida){
            $db = new connexio();
            $sql = "SELECT id_objeto FROM Partida_Objeto where id_partida='$id_partida'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $objeto_partida = new Partida_Objeto($obj["id_objeto"]);
                //var_dump($Partida);
                array_push($rtn, $objeto_partida);
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
            $this->id_objeto = 0;
            $this->id_partida = 0;
        }
        
        function __construct1($a1){
            $this->id_objeto = $a1;
            $this->id_partida = 0;
        }
        
        function __construct2($a1, $a2){
            $this->id_objeto = $a1;
            $this->id_partida = $a2;
        }
           
        //METODES SET
        public function setId_Objeto($id_objeto) {
            $this->id_objeto = $id_objeto;
        }
        public function setId_Partida($id_partida) {
            $this->id_partida = $id_partida;
        }
        
        //METODES GET 
        public function getId_Objeto() {
            return $this->id_objeto;
        }
        public function getId_Partida() {
            return $this->id_partida;
        }
    }
?>