<?php
class RestApiTest extends RestApi{	
	public function get( $params = array() ){
		return array(
			'data'=> array(
				'id' => 1,
				'name' => 'test',
				'email' => 'test@gmail.com'
			)
		);
	}	
	public function post( $params = array() ){
		// @todo
	}
	
	public function put( $params = array() ){
		// @todo
	}
	
	public function patch( $params = array() ){
		// @todo
	}
	
	public function delete( $params = array() ){
		// @todo
	}
	
}