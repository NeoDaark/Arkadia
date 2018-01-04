d<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php';
include "Public/layouts/head.php";?>
<script>
    $title = "test";
    $body = "test body";
    $icon = "favicon.ico";
    DesktopNotifyshow($title, $body, $icon);
    
    $(document).ready(function(){
    $('#mod1').click(function(){
        var user = {
            user : $('#inputUser').val(),
            pass : $('#inputPassword').val()
        };
        $.ajax({
            type: "POST",
            url: "System/Protocols/Usuari_Validate.php",
            data: user,
            success: function (response) {
                console.log(response);
                if(response == 'fail'){
                    $.notify({
                            // options
                            message: 'Invalid user or password.'
                    },{
                            // settings
                            type: 'default',
                            delay: 4000,
                            offset : {
                                    y: 100,
                                    x: 20
                            }
                    });
                }else if(response == 'succes'){
                    var url = $('#urlgo').val();
                    location.href=url;
                }
            }
        });
    });
    
});
</script>

<!-- Body box -->
<div class="container" >
        <div class="row">
            <div class="col-md-12 cinput">
                <h2 class="form-signin-heading">Inicia sesión en Animaster Online v2</h2>
            </div>
            <div class="col-md-12 cinput">
                <?php echo '<input type="hidden" value="'.$url.'" id="urlgo">'; ?>
                <label for="inputUser" class="sr-only">Usuario</label>
                <input type="text"  id="inputUser"  class="form-control" name="user" placeholder="Usuario" required autofocus>
            </div>
            <div class="col-md-12 cinput">
                <label for="inputPassword" class="sr-only">Contraseña</label>
                <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Contraseña" required>
            </div>
            <div class="col-md-12 cinput">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
            </div>
            <div class="col-md-12 cinput">
                <button class="btn btn-lg bgm-lightblue c-white btn-block" id="mod1" name="login">Login</button>
            </div>
            <div class="col-md-12" id="alertmsg"></div>
        </div>
</div> <!-- /container -->

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

