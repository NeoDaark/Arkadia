<!-- Home -- Header content box -->
<?php
require_once 'System/config.php';
if(FLAG == 0){
    header('location: install.php');
}
$title='Donaciones';
$migas='#Inicio|index.php#Donaciones|donations.php';
include "Public/layouts/head.php";

?>

<style> </style>

<!-- Body content box -->
<div class="container-fluid">
	<div class="inner cover">
          <h1 class="cover-heading text-title c-white">Ayudanos a mantener nuestra comunidad!</h1>
          <p class="lead c-white"> </p>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12 text-center m-t-5">
		
		</div>
	</div>
</div>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




