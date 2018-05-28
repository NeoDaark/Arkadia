<!-- Home -- Header content box -->
<?php
require_once 'System/config.php';
if(FLAG == 0){
    header('location: install.php');
}
$title='Info';
$migas='#Info|servers.php';
include "Public/layouts/head.php";

?>

<style> </style>

<!-- Body content box -->
<div class="container-fluid text-center">
    
</div>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




