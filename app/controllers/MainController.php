<?php
use Symfony\Component\Security\Core\User\User;
class MainController extends BaseController {
	protected $industries;
	protected $functions;
	protected $locations;
	
	public function __construct() {
		$this->industries = Industry::get ();
		$this->functions = Func::get ();
		$this->locations = Location::get ();		
	}
	
	public function index() {
		return View::make ( 'main' )->with ( [ 
				'industries' => $this->industries,
				'functions' => $this->functions,
				'locations' => $this->locations,
		] );
	}
	
}
