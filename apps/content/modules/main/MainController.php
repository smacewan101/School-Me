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
		if(!isset($parameters['name'])){
			return $this->loadModule('content', 'main', 'map', true, true);
		}
		//DinklyDataConfig::setActiveConnection('content');
		$this->county = new County();
		$this->county->init_by_name(str_replace("_", " ", $parameters['name']));
		return true;
	}
}
