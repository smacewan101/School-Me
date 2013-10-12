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
				</div><!--map-canvas-->
			</div><!--map content -->
		</div><!--span9 -->
	</div><!-- row-fluid-->
</div><!-- container-->
<script type="text/javascript" src="/js/counties.js"></script>
<script type="text/javascript">
var map;
var infoWindow;

function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(<?=$county->getLat();?>, <?=$county->getLng();?>),
		zoom: 10,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	console.log(<?=$pointsVariable;?>);
	var polyGraph = new google.maps.Polygon({
		path: <?=$pointsVariable;?>,
		strokeColor: '#000000',
		strokeOpacity: 1,
		strokeWeight: 1,
		fillOpacity: .25,
		fillColor: '#3D41FF'
	});

	polyGraph.setMap(map);
	google.maps.event.addListener(polyGraph, 'click', seeDetailView);
	function seeDetailView(event)
	{
		var name = this.county_name;
		alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
		//window.location = '/main/county/name/'+name;
	}

}
google.maps.event.addDomListener(window, 'load', initialize);
</script>