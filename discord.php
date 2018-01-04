<!-- Home -- Header content box -->
<?php
require_once 'System/config.php';
if(FLAG == 0){
    header('location: install.php');
}
$title='Discord';
$migas='#Inicio|index.php#Discord|index.php';
include "Public/layouts/head.php";

?>

<style> </style>
<!-- Body content box -->
<div class="container-fluid text-center">
	<div class="inner cover">
        <h1 class="cover-heading text-title c-white">Nuestro discord, Nuestra comunidad!</h1>
        <p class="lead c-white m-t-5">Únete al discord y entérate de todas las noticias de los servidores así como encontrar a otros jugadores o tribus</p>
		<a class="btn btn-lg btn-default bgm-lightblue c-white" href="https://discord.gg/9MrxJzA">Unete ya!</a>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12 text-center m-t-10">
			<iframe src="https://discordapp.com/widget?id=396795436733562881&theme=dark" width="800" height="600" allowtransparency="true" frameborder="0"></iframe>
			
		</div>
	</div>
</div>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




