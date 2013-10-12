<?php

class MainController extends Dinkly
{
	public function loadDefault()
	{
		return true;
	}

	public function loadMap()
	{
		return true;
	}

	public function loadCounty($parameters)
	{
		if(!isset($parameters['id'])){
			return $this->loadModule('content', , 'main', 'map', true, true);
		}

		return true;
	}
}
