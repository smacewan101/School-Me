<?php

class District extends BaseDistrict
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
					'county' => $this->County,
					'city' => $this->City
					);
	}
}

