<?php

class Institute extends BaseInstitute
{
	public function to_json()
	{
		return json_encode
			(
				$this->to_array()
			);
	}

	public function to_array(){
		return array(
					'id' => $this->Id,
					'school_id' => $this->SchoolId,
					'name' => $this->Name,
					'district_id'=> $this->DistrictId
					);
	}
}

