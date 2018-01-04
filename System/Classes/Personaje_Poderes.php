<?php
    require_once __DIR__."/../config.php";
    class Personaje_HS{
        /*Atributs*/
        private $id_poder;
        private $id_personaje;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Personaje_HS(`id_personaje`, `id_poder`) "
                    . "VALUES ('$this->id_personaje', '$this->id_poder')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje_HS where id_poder = $var";
            $db->query($sql);
            return $result;
        }
    
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_HS";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Personaje_HS($obj["id_personaje"],$obj["id_poder"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewObj($id_personaje){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_HS where id_personaje='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_objeto = new Personaje_HS($obj["id_personaje"],$obj["id_poder"]);
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
            $this->id_poder = 0;
        }
        
        function __construct2($a1, $a2){
            $this->id_personaje = $a1;
            $this->id_poder = $a2;
        }
           
        //METODES SET
        public function setId_Personaje($id_personaje) {
            $this->id_personaje = $id_personaje;
        }
        public function setId_Poder($id_poder) {
            $this->id_poder = $id_poder;
        }
        
        //METODES GET 
        public function getId_Personaje() {
            return $this->id_personaje;
        }
        public function getId_Poder() {
            return $this->id_poder;
        }
    }
?>