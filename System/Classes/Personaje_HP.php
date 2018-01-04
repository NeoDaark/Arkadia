<?php
    require_once __DIR__."/../config.php";
    class Personaje_HP{
        /*Atributs*/
        private $id_HP;
        private $id_personaje;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Personaje_HP(`id_personaje`, `id_HP`) "
                    . "VALUES ('$this->id_personaje', '$this->id_HP')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje_HP where id_HP = $var";
            $db->query($sql);
            return $result;
        }
    
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_HP";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Personaje_HP($obj["id_personaje"],$obj["id_HP"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewObj($id_personaje){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_HP where id_personaje='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_objeto = new Personaje_HP($obj["id_personaje"],$obj["id_HP"]);
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
            $this->id_personaje = 0;
            $this->id_HP = 0;
        }
        
        function __construct2($a1, $a2){
            $this->id_personaje = $a1;
            $this->id_HP = $a2;
        }
           
        //METODES SET
        public function setId_Personaje($id_personaje) {
            $this->id_personaje = $id_personaje;
        }
        public function setId_HP($id_HP) {
            $this->id_HP = $id_HP;
        }
        
        //METODES GET 
        public function getId_Personaje() {
            return $this->id_personaje;
        }
        public function getId_HP() {
            return $this->id_HP;
        }
    }
?>