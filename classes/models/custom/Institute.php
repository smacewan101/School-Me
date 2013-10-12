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
					'county' => $this->County,
					'name' => $this->Name,
					'school_id'=> $this->SchoolId,
					'lat' => $this->Lat,
					'lng' => $this->Lng
					);
	}
}

