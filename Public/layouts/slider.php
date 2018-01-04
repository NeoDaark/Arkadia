<div id="slider">
	<script>
		$(document).ready(function(){
			var i = 0;
			var url = "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=4f1fedac31268a2c910db3d61a90e5dd&user_id=158434614%40N07&format=json&nojsoncallback=1";
			$.getJSON(url, function(data){
				var html = "";
				$.each(data.photos.photo, function(i, photo){
					//console.log(photo);
					img_url = "http://farm" + photo.farm + ".static.flickr.com/" + photo.server + "/" + photo.id + "_" + photo.secret + "_" + "b.jpg";
					html += "<img src="+img_url+"/>";
				});
				$("#slider").html(html);
				cambiarSlider();
				var control = setInterval(cambiarSlider, 8000);
			});
			function cambiarSlider(){
				i++;
				if(i == $("#slider img").size()){
						i = 0;
				}
				var src = $("#slider img").eq(i).attr('src');
				$('html').css('backgroundImage','url('+src+')');
				$('html').css('transition','background-image 0.8s ease-in-out');
			}
		});
	</script>
</div>