<?php
    require_once __DIR__."/../config.php";
    class Personaje_Habilidades{
        /*Atributs*/
        private $id_habilidad;
        private $id_personaje;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Personaje_Habilidades(`id_personaje`, `id_habilidad`) "
                    . "VALUES ('$this->id_personaje', '$this->id_habilidad')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje_Habilidades where id_habilidad = $var";
            $db->query($sql);
            return $result;
        }
    
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_Habilidades";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Personaje_Habilidades($obj["id_personaje"],$obj["id_habilidad"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewObj($id_personaje){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje_Habilidades where id_personaje='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_objeto = new Personaje_Habilidades($obj["id_personaje"],$obj["id_habilidad"]);
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
            $this->id_habilidad = 0;
        }
        
        function __construct2($a1, $a2){
            $this->id_personaje = $a1;
            $this->id_habilidad = $a2;
        }
           
        //METODES SET
        public function setId_Personaje($id_personaje) {
            $this->id_personaje = $id_personaje;
        }
        public function setId_Habilidad($id_habilidad) {
            $this->id_habilidad = $id_habilidad;
        }
        
        //METODES GET 
        public function getId_Personaje() {
            return $this->id_personaje;
        }
        public function getId_Habilidad() {
            return $this->id_habilidad;
        }
    }
?>