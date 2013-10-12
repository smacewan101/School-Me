<?php

class DropoutCollection extends BaseDropoutCollection
{
	public static function getBySchool($sid){
		$peer_object = new Dropout();
		return self::getCollection($peer_object, $peer_object->getSelectQuery() . " WHERE school_id=\"$sid\"" );
	}
}

