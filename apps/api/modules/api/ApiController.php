<?php

/* A ready-to-go Restful API, useful for interaction with JS MVC frameworks */

class ApiController extends Dinkly 
{
	public function handleError($message)
	{
	    header('HTTP/1.1 500 Internal Server Error');
	    header('Content-Type: application/json');
	    die($message);
	}

	public function handleResponse($json)
	{
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo $json;
	}

	public function loadCounty($params)
	{
		$id = isset($params['id']) ? $params['id'] : NULL;
		if ( is_null($id) )
			unset($id);

		$request = json_decode(file_get_contents('php://input'));

		$response = null;
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				if ( isset($id) ) 
					{
						$county = new County();
						$county->init($id);
						$response = $county->to_json();
					} 
				else 
					{
						$collection = CountyCollection::getAll();
						if( count($collection) )
							$response = json_encode(array_map(function($c){return $c->to_array();}, $collection));
						else
							$response = "[]";
					}
				break;

			case 'POST':
				if ( isset( $request->name ) )
					{
						$county = new County();
						$county->setName( $request->name );
						if( $county->save() )
						{
							$response = $county->to_json();
						}
						else
							goto bad_request;
					}
				else
					goto bad_request;
				
				break;

			case 'PUT':
				if ( isset($id) ) 
				{
					if ( isset( $request->name ) )
						{
							$county = new County();
							$county->init($id);

							if( isset( $county->Id ) )
								{
									$county->setName( $request->name );
									if( $county->save() )
										$response = $county->to_json();
									else
										goto bad_request;
								}
							else
								goto not_found;
						}
					else
						goto bad_request;
				}
				else
					goto bad_request;
				break;

			case 'DELETE':
				if ( isset($id ) )
				{
					$county = new County();
					$county->init($id);
					if( isset( $county->Id ) )
						if ( $county->delete() )
							$response = $county->to_json();
						else
							goto bad_request;
					else
						goto not_found;
				}
				else
				{
					goto bad_request;
				}
				break;
		}

		$this->handleResponse($response);

		return false;

		bad_request:
			header('HTTP/1.1 400 Bad Request');
			$response = "{ \"error\" : \"Bad Request\" }";
			$this->handleResponse($response);
			return false;

