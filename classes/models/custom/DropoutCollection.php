<?php

class DropoutCollection extends BaseDropoutCollection
{
	public static function getBySchool($sid){
		$peer_object = new Dropout();
		return self::getCollection($peer_object, $peer_object->getSelectQuery() . " WHERE school_id=\"$sid\"" );
	}

	public static function getYearsSupported(){
		$db = self::fetchDB();
		$Select = "SELECT DISTINCT year from dropout ORDER by year asc;";
		$stmt = $db->prepare($Select);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}	

	public static function getDropoutsByYear($year){
		$peer_object = new Dropout();
		return self::getCollection($peer_object, $peer_object->getSelectQuery() . " WHERE year=$year" );
	}
}

