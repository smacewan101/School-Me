<?php

class MainController extends Dinkly
{
	public function loadDefault()
	{
		return true;
	}

	public function loadMap()
	{
		error_log("here");
		return true;
	}
}
