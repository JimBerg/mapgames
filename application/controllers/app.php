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
		$data[ 'nav' ] = array( 
			array( 'name' => 'LoginNav!', 'url' => '' ),
			array( 'name' => 'LoginNav', 'url' => ''),
			array( 'name' => 'Profil', 'url' => 'user/getProfile' ),
			array( 'name' => 'logout', 'url' => 'user/logout' )
		);
		
		$this->state = $state;
		$this->template->write_view( 'header', 'header', $data );
		$this->template->write_view( 'login', 'map', $data );
		$this->template->render();
	}
}