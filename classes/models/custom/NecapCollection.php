<?php

class NecapCollection extends BaseNecapCollection
{
	public static function getAll(){
		$peer_object = new Necap();
		return self::getCollection($peer_object, $peer_object->getSelectQuery() . " GROUP BY school_id LIMIT 100" );
	}
}

