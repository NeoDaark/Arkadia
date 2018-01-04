<?php
    require_once __DIR__."/../config.php";
    class Categoria_HP{
        /*Atributs*/
        private $id_categoria;
        private $id_HP;
        private $coste;
        private $incr_nv;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Categoria_HP(`id_categoria`, `id_HP`, `coste`, `incr_nv`) "
                    . "VALUES ('$this->id_categoria', '$this->id_HP', '$this->coste', '$this->incr_nv')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Categoria_HP where id_categoria = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Categoria_HP";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $categoria = new Categoria_HP($obj["id_categoria"],$obj["id_HP"],$obj["coste"],$obj["incr_nv"]);
                array_push($rtn, $categoria);
            }
            $db->close();
            return $rtn;
        }
        public function viewHP1($id,$id_HP){
            $db = new connexio();
            $sql = "SELECT * FROM Categoria_HP where id_categoria='$id' and id_HP='$id_HP'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
            }else{
                return null;
            }
        }
        public function viewHP2($id,$id_HP){
            $db = new connexio();
            $sql = "SELECT * FROM Categoria_HP where id_categoria='$id' and id_HP='$id_HP'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
            }else{
                return null;
            }
        }
        public function viewHP3($id,$id_HP){
            $db = new connexio();
            $sql = "SELECT * FROM Categoria_HP where id_categoria='$id' and id_HP='$id_HP'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
            }else{
                return null;
            }
        }
        public function viewHP4($id,$id_HP){
            $db = new connexio();
            $sql = "SELECT coste FROM Categoria_HP where id_categoria='$id' and id_HP='$id_HP'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
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
            $this->id_HP = 0;
            $this->coste = 0;
            $this->incr_nv = 0;
        }
        
        function __construct3($a2, $a3, $a4){
            $this->id_categoria = "";
            $this->id_HP = $a2;
            $this->coste = $a3;
            $this->incr_nv = $a4;
        }
        function __construct4($a1, $a2, $a3, $a4){
            $this->id_categoria = $a1;
            $this->id_HP = $a2;
            $this->coste = $a3;
            $this->incr_nv = $a4;
        }
           
        //METODES SET
        public function setId_Categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }
        public function setId_HP($id_HP) {
            $this->id_HP = $id_HP;
        }
        public function setCoste($coste) {
            $this->coste = $coste;
        }
        public function setIncr_Nv($incr_nv) {
            $this->incr_nv = $incr_nv;
        }
        
        //METODES GET 
        public function getId_Categoria() {
            return $this->id_categoria;
        }
        public function getId_HP() {
            return $this->id_HP;
        }
        public function getCoste() {
            return $this->coste;
        }
        public function getIncr_Nv() {
            return $this->incr_nv;
        }
    }
?>