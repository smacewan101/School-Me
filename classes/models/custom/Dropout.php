<?php

class Dropout extends BaseDropout
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
					'year' => $this->Year,
					'school_id' => $this->SchoolId,
					'nine_2_twelve' => $this->Nine2twelve,
					'seven_2_twelve' => $this->Seven2twelve
					);
	}
}

