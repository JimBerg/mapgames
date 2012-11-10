<?php
class Infopage extends CI_Controller {
	public $state = 'logout';
	
	public function __construct() 
	{
		parent::__construct();	
	}
	
	
	/*------------------------------------------------------------*
	* default action 
	*------------------------------------------------------------*/
	public function index() 
	{
		
	}

	public function about() 
	{
		$data[ 'nav' ] = Utilities::setNavigation();
		$this->template->write_view( 'header', 'header', $data );
		$this->template->write_view( 'login', 'about' );
		$this->template->render();
	}
	
	public function how() 
	{
		$data[ 'nav' ] = Utilities::setNavigation();
		$this->template->write_view( 'header', 'header', $data );
		$this->template->write_view( 'login', 'how' );
		$this->template->render();
	}
}