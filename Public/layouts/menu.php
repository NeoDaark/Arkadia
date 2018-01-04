<?php
	function migasdepan($migas){
		$migasdepan = explode("#",$migas);
		$contmigas = count($migasdepan);
		echo '<ol class="breadcrumb bgm-lightblue z-depth-1-bottom">';
		for ($i = 1; $i < $contmigas; $i++){
			$pan = explode("|", $migasdepan[$i]);
			if ($i == 1){
				if(count($pan) == 2){
					echo '<li><a class ="c-white" href="'.$pan[1].'">'.$pan[0].'</a></li>';
				}else{
					echo '<li class="active c-white">'.$pan[0].'</li> ';
				}
			}else{
				if(count($pan) == 2){
					echo '<li><a class ="c-white" href="'.$pan[1].'">'.$pan[0].'</a></li>';
				}else{
					echo '<li class="active">'.$pan[0].'</li> ';
				}
			}
		}
                echo '</ol>';
                
	}
?>
<script>
    $( document ).ready(function() {
        $("#menu-trigger").click(function(e) {
            e.preventDefault();
            console.log('here');
            $(".ha-menu").toggleClass("toggled bgm-blue");
            $(".idplr").toggleClass("pull-right");
        });
    });
</script>
<header id="header" class="clearfix bgm-blue" >
    <ul class="header-inner">
        <li id="menu-trigger" class="visible-xs">
            <div class="line-wrap">
                <div class="line top"></div>
                <div class="line center"></div>
                <div class="line bottom"></div>
            </div>
        </li>
        <li class="logo hidden-xs">
            <a href="#">Arkadia</a>
        </li>
        <li class="pull-right">
            <ul class="top-menu">
                <?php      
						echo '  <li class="dropdown">
							<a data-toggle="dropdown" href="#">
								<i class="tm-icon zmdi zmdi-accounts-add"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-lg pull-right">
								<div class="listview">
									<div class="lv-header">
										Notifications
									</div>
									<div class="lv-body">
									</div>
								</div>
							</div>
						</li>';
                ?>
				
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#"><i class="tm-icon zmdi zmdi-more-vert"></i></a>
                    <ul class="dropdown-menu dm-icon pull-right">
                        <?php
						echo '  <li><a href="#"><i class="zmdi zmdi-lock-open"></i></i> Admin Panel</a></li>
								<li><a href="#"><i class="zmdi zmdi-settings"></i> Configuración</a></li>
								<li><a href="logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>
								<li role="separator" class="divider"></li>
								<li class="dropdown-header">Actions</li>';
                               
                        ?>
                        <li class="hidden-xs"><a data-action="fullscreen" href="#" ><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a></li>
                        <li><a data-action="clear-localstorage" href="#"><i class="zmdi zmdi-delete"></i> Clear Local Storage</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Top Search Content -->
    <div class="clearfix">
    </div>
    <!-- Top Menu Content -->
    <nav class="ha-menu">
        <ul>
            <?php
                echo '  <li class="waves-effect"><a href="index.php">Inicio</a></li>
                        <li class="waves-effect"><a href="servers.php">Servidores</a></li>
                        <li class="waves-effect"><a href="donations.php">Donaciones</a></li>
                        <li class="waves-effect"><a href="discord.php">Discord</a></li>
						<li class="waves-effect"><a href="points.php">Votanos</a></li>';
            ?>
            
            <?php
                if(!isset($_SESSION['user'])){
                    echo '  <li class="waves-effect pull-right idplr"><a href="login.php">Login</a></li>';
                }
                if(isset($_SESSION['user'])){
                    if (strpos($self,"admin/")){
                        echo '  <li class="waves-effect pull-right idplr"><a href="../settings/">Hola, '.$value['nickname'].'!</a></li>';
                    }else if (strpos($self,"settings/table")){
                        echo '  <li class="waves-effect pull-right idplr"><a href="../../settings/">Hola, '.$value['nickname'].'!</a></li>';
                    }else if (strpos($self,"settings/")){
                        echo '  <li class="waves-effect pull-right idplr active"><a href="../../settings/">Hola, '.$value['nickname'].'!</a></li>';
                    }else{
                        echo '  <li class="waves-effect pull-right idplr"><a href="settings/">Hola, '.$value['nickname'].'!</a></li>';
                    }
                    
                } 
            ?>
            
        </ul>
    </nav>
    
</header>
<?php
    if (strpos($self,"Arkadia/index.php")) {
        //none
    }else if (strpos($self,"Arkadia/login.php")) {
        //none
    }else{
        //imprimim migas de pan
        migasdepan($migas); 
    }

?>
<?php
    //Mostrar o ocultar la ajuda --> Programació, accesos directes, etc...
    $help = false;
    if($help){
        //var_dump($value);
        echo '  <div style="position: fixed; bottom: 10px; left: 10px; z-index: 1000; list-style: none;">
                <li class="dropdown dropup">
                    <a href="#" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Heelp Me!! <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a target="_blank" href="http://librosweb.es/libro/bootstrap_3/capitulo_2.html">Manual Bootstrap</a></li>
                        <li><a target="_blank" href="http://getbootstrap.com/getting-started/">Bootstrap Getting Started</a></li>
                        <li><a target="_blank" href="http://getbootstrap.com/css/">Bootstrap Css</a></li>
                        <li><a target="_blank" href="http://getbootstrap.com/components/">Bootstrap Components</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Otros</li>
                        <li><a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/"><i class="fa fa-flag" aria-hidden="true">&nbsp;</i>FontAwesome</a></li>
                        <li><a target="_blank" href="http://zavoloklom.github.io/material-design-iconic-font/icons.html"><i class="zmdi zmdi-menu">&nbsp;</i>Material Design Iconic Font
</a></li>
                        <li><a target="_blank" href="/phpmyadmin"><i class="fa fa-server" aria-hidden="true">&nbsp;</i>phpmyadmin</a></li>
                        <li><a target="_blank" href="/Arkadia/theme.php"><i class="fa fa-file-code-o" aria-hidden="true">&nbsp;</i>Theme</a></li>
                    </ul>
                </li>
                </div>';
    }
?>
<?php
	include "slider.php"; 
?>
    
            