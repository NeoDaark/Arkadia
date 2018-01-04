<!-- Home -- Header content box -->
<?php
require_once 'System/config.php';
if(FLAG == 0){
    header('location: install.php');
}
$title='Inicio';
$migas='#inicio|index.php';
include "Public/layouts/head.php";

?>

<style> </style>
<script>
	$title = "Arkadia Servers";
    $body = "Unete a nuestro discord! \n y a disfrutar :D \n \n Att: Arkadian";
    $icon = "arklogo.png";
    DesktopNotifyshow($title, $body, $icon);
</script>

<!-- Body content box -->
<div class="container-fluid">
	<div class="inner cover">
          <h1 class="cover-heading text-title c-yellow">Bienvenidos a Arkadia Servers</h1>
          <p class="lead c-white"> </p>
	</div>
	<div class="row">
		
	</div>
</div>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




