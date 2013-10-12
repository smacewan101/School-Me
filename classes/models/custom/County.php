<?php

class County extends BaseCounty
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
					'name' => $this->Name
					);
	}

	public function init_by_name($name)
	{
		$db = $this->fetchDB();
		$Select = $this->getSelectQuery() . " WHERE name = :name";
		$stmt = $db->prepare($Select);
		$stmt->bindParam(":name", $name, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($result)){
			$this->hydrate($result, true);
		}
	}
}

