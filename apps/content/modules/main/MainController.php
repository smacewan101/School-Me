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
		error_log($parameters['name']);
		$this->county = new County();
		$this->county->init_by_name(str_replace("_", " ", $parameters['name']));
		error_log(print_r($this->county,true));
		$name = str_replace(' ', '', $this->county->getName());
		$name = lcfirst($name);
		$this->pointsVariable = $name."Points";
		return true;
	}
}
