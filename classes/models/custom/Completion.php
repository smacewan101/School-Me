<?php

class Completion extends BaseCompletion
{
	public function to_json()
	{
		return json_encode
			(
				$this->to_array()
			);
	}

	public function to_array()
	{
		return array(
					'id' => $this->Id,
						'school_id' =>  $this->SchoolId,
        				'year' =>  $this->Year,
        				'enrollment' =>  $this->Enrollment,
        				'eventcomplete' =>  $this->Eventcomplete,
        				'longitcomplete' => $this->Longitcomplete
					);
	}

	public static function avgCountyCompletion($county)
	{
		$query = "select avg(c.enrollment) as avgEnroll, avg(eventcomplete) as avgComp, year, county  from completion c inner join institute i on i.school_id = c.school_id where i.county = '$county' group by year;"	;
		$db = self::fetchDB();
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}

