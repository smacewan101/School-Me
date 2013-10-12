<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=<?=MAPS_API_KEY?>&sensor=true">
</script>
<style type="text/css">
	html { height: 100% }
	body { height: 100%; margin: 0; padding: 0 }
	/*#map-canvas { height: 800px }
*/</style>

<!--collapse checkboxes	 -->
<script type="text/javascript">
$(document).ready(function() {
    $('#dropOuts').change(function() {
        $('#mycheckboxdiv').toggle();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
	$('#necaps').change(function() {
		$('#mycheckboxdiv1').toggle();
	});
});
</script>

<div class='container-fluid'>
	<div class='row-fluid'>
	<!--sidebar -->
	 <div class="span3">
          <div class="well sidebar-nav collapse-group">
            <ul class="nav nav-list">
              <li class="nav-header">Parameters</li>
              	<li><label class="checkbox"><input type="checkbox" name='dropOuts' id='dropOuts' value="">Dropouts by year</label></li>
              		<div id="mycheckboxdiv" style="display:none">
              			<div class='btn-group'>
              			
              			<select class='yearclick dropdown-menu btn dropdown-toggle'>  
              				<option>Select A Year</option>
              				<? foreach($dropout_years as $year):?>
              				<option value="<?=$year['year']?>" ><?=$year['year']?></option>
              			<? endforeach;?>

              			</select>

              			</div>
              		</div>

              <li><label class='checkbox'><input type='checkbox' name='necaps' id='necaps' value=''>Necap Scores</label></li>
              	<div id="mycheckboxdiv1" style="display:none">
              		<div class='btn-group'>
              			<a class='btn dropdown-toggle' data-toggle='dropdown' href="#">
              				Select Year
              				<span class='caret'></span>
              			</a>
              			<ul class='dropdown-menu'>

              			</ul>
              		</div>
              	</div>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
	 </div><!--/span-->

	<!--map-->
	<div class='span9'>
		<div class='map-content'>
		<div id="map-canvas">
		<script type="text/javascript" src="/js/counties.js"></script>
		<script type="text/javascript">

		var map;
		var infoWindow;

		function initialize() {
			var mapOptions = {
				center: new google.maps.LatLng(43.904448, -72.355957),
				zoom: 8,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

			// 	The following code generate a
			// 	GPolygon object
			// 	Named as dynRegionPolygon
			var points = [
				new google.maps.LatLng(45.00942, -73.35300),
				new google.maps.LatLng(44.94526, -73.33445),
				new google.maps.LatLng(44.78159, -73.33556),
				new google.maps.LatLng(44.70249, -73.35777),
				new google.maps.LatLng(44.64492, -73.37791),
				new google.maps.LatLng(44.57624, -73.36805),
				new google.maps.LatLng(44.49777, -73.30834),
				new google.maps.LatLng(44.44944, -73.29167),
				new google.maps.LatLng(44.24801, -73.32073),
				new google.maps.LatLng(44.20625, -73.37778),
				new google.maps.LatLng(44.07972, -73.42362),
				new google.maps.LatLng(43.97860, -73.41195),
				new google.maps.LatLng(43.87958, -73.37861),
				new google.maps.LatLng(43.78833, -73.36194),
				new google.maps.LatLng(43.74431, -73.36633),
				new google.maps.LatLng(43.63986, -73.42527),
				new google.maps.LatLng(43.59069, -73.42528),
				new google.maps.LatLng(43.59090, -73.37160),
				new google.maps.LatLng(43.62930, -73.32890),
				new google.maps.LatLng(43.54381, -73.24347),
				new google.maps.LatLng(43.46249, -73.24111),
				new google.maps.LatLng(42.92276, -73.26363),
				new google.maps.LatLng(42.84701, -73.26854),
				new google.maps.LatLng(42.75111, -73.25335),
				new google.maps.LatLng(42.72910, -72.46654),
				new google.maps.LatLng(42.78777, -72.51723),
				new google.maps.LatLng(42.82736, -72.54819),
				new google.maps.LatLng(42.87861, -72.55541),
				new google.maps.LatLng(42.96860, -72.52118),
				new google.maps.LatLng(43.00333, -72.46764),
				new google.maps.LatLng(43.14457, -72.45618),
				new google.maps.LatLng(43.25111, -72.43666),
				new google.maps.LatLng(43.30228, -72.40271),
				new google.maps.LatLng(43.44638, -72.39445),
				new google.maps.LatLng(43.57306, -72.38276),
				new google.maps.LatLng(43.69610, -72.31666),
				new google.maps.LatLng(43.73249, -72.28264),
				new google.maps.LatLng(43.77541, -72.21403),
				new google.maps.LatLng(43.82054, -72.19333),
				new google.maps.LatLng(43.88874, -72.17611),
				new google.maps.LatLng(43.98221, -72.10445),
				new google.maps.LatLng(44.10114, -72.04847),
				new google.maps.LatLng(44.28214, -72.04416),
				new google.maps.LatLng(44.32271, -72.01265),
				new google.maps.LatLng(44.34062, -71.96847),
				new google.maps.LatLng(44.34610, -71.92027),
				new google.maps.LatLng(44.38138, -71.81639),
				new google.maps.LatLng(44.43860, -71.68250),
				new google.maps.LatLng(44.51791, -71.59015),
				new google.maps.LatLng(44.58492, -71.55111),
				new google.maps.LatLng(44.64416, -71.57709),
				new google.maps.LatLng(44.75714, -71.63437),
				new google.maps.LatLng(44.81763, -71.57625),
				new google.maps.LatLng(44.92819, -71.50848),
				new google.maps.LatLng(44.98047, -71.53840),
				new google.maps.LatLng(45.02055, -71.49416),
				new google.maps.LatLng(45.01721, -72.51028),
				new google.maps.LatLng(45.02083, -72.77888),
				new google.maps.LatLng(45.00942, -73.35300)
			];


			<?
				foreach($counties as $county)
				{
					$name = lcfirst(str_replace(' ', '', $county->getName()));
					$html = 'var '.$name.'Polygon = new google.maps.Polygon({path: '.$name.'Points, strokeColor: "#000000",strokeOpacity: 1,strokeWeight: 1, fillOpacity: 0.1, county_name: "'.$county->getName().'", county_id: '.$county->getId().', marker_lat:'.strval($county->getLat()).', marker_lng:'.strval($county->getLng()).'});';
					echo $html;
					echo $name.'Polygon.setMap(map);';
					echo 'google.maps.event.addListener('.$name.'Polygon, "mousemove", solidOpacity);';
					echo 'google.maps.event.addListener('.$name.'Polygon, "mouseout", removeOpacity);';
					echo 'google.maps.event.addListener('.$name.'Polygon, "click", seeDetailView);';
				}

			?>

			infoWindow = new google.maps.InfoWindow();

			function solidOpacity(event)
			{
				this.setOptions({fillOpacity: 1});
				infoWindow.setContent(this.county_name+ " County");
				latLng = new google.maps.LatLng(this.marker_lat, this.marker_lng);
  				infoWindow.setPosition(latLng);
  				infoWindow.open(map);
			}

			function removeOpacity(event)
			{
				this.setOptions({fillOpacity: 0.1});
			}

			function seeDetailView(event)
			{
				//var name = this.county_id;
				//alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
				window.location = '/main/county/id/'+this.county_id;
			}
		}
		google.maps.event.addDomListener(window, 'load', initialize);

		$(document).ready(function(){
			$('.yearclick').click(function(){
				var year = $(this).val();
				
				$.ajax({
				  type: "GET",
				  url: '/api/api/dropout/byyear/'+year,
				  success: function(res){
				  	console.log(res);
				  	for (var i = res.length - 1; i >= 0; i--) {
				  		latlng = new google.maps.LatLng(res[i].lat,res[i].lng);
				  		
					  	littleWindow = new google.maps.InfoWindow();
					  	littleWindow.setContent(res[i].county +"<br/>9-12th grade Drop out rate: " + Math.floor(res[i].n2t*100) +"%<br/>"+"7-12 grade drop out rate: " + Math.floor(res[i].s2t*100)+"%");
					  	littleWindow.setPosition(latlng);
					  	littleWindow.open(map);
				  	};
				  }
				});
			});
		});
	</script>

		</div><!--map-canvas-->
		</div><!--map content -->
	</div><!--span9 -->
	</div><!-- row-fluid-->
</div><!-- container-->

