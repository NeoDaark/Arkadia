<div id="slider">
    <img src="Public/img/rpgbg.jpg" />
	<script>
            $(document).ready(function(){
                var src = $("#slider img").eq(0).attr('src');
                $('html').css('backgroundImage','url('+src+')');

            });
	</script>
</div>