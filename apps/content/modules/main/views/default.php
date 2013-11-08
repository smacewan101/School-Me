
<header class="jumbotron subhead" id='overview'>
 
    <h1>
      <?php echo Dinkly::getConfigValue('app_name'); ?>
    </h1>
    <p class='lead'>
      <?php echo Dinkly::getConfigValue('app_description'); ?>
    </p>
 
</header>

<div class='main-form'>
	<div class='row-fliud'>
		<div class='span3 offset4'>
			<form>
				<fieldset>
					<legend>Legend</legend>
					<label>Select Filter</label>
					<select>
						<option>County</option>
						<option>County0</option>
						<option>County1</option>
					</select>
					<select>
						<option>School</option>
						<option>School1</option>
					</select>
				</fieldset>
				<a href="/content/map" class='btn' type='button'>Go!</a>
			</form>
		</div>
		<marquee  behavior=scroll direction=right><img width="40" height="40" src="/img/bus.jpg" /></marquee>
	</div>
</div>

