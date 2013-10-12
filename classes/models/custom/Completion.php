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
}