		not_found:
			header('HTTP/1.1 404 Not Found');
			$response = "{ \"error\" : \"Could not find County\" }";
			$this->handleResponse($response);
			return false;
	}

	public function loadDistrict($params)
	{
		$id = isset($params['id']) ? $params['id'] : NULL;
		if ( is_null($id) )
			unset($id);

		$request = json_decode(file_get_contents('php://input'));

		$response = null;
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				if ( isset($id) ) 
					{
						$county = new District();
						$county->init($id);
						$response = $county->to_json();
					} 
				else 
					{
						$collection = DistrictCollection::getAll();
						if(count($collection) > 0)
							$response = json_encode(array_map(function($c){return $c->to_array();}, $collection));
						else
							$response = "[]";
					}
				break;

			case 'POST':
				if ( isset( $request->name ) )
					{
						$county = new District();
						$county->setName( $request->name );
						$county->setCounty( $request->county );
						$county->setCity( $request->city );
						if( $county->save() )
						{
							$response = $county->to_json();
						}
						else
							goto bad_request;
					}
				else
					goto bad_request;
				
				break;

			case 'PUT':
				if ( isset($id) ) 
				{
					if ( isset( $request->name ) )
						{
							$county = new District();
							$county->init($id);
							if( isset( $county->Id ) )
								{
									$county->setName( $request->name );
									$county->setCounty( $request->county );
									$county->setCity( $request->city );
									if( $county->save() )
										$response = $county->to_json();
									else
										goto bad_request;
								}
							else
								goto not_found;
						}
					else
						goto bad_request;
				}
				else
					goto bad_request;
				break;

			case 'DELETE':
				if ( isset($id ) )
				{
					$county = new District();
					$county->init($id);
					if( isset( $county->Id ) )
						if ( $county->delete() )
							$response = $county->to_json();
						else
							goto bad_request;
					else
						goto not_found;
				}
				else
				{
					goto bad_request;
				}
				break;
		}

		$this->handleResponse($response);

		return false;

		bad_request:
			header('HTTP/1.1 400 Bad Request');
			$response = "{ \"error\" : \"Bad Request\" }";
			$this->handleResponse($response);
			return false;

		not_found:
			header('HTTP/1.1 404 Not Found');
			$response = "{ \"error\" : \"Could not find District\" }";
			$this->handleResponse($response);
			return false;
	}

	public function loadTown($params)
	{
		$id = isset($params['id']) ? $params['id'] : NULL;
		if ( is_null($id) )
			unset($id);

		$request = json_decode(file_get_contents('php://input'));

		$response = null;
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				if ( isset($id) ) 
					{
						$county = new Town();
						$county->init($id);
						$response = $county->to_json();
					} 
				else 
					{
						$collection = TownCollection::getAll();
						if(count($collection) > 0)
							$response = json_encode(array_map(function($c){return $c->to_array();}, $collection));
						else
							$response = "[]";
					}
				break;

			case 'POST':
				if ( isset( $request->name ) )
					{
						$county = new Town();
						$county->setName( $request->name );
						$county->setCounty( $request->county );
						$county->setCity( $request->city );
						if( $county->save() )
						{
							$response = $county->to_json();
						}
						else
							goto bad_request;
					}
				else
					goto bad_request;
				
				break;

			case 'PUT':
				if ( isset($id) ) 
				{
					if ( isset( $request->name ) )
						{
							$county = new Town();
							$county->init($id);
							if( isset( $county->Id ) )
								{
									$county->setName( $request->name );
									$county->setCounty( $request->county );
									$county->setCity( $request->city );
									if( $county->save() )
										$response = $county->to_json();
									else
										goto bad_request;
								}
							else
								goto not_found;
						}
					else
						goto bad_request;
				}
				else
					goto bad_request;
				break;

			case 'DELETE':
				if ( isset($id ) )
				{
					$county = new Town();
					$county->init($id);
					if( isset( $county->Id ) )
						if ( $county->delete() )
							$response = $county->to_json();
						else
							goto bad_request;
					else
						goto not_found;
				}
				else
				{
					goto bad_request;
				}
				break;
		}

		$this->handleResponse($response);

		return false;

		bad_request:
			header('HTTP/1.1 400 Bad Request');
			$response = "{ \"error\" : \"Bad Request\" }";
			$this->handleResponse($response);
			return false;

		not_found:
			header('HTTP/1.1 404 Not Found');
			$response = "{ \"error\" : \"Could not find Town\" }";
			$this->handleResponse($response);
			return false;
	}

	public function loadNecap($params)
	{
		$id = isset($params['id']) ? $params['id'] : NULL;
		if ( is_null($id) )
			unset($id);


		$request = json_decode(file_get_contents('php://input'));

		$response = null;
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				if ( isset($id) ) 
					{
						$county = new Necap();
						$county->init($id);
						$response = $county->to_json();
					} 
				else 
					{
						$collection = NecapCollection::getAll();
						if(count($collection) > 0)
							$response = json_encode(array_map(function($c){return $c->to_array();}, $collection));
						else
							$response = "[]";
					}
				break;

			case 'POST':
				if ( isset( $request->name ) )
					{
						$county = new Necap();
						$county->setName( $request->name );
						$county->setCounty( $request->county );
						$county->setCity( $request->city );
						if( $county->save() )
						{
							$response = $county->to_json();
						}
						else
							goto bad_request;
					}
				else
					goto bad_request;
				
				break;

			case 'PUT':
				if ( isset($id) ) 
				{
					if ( isset( $request->name ) )
						{
							$county = new Necap();
							$county->init($id);
							if( isset( $county->Id ) )
								{
									$county->setName( $request->name );
									$county->setCounty( $request->county );
									$county->setCity( $request->city );
									if( $county->save() )
										$response = $county->to_json();
									else
										goto bad_request;
								}
							else
								goto not_found;
						}
					else
						goto bad_request;
				}
				else
					goto bad_request;
				break;

			case 'DELETE':
				if ( isset($id ) )
				{
					$county = new Necap();
					$county->init($id);
					if( isset( $county->Id ) )
						if ( $county->delete() )
							$response = $county->to_json();
						else
							goto bad_request;
					else
						goto not_found;
				}
				else
				{
					goto bad_request;
				}
				break;
		}

		$this->handleResponse($response);

		return false;

		bad_request:
			header('HTTP/1.1 400 Bad Request');
			$response = "{ \"error\" : \"Bad Request\" }";
			$this->handleResponse($response);
			return false;

		not_found:
			header('HTTP/1.1 404 Not Found');
			$response = "{ \"error\" : \"Could not find Necap\" }";
			$this->handleResponse($response);
			return false;
	}

	public function loadInstitute($params)
	{
		$id = isset($params['id']) ? $params['id'] : NULL;
		if ( is_null($id) )
			unset($id);

		$sid = isset($params['school_id']) ? $params['school_id'] : NULL;
		if( is_null($sid) )
			unset($sid);

		$request = json_decode(file_get_contents('php://input'));

		$response = null;
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				if ( isset($id) ) 
					{
						$county = new Institute();
						$county->init($id);
						$response = $county->to_json();
					} 
				else if ( isset($sid) )
					{
						$collection = InstituteCollection::getSchoolInfo($sid);
						if(count($collection) > 0)
							$response = json_encode($collection);
						else
							$response = "[]";	
					}
				else 
					{
						$collection = InstituteCollection::getAll();
						if(count($collection) > 0)
							$response = json_encode(array_map(function($c){return $c->to_array();}, $collection));
						else
							$response = "[]";
					}
				break;

			case 'POST':
				if ( isset( $request->name ) )
					{
						$county = new Institute();
						$county->setName( $request->name );
						$county->setSchoolId( $request->school_id );
						$county->setCounty( $request->county );
						if( $county->save() )
						{
							$response = $county->to_json();
						}
						else
							goto bad_request;
					}
				else
					goto bad_request;
				
				break;

			case 'PUT':
				if ( isset($id) ) 
				{
					if ( isset( $request->name ) )
						{
							$county = new Institute();
							$county->init($id);

							if( isset( $county->Id ) )
								{
									$county->setName( $request->name );
									$county->setSchoolId( $request->school_id );
									$county->setCounty( $request->county );
									if( $county->save() )
										$response = $county->to_json();
									else
										goto bad_request;
								}
							else
								goto not_found;
						}
					else
						goto bad_request;
				}
				else
					goto bad_request;
				break;

			case 'DELETE':
				if ( isset($id ) )
				{
					$county = new Institute();
					$county->init($id);
					if( isset( $county->Id ) )
						if ( $county->delete() )
							$response = $county->to_json();
						else
							goto bad_request;
					else
						goto not_found;
				}
				else
				{
					goto bad_request;
				}
				break;
		}

		$this->handleResponse($response);

		return false;

		bad_request:
			header('HTTP/1.1 400 Bad Request');
			$response = "{ \"error\" : \"Bad Request\" }";
			$this->handleResponse($response);
			return false;

		not_found:
			header('HTTP/1.1 404 Not Found');
			$response = "{ \"error\" : \"Could not find Institute\" }";
			$this->handleResponse($response);
			return false;
	}

	public function loadDropout($params)
	{
		$id = isset($params['id']) ? $params['id'] : NULL;
		if ( is_null($id) )
			unset($id);

		$sid = isset($params['school_id']) ? $params['school_id'] : NULL;
		if ( is_null($sid) )
			unset($sid);

		$years = isset($params['year']) ? $params['year'] : NULL;
		if( is_null($years))
			unset($years);

		$byyear = isset($params['byyear']) ? $params['byyear'] : NULL;
		if( is_null($byyear) )
			unset($byyear);

		$request = json_decode(file_get_contents('php://input'));

		$response = null;
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				if ( isset($id) ) 
					{
						$county = new Dropout();
						$county->init($id);
						$response = $county->to_json();
					} 
				else if( isset($sid) )
					{
						$collection =DropoutCollection::getBySchool($sid);
						if(count($collection) > 0)
							$response = json_encode(array_map(function($c){return $c->to_array();}, $collection));
						else
							$response = "[]";
					}
				else if ( isset($years) )
					{
						$collection = DropoutCollection::getYearsSupported();
						if(count($collection) > 0)
							$response = json_encode(array_map(function($c){return $c['year'];},$collection));
						else
							$response = "[]";
					}
				else if ( isset($byyear) )
					{
						$collection = DropoutCollection::getDropoutsByYear($byyear);
						if(count($collection) > 0)
							$response = json_encode($collection);
						else
							$response = "[]";		
					}
				else
					{
						$collection = DropoutCollection::getAll();
						if(count($collection) > 0)
							$response = json_encode(array_map(function($c){return $c->to_array();}, $collection));
						else
							$response = "[]";	
					
					}
				break;

			case 'POST':
				if ( isset( $request->school_id ) )
					{
						$county = new Dropout();
						$county->setSchoolId( $request->school_id );
						$county->setYear( $request->year );
						$county->setNine2Twelve( $request->nine2twelve );
						$county->setSeven2Twelve( $request->seven2twelve );
						if( $county->save() )
						{
							$response = $county->to_json();
						}
						else
							goto bad_request;
					}
				else
					goto bad_request;
				
				break;

			case 'PUT':
				if ( isset($id) ) 
				{
					if ( isset( $request->school_id ) )
						{
							$county = new Dropout();
							$county->init($id);

							if( isset( $county->Id ) )
								{
									$county->setSchoolId( $request->school_id );
									$county->setYear( $request->year );
									$county->setNine2Twelve( $request->nine2twelve );
									$county->setSeven2Twelve( $request->seven2twelve );
									if( $county->save() )
										$response = $county->to_json();
									else
										goto bad_request;
								}
							else
								goto not_found;
						}
					else
						goto bad_request;
				}
				else
					goto bad_request;
				break;

			case 'DELETE':
				if ( isset($id ) )
				{
					$county = new Dropout();
					$county->init($id);
					if( isset( $county->Id ) )
						if ( $county->delete() )
							$response = $county->to_json();
						else
							goto bad_request;
					else
						goto not_found;
				}
				else
				{
					goto bad_request;
				}
				break;
		}

		$this->handleResponse($response);

		return false;

		bad_request:
			header('HTTP/1.1 400 Bad Request');
			$response = "{ \"error\" : \"Bad Request\" }";
			$this->handleResponse($response);
			return false;

		not_found:
			header('HTTP/1.1 404 Not Found');
			$response = "{ \"error\" : \"Could not find Dropout\" }";
			$this->handleResponse($response);
			return false;
	}

	public function loadCompletion($params)
	{
		$id = isset($params['id']) ? $params['id'] : NULL;
		if ( is_null($id) )
			unset($id);
		
		$sid = isset($params['school_id']) ? $params['school_id'] : NULL;
		if ( is_null($sid) )
			unset($sid);

		
		$request = json_decode(file_get_contents('php://input'));

		$response = null;
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				if ( isset($id) ) 
					{
						$county = new Completion();
						$county->init($id);
						$response = $county->to_json();
					} 
				else 
					{
						if( isset($sid) ){
							$collection = CompletionCollection::getBySchool($sid);
							if(count($collection) > 0)
								$response = json_encode(array_map(function($c){return $c->to_array();}, $collection));
							else
								$response = "[]";
						}else{
							$collection = CompletionCollection::getAll();
							if(count($collection) > 0)
								$response = json_encode(array_map(function($c){return $c->to_array();}, $collection));
							else
								$response = "[]";
						}
					}
				break;

			case 'POST':
				if ( isset( $request->school_id ) )
					{
						$county = new Completion();
						$county->setSchoolId( $request->school_id );
						$county->setYear( $request->year );
						$county->setNine2Twelve( $request->nine2twelve );
						$county->setSeven2Twelve( $request->seven2twelve );
						if( $county->save() )
						{
							$response = $county->to_json();
						}
						else
							goto bad_request;
					}
				else
					goto bad_request;
				
				break;

			case 'PUT':
				if ( isset($id) ) 
				{
					if ( isset( $request->school_id ) )
						{
							$county = new Completion();
							$county->init($id);

							if( isset( $county->Id ) )
								{
									$county->setSchoolId( $request->school_id );
									$county->setYear( $request->year );
									$county->setNine2Twelve( $request->nine2twelve );
									$county->setSeven2Twelve( $request->seven2twelve );
									if( $county->save() )
										$response = $county->to_json();
									else
										goto bad_request;
								}
							else
								goto not_found;
						}
					else
						goto bad_request;
				}
				else
					goto bad_request;
				break;

			case 'DELETE':
				if ( isset($id ) )
				{
					$county = new Completion();
					$county->init($id);
					if( isset( $county->Id ) )
						if ( $county->delete() )
							$response = $county->to_json();
						else
							goto bad_request;
					else
						goto not_found;
				}
				else
				{
					goto bad_request;
				}
				break;
		}

		$this->handleResponse($response);

		return false;

		bad_request:
			header('HTTP/1.1 400 Bad Request');
			$response = "{ \"error\" : \"Bad Request\" }";
			$this->handleResponse($response);
			return false;

		not_found:
			header('HTTP/1.1 404 Not Found');
			$response = "{ \"error\" : \"Could not find Completion\" }";
			$this->handleResponse($response);
			return false;
	}




	public function loadDefault()
	{	
		$request = json_decode(file_get_contents('php://input'));

		$response = null;
		
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				$response = 'GET received!';
				break;

			case 'POST':
				$response = 'POST received!';
				break;

			case 'PUT':
				$response = 'PUT received!';
				break;

			case 'DELETE':
				$response = 'DELETE received!';
				break;
		}

		$this->handleResponse($response);

		return false;
	}
}
