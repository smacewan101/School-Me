<?php

class CompletionCollection extends BaseCompletionCollection
{
	public static function getCompletionBySchool($sid){
		$peer_object = new Institute();
		return self::getCollection($peer_object, $peer_object->getSelectQuery() . " WHERE school_id=\"$sid\"" );
	}
}

