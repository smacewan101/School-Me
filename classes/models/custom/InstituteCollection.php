<?php

class InstituteCollection extends BaseInstituteCollection
{
	public static function getSchoolInfo($sid){
		$query = "select i.id,i.county,i.school_id,c.year,enrollment,eventcomplete,longitcomplete,name,nine2twelve,seven2twelve from completion c inner join institute i on c.school_id=i.school_id inner join dropout d on d.school_id = i.school_id where i.school_id='$sid' order by school_id asc;";
		$db = self::fetchDB();
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}

