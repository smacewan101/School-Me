<div class="hero-unit">
  <div>
    <h1>
      <?php echo Dinkly::getConfigValue('app_name'); ?>
    </h1>
    <p>
      <?php echo Dinkly::getConfigValue('app_description'); ?>
    </p>
  </div>
</div>

<div class='main-form'>
	<div class='row-fliud'>
		<div class='span4'>
			<form>
				<fieldset>
					<legend>Legend</legend>
					<label>Select Filter</label>
					<select>
						<option>Counties</option>
						<option>County0</option>
						<option>County1</option>
					</select>
					<select>
						<option>Schools</option>
						<option>School1</option>
					</select>
				</fieldset>
			</form>
		</div>
	</div>
</div>