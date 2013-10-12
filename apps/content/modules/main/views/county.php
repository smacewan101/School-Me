<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=<?=MAPS_API_KEY?>&sensor=true">
</script>
<style type="text/css">
	html { height: 100% }
	body { height: 100%; margin: 0; padding: 0 }
	/*#map-canvas { height: 800px }
*/</style>
<div class='container-fluid'>
	<div class='row-fluid'>
		<div class='span9'>
			<div class='map-content'>
				<div id="map-canvas">
				<script type="text/javascript">
				var map;
				var infoWindow;

				function initialize() {
					var mapOptions = {
						center: new google.maps.LatLng(43.904448, -72.355957),
						zoom: 9,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
				}
				google.maps.event.addDomListener(window, 'load', initialize);
				</script>
				</div><!--map-canvas-->
			</div><!--map content -->
		</div><!--span9 -->
	</div><!-- row-fluid-->
</div><!-- container-->
