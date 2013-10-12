<?php

class School extends BaseSchool
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
					'name' => $this->Name,
					'school_id' => $this->SchoolId,
					'district_id' => $this->DistrictId
					);
	}
}

