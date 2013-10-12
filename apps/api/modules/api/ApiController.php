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
						$county->setCountyId( $request->county_id );
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
									$county->setCountyId( $request->county_id );
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
