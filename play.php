<!-- Home -- Header content box -->
<?php
require_once 'System/config.php';
if(FLAG == 0){
    header('location: install.php');
}
$title='Play';
$migas='';
include "Public/layouts/head.php";

?>

<style> </style>

<!-- Body content box -->
<div class="container-fluid text-center">
	<div class="inner cover">
        <h1 class="cover-heading text-title c-white">Vota nuestros servidores!</h1>
    </div>
	<div class="row">
		<div class="col-md-12 col-xs-12 text-center m-t-10">
			<hr>
			<h3 class="c-white">[Es] Arkadia NoTurretLimit [Ex4 Gx4 Tx5]</h3>
			<script src="https://ark-servers.net/embed.js?id=120480&type=votes&size=normal"></script>
			<br>
			<hr>
		</div>
	</div>
</div>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




