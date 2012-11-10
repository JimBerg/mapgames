<?php
class App extends CI_Controller {

	public $state;
	public function __construct() 
	{
		session_start();
		parent::__construct();	
		
		if ( !isset( $_SESSION[ 'user' ] ) ) {
         	redirect( 'user' );
      	}
	}

	public function index( $state = 'login' ) 
	{
		$this->state = $state;
		$data[ 'nav' ] = Utilities::setNavigation( 'login' );
		
		$this->template->write_view( 'header', 'header', $data );
		$this->template->write_view( 'login', 'map', $data );
		$this->template->render();
	}
	
	public function getPOIs( $type = null ) 
	{
		$this->load->model( 'userModel' );
		$pois = $this->userModel->getPOIs( $type );
		echo json_encode( $pois );
	}
}