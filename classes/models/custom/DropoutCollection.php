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
		$query = "select c.lat,c.lng,year, AVG(nine2twelve) as n2t, AVG(seven2twelve) as s2t, i.name, i.county from dropout d inner join institute i on i.school_id = d.school_id inner join county c on c.name = i.county where year=$year group by i.county,year";
		$db = self::fetchDB();
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}

