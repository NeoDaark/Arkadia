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
        <h1 class="cover-heading text-title c-white">Do not play alone! JOIN UP</h1>
        <p class="lead c-white m-t-5">Join the discord and find out about all the news and events as well as find other players or tribes</p>
		<a class="btn btn-lg btn-default bgm-lightblue c-white" href="#">Join now!</a>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12 text-center m-t-10">
			<!--  iframe discord -->
		</div>
	</div>
</div>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




