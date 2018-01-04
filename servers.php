<!-- Home -- Header content box -->
<?php
require_once 'System/config.php';
if(FLAG == 0){
    header('location: install.php');
}
$title='Servidores';
$migas='#Inicio|index.php#Servidores|servers.php';
include "Public/layouts/head.php";

?>

<style> </style>

<!-- Body content box -->
<div class="container-fluid text-center">
	<div class="inner cover">
        <h1 class="cover-heading text-title c-white">Nuestros Servidores!</h1>
    </div>
	<div class="row">
		<div class="col-md-12 col-xs-12 text-center m-t-10">
			<hr>
			<a href="https://ark-servers.net/server/120480/"><img src="https://ark-servers.net/server/120480/banners/banner-2.png" border="0"></a>
			<br>
			<a class="btn btn-lg btn-default bgm-bluegray c-white m-t-5" href="steam://connect/91.121.103.92:27015">Conéctate</a>
			<a class="btn btn-lg btn-default bgm-deeporange c-white m-t-5" href="https://ark-servers.net/server/120480/vote/">vótanos</a>
			<hr>
		</div>
	</div>
</div>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




