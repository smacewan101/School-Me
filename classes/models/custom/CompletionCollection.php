<?php

class CompletionCollection extends BaseCompletionCollection
{
	public static function getBySchool($sid){
		$peer_object = new Completion();
		return self::getCollection($peer_object, $peer_object->getSelectQuery() . " WHERE school_id=\"$sid\"" );
	}
}

