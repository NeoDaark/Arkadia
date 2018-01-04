<?php
    require_once __DIR__."/../config.php";
    class Regeneracion{
        /*Atributs*/
        private $id_constitucion;
        private $regeneracion_Diaria;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Regeneracion(`id_constitucion`, `regeneracion_Diaria`) "
                    . "VALUES ('$this->id_constitucion', '$this->regeneracion_Diaria')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Regeneracion where id_constitucion = $var";
            $db->query($sql);
            return $result;
        }
    
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Regeneracion";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_objeto = new Regeneracion($obj["id_constitucion"],$obj["regeneracion_Diaria"]);
                //var_dump($Partida);
                array_push($rtn, $partida_objeto);
            }
            $db->close();
            return $rtn;
        }
        public function viewRegeneracion($id){
            $db = new connexio();
            $sql = "SELECT * FROM Regeneracion where id_constitucion='$id'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_objeto = new Regeneracion($obj["id_constitucion"], $obj["regeneracion_Diaria"]);
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
            $this->id_constitucion = 0;
            $this->regeneracion_Diaria = 0;
        }
        
        function __construct2($a1, $a2){
            $this->id_constitucion = $a1;
            $this->regeneracion_Diaria = $a2;
        }
           
        //METODES SET
        public function setId_Constitucion($id_constitucion) {
            $this->id_constitucion = $id_constitucion;
        }
        public function setRegeneracion_Diaria($regeneracion_Diaria) {
            $this->regeneracion_Diaria = $regeneracion_Diaria;
        }
        
        //METODES GET 
        public function getId_Constitucion() {
            return $this->id_constitucion;
        }
        public function getRegeneracion_Diaria() {
            return $this->regeneracion_Diaria;
        }
    }
?>