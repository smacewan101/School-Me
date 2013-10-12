<?php

class MainController extends Dinkly
{
	public function loadDefault()
	{
		return true;
	}

	public function loadMap()
	{
		$this->counties = CountyCollection::getAll();
		return true;
	}

	public function loadCounty($parameters)
	{
		if(!isset($parameters['id'])){
			return $this->loadModule('content', 'main', 'map', true, true);
		}
		//DinklyDataConfig::setActiveConnection('content');
		$this->county = new County();
		$this->county->init($parameters['id']);
		$name = str_replace(' ', '', $this->county->getName());
		$name = lcfirst($name);
		$this->pointsVariable = $name."Points";
		return true;
	}
}
