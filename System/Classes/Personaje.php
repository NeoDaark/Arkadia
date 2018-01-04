<?php
    require_once __DIR__."/../config.php";
    class Personaje{
        /*Atributs*/
        private $id_personaje;
        private $id_usuario;
        private $id_partida;
        private $id_categoria;
        private $nombre;
        private $apellido;
        private $edad;
        private $nivel;
        private $turno;
        private $puntos_vida;
        private $sexo;
        private $raza;
        private $pelo;
        private $ojos;
        private $altura;
        private $peso;
        private $apariencia;
        private $tamanyo;
        private $exp_actual;
        private $c_AGI;
        private $c_CON;
        private $c_DES;
        private $c_FUE;
        private $c_INT;
        private $c_PER;
        private $c_POD;
        private $c_VOL;
        private $nacionalidad;
        private $imagen;
        private $humano;
        private $puntos_hs;
        private $puntos_hp;
        private $puntos_totales;
        private $ha;
        private $hp;
        private $he;
        private $la;
        private $danyo;
        private $TA;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Personaje(`id_usuario`, `id_partida`, `id_categoria`, `nombre`, `apellido`, `edad`, `nivel`, `turno`, `puntos_vida`, `sexo`, `raza`, `pelo`, `ojos`, `altura`, `peso`, `apariencia`, `tamanyo`, `exp_actual`, `c_AGI`, `c_CON`, `c_DES`, `c_FUE`, `c_INT`, `c_PER`, `c_POD`, `c_VOL`, `nacionalidad`, `imagen`, `humano`, `puntos_hs`, `puntos_hp`, `puntos_totales`, `ha`, `hp`, `he`, `la`, `danyo`, `TA`) "
                    . "VALUES ('$this->id_usuario', '$this->id_partida', '$this->id_categoria', '$this->nombre', '$this->apellido', '$this->edad', '$this->nivel', '$this->turno', '$this->puntos_vida', '$this->sexo', '$this->raza', '$this->pelo', '$this->ojos', '$this->altura', '$this->peso', '$this->apariencia', '$this->tamanyo', '$this->exp_actual', '$this->c_AGI', '$this->c_CON', '$this->c_DES', '$this->c_FUE', '$this->c_INT', '$this->c_PER', '$this->c_POD', '$this->c_VOL', '$this->nacionalidad', '$this->imagen', '$this->humano', '$this->puntos_hs', '$this->puntos_hp', '$this->puntos_totales', '$this->ha', '$this->hp', '$this->he', '$this->la', '$this->danyo', '$this->TA')");
            
            $id = $db->insert_id;
            $db->close();
            return $id;
        }
        
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje where id_personaje = $var";
            $db->query($sql);
            return $result;
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Per = new Personaje($obj["id_usuario"]);
                array_push($rtn, $Per);
                //var_dump($Per);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewPersonaje($id_personaje){ 
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_personaje = '$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
            }else{
                return null;
            }
        }
        
        public function viewPersonajeValor($id_personaje){ 
            $db = new connexio();
            $sql = "SELECT `acrobacias`, `atletismo`, `montar`, `nadar`, `trepar`, `saltar`, `frialdad`, `proezas_fuerza` as `p. fuerza`, `resistir_dolor` as 'res. dolor', `advertir`, `buscar`, `rastrear`, `animales`, `ciencia`, `herbolaria`, `historia`, `medicina`, `memorizar`, `navegacion`, `ocultismo`, `tasacion`, `ley`, `tactica`, `estilo`, `intimidar`, `liderazgo`, `persuasion`, `comerciar`, `callejeo`, `etiqueta`, `cerrajeria`, `disfraz`, `ocultarse`, `robo`, `sigilo`, `tramperia`, `venenos`, `arte`, `baile`, `forja`, `trucos_manos` as 't. manos', `canto`, `runas`, `animismo`, `alquimia`, `especial1`, `especial2`, `especial3`, `especial4` FROM `personaje` WHERE `id_personaje`='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
            }else{
                return null;
            }
        }
        public function viewPersonajeUsuario($id_usuario, $id_partida){ 
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_usuario='$id_usuario' and id_partida='$id_partida'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
            }else{
                return null;
            }
        }
        
        public function viewPersonajesPartida($id){ 
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_partida = '$id'";
            $query = $db->query($sql);
            $count = 0;
            $datos = array();
            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $count++;
                    array_push($datos, $row);
                }
            } else {
                $count = 0;
            }
            $db->close();
            if($count >= 1){
                //var_dump($datos);
                return $datos;
            }else{
                return null;
            }
        }
        public function updateExpe($experiencia_Nova,$id_personaje){
            $db = new connexio();
            
            $sqlget = "SELECT exp_actual FROM Personaje WHERE id_personaje = '$id_personaje'";
            $query = $db->query($sqlget);
            $experiencia_Actual = $query->fetch_assoc();
            
            $experiencia_Final = 0;
            $experiencia_Final = $experiencia_Actual['exp_actual'] + (int)$experiencia_Nova;
            
            $sqlmod = "UPDATE Personaje SET exp_actual='$experiencia_Final' WHERE id_personaje = '$id_personaje'";
            
            $result = $db->query($sqlmod);
            
            $db->close();
            return $result;
        }
        public function updatePersonaje($level_Nou, $experiencia_Nova,$id_personaje){
            $db = new connexio();
            
            $sqlmod = "UPDATE Personaje SET nivel='$level_Nou', exp_actual='$experiencia_Nova' WHERE id_personaje = '$id_personaje'";
            
            $result = $db->query($sqlmod);
            
            $db->close();
            return $result;
        }
        public function modDanyoTA($id_personaje, $danyo,$TA){
            $db = new connexio();
            
            $sqlmod = "UPDATE Personaje SET danyo='$danyo', TA='$TA' WHERE id_personaje = '$id_personaje'";
            
            $result = $db->query($sqlmod);
            
            $db->close();
            return $result;
        }
        public function modPer($id_personaje, $puntos_hp,$puntos_hs,$puntos_queden,$ha,$hp,$he,$le){
            $db = new connexio();
            
            $sqlmod = "UPDATE Personaje SET puntos_hs='$puntos_hs', puntos_hp='$puntos_hp', puntos_totales='$puntos_queden', ha='$ha', hp='$hp', he='$he', la='$le' WHERE id_personaje = '$id_personaje'";
            
            $result = $db->query($sqlmod);
            
            $db->close();
            return $result;
        }
        public function viewPNJ($id_master, $id_partida){ 
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_partida IS NULL or id_usuario = '$id_master' and id_partida = '$id_partida'";
            $query = $db->query($sql);
            $datos = array();
            $db->close();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()) {
                    if (empty($obj["nivel"])){
                        $obj["nivel"] = 0;
                    }
                    $Personaje = new Personaje($obj["id_personaje"],$obj["id_usuario"],$obj["id_partida"],$obj["id_categoria"],$obj["nombre"],$obj["nivel"]);
                    //var_dump($Usuario);
                    array_push($datos, $Personaje);
                }
                return $datos;
            } else {
                var_dump(null);
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
            $this->id_personaje=0;
            $this->id_usuario = 0;
            $this->id_partida=0;
            $this->id_categoria = 0;
            $this->nombre = 0;
            $this->apellido = 0;
            $this->edad = 0;
            $this->nivel = 0;
            $this->turno = 0; 
            $this->puntos_vida = 0; 
            $this->sexo = 0; 
            $this->raza = 0; 
            $this->pelo = 0; 
            $this->ojos = 0; 
            $this->altura = 0; 
            $this->peso = 0; 
            $this->apariencia = 0; 
            $this->tamanyo = 0; 
            $this->exp_actual = 0; 
            $this->c_AGI = 0; 
            $this->c_CON = 0; 
            $this->c_DES = 0; 
            $this->c_FUE = 0; 
            $this->c_INT = 0; 
            $this->c_PER = 0;
            $this->c_POD = 0;
            $this->c_VOL = 0; 
            $this->nacionalidad = 0; 
            $this->imagen = 0; 
            $this->humano = 0; 
            $this->puntos_hs = 0; 
            $this->puntos_hp = 0; 
            $this->puntos_totales = 0; 
            $this->ha = 0; 
            $this->hp = 0; 
            $this->he = 0; 
            $this->la = 0; 
            $this->danyo = 0; 
            $this->TA = 0; 
        }
        function __construct1($a5){
            $this->id_personaje=0;
            $this->nombre = $a5;
        }
        
        function __construct6($a1, $a2, $a3, $a4, $a5, $a6){
            $this->id_personaje=$a1;
            $this->id_usuario = $a2;
            $this->id_partida=$a3;
            $this->id_categoria = $a4;
            $this->nombre = $a5;
            $this->nivel = $a6;
        }
        
        function __construct9($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10){
            $this->id_personaje=0;
            $this->id_usuario = $a2;
            $this->id_partida=$a3;
            $this->id_categoria = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->edad = $a7;
            $this->nivel = $a8;
            $this->turno = $a9; 
            $this->puntos_vida = $a10;
        }
        function __construct38($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23, $a24, $a25, $a26, $a27, $a28, $a29, $a30, $a31, $a32, $a33, $a34, $a35, $a36, $a37, $a38, $a39){
            
            $this->id_personaje=0;
            $this->id_usuario = $a2;
            $this->id_partida=$a3;
            $this->id_categoria = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->edad = $a7;
            $this->nivel = $a8;
            $this->turno = $a9; 
            $this->puntos_vida = $a10; 
            $this->sexo = $a11; 
            $this->raza = $a12; 
            $this->pelo = $a13; 
            $this->ojos = $a14; 
            $this->altura = $a15; 
            $this->peso = $a16; 
            $this->apariencia = $a17; 
            $this->tamanyo = $a18; 
            $this->exp_actual = $a19; 
            $this->c_AGI = $a20; 
            $this->c_CON = $a21; 
            $this->c_DES = $a22; 
            $this->c_FUE = $a23; 
            $this->c_INT = $a24; 
            $this->c_PER = $a25;
            $this->c_POD = $a26;
            $this->c_VOL = $a27; 
            $this->nacionalidad = $a28; 
            $this->imagen = $a29; 
            $this->humano = $a30; 
            $this->puntos_hs = $a31; 
            $this->puntos_hp = $a32; 
            $this->puntos_totales = $a33; 
            $this->ha = $a34; 
            $this->hp = $a35; 
            $this->he = $a36; 
            $this->la = $a37; 
            $this->danyo = $a38; 
            $this->TA = $a39; 
        }
        
        
        
        function __construct39($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23, $a24, $a25, $a26, $a27, $a28, $a29, $a30, $a31, $a32, $a33, $a34, $a35, $a36, $a37, $a38, $a39){
            $this->id_personaje=$a1;
            $this->id_usuario = $a2;
            $this->id_partida=$a3;
            $this->id_categoria = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->edad = $a7;
            $this->nivel = $a8;
            $this->turno = $a9; 
            $this->puntos_vida = $a10; 
            $this->sexo = $a11; 
            $this->raza = $a12; 
            $this->pelo = $a13; 
            $this->ojos = $a14; 
            $this->altura = $a15; 
            $this->peso = $a16; 
            $this->apariencia = $a17; 
            $this->tamanyo = $a18; 
            $this->exp_actual = $a19; 
            $this->c_AGI = $a20; 
            $this->c_CON = $a21; 
            $this->c_DES = $a22; 
            $this->c_FUE = $a23; 
            $this->c_INT = $a24; 
            $this->c_PER = $a25;
            $this->c_POD = $a26;
            $this->c_VOL = $a27; 
            $this->nacionalidad = $a28; 
            $this->imagen = $a29; 
            $this->humano = $a30; 
            $this->puntos_hs = $a31; 
            $this->puntos_hp = $a32; 
            $this->puntos_totales = $a33; 
            $this->ha = $a34; 
            $this->hp = $a35; 
            $this->he = $a36; 
            $this->la = $a37; 
            $this->danyo = $a38; 
            $this->TA = $a39; 
        }
           
        //METODES SET
        public function setId_Personaje($id_personaje) {
            $this->id_personaje = $id_personaje;
        }
        public function setId_Partida($id_partida) {
            $this->id_partida = $id_partida;
        }
        public function setId_Usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
        public function setId_Categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setEdad($edad) {
            $this->edad = $edad;
        }
        public function setNivel($nivel) {
            $this->nivel = $nivel;
        }
        public function setTurno($turno) {
            $this->turno = $turno;
        }
        public function setPuntos_Vida($puntos_vida) {
            $this->puntos_vida = $puntos_vida;
        }
        public function setSexo($sexo) {
            $this->sexo = $sexo;
        }
        public function setRaza($raza) {
            $this->raza = $raza;
        }
        public function setPelo($pelo) {
            $this->pelo = $pelo;
        }
        public function setOjos($ojos) {
            $this->ojos = $ojos;
        }
        public function setAltura($altura) {
            $this->altura = $altura;
        }
        public function setPeso($peso) {
            $this->peso = $peso;
        }
        public function setApariencia($apariencia) {
            $this->apariencia = $apariencia;
        }
        public function setTamanyo($tamanyo) {
            $this->tamanyo = $tamanyo;
        }
        public function setExp_Actual($exp_actual) {
            $this->exp_actual = $exp_actual;
        }
        public function setC_AGI($c_AGI) {
            $this->c_AGI = $c_AGI;
        }
        public function setC_CON($c_CON) {
            $this->c_CON = $c_CON;
        }
        public function setC_DES($c_DES) {
            $this->c_DES = $c_DES;
        }
        public function setC_FUE($c_FUE) {
            $this->c_FUE = $c_FUE;
        }
        public function setC_INT($c_INT) {
            $this->c_INT = $c_INT;
        }
        public function setC_PER($c_PER) {
            $this->c_PER = $c_PER;
        }
        public function setC_POD($c_POD) {
            $this->c_POD = $c_POD;
        }
        public function setC_VOl($c_VOl) {
            $this->c_VOL = $c_VOl;
        }
        public function setNacionalidad($nacionalidad) {
            $this->nacionalidad = $nacionalidad;
        }
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
        public function setHumano($humano) {
            $this->humano = $humano;
        }
        public function setPuntos_hs($puntos_hs) {
            $this->puntos_hs = $puntos_hs;
        }
        public function setPuntos_hp($puntos_hp) {
            $this->puntos_hp = $puntos_hp;
        }
        public function setPuntos_Totales($puntos_totales) {
            $this->puntos_totales = $puntos_totales;
        }
        public function setHa($ha) {
            $this->ha = $ha;
        }
        public function setHp($hp) {
            $this->hp = $hp;
        }
        public function setHe($he) {
            $this->he = $he;
        }
        public function setLa($la) {
            $this->la = $la;
        }
        public function setDanyo($danyo) {
            $this->danyo = $danyo;
        }
        public function setTa($TA) {
            $this->TA = $TA;
        }
        
        //METODES GET 
        public function getId_Personaje() {
            return $this->id_personaje;
        }
        public function getId_Usuario() {
            return $this->id_usuario;
        }
        public function getId_Partida() {
            return $this->id_partida;
        }
        public function getId_Categoria() {
            return $this->id_categoria;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getEdad() {
            return $this->edad;
        }
        public function getNivel() {
            return $this->nivel;
        }
        public function getTurno() {
            return $this->turno;
        }
        public function getPuntos_Vida() {
            return $this->puntos_vida;
        }
        public function getSexo() {
            return $this->sexo;
        }
        public function getRaza() {
            return $this->raza;
        }
        public function getPelo() {
            return $this->pelo;
        }
        public function getOjos() {
            return $this->ojos;
        }
        public function getAltura() {
            return $this->altura;
        }
        public function getPeso() {
            return $this->peso;
        }
        public function getApariencia() {
            return $this->apariencia;
        }
        public function getTamanyo() {
            return $this->tamanyo;
        }
        public function getExp_Actual() {
            return $this->exp_actual;
        }
        public function getC_AGI() {
            return $this->c_AGI;
        }
        public function getC_CON() {
            return $this->c_CON;
        }
        public function getC_DES() {
            return $this->c_DES;
        }
        public function getC_FUE() {
            return $this->c_FUE;
        }
        public function getC_INT() {
            return $this->c_INT;
        }
        public function getC_PER() {
            return $this->c_PER;
        }
        public function getC_POD() {
            return $this->c_POD;
        }
        public function getC_VOL() {
            return $this->c_VOL;
        }
        public function getNacionalidad() {
            return $this->nacionalidad;
        }
        public function getImagen() {
            return $this->imagen;
        }
        public function getHumano() {
            return $this->humano;
        }
        public function getPuntos_Hs() {
            return $this->puntos_hs;
        }
        public function getPuntos_Hp() {
            return $this->puntos_hp;
        }
        public function getPuntos_Totales() {
            return $this->puntos_totales;
        }
        public function getHa() {
            return $this->ha;
        }
        public function getHp() {
            return $this->hp;
        }
        public function getHe() {
            return $this->he;
        }
        public function getLa() {
            return $this->la;
        }
        public function getDanyo() {
            return $this->danyo;
        }
        public function getTA() {
            return $this->TA;
        }
    }
?>
