<?php
class User extends CI_Controller {

	public $state = "logout";
	public function __construct() 
	{
		session_start();
		parent::__construct();	
	}
	
	
	/*------------------------------------------------------------*
	* default action 
	*------------------------------------------------------------*/
	public function index( $view = 'login' ) 
	{
		$data[ 'nav' ] = Utilities::setNavigation();
		$data[ 'activeView' ] = $view;

		$this->template->write_view( 'header', 'header', $data );
		$this->template->write_view( 'login', $view );
		$this->template->render();
	}
	
	
	/*------------------------------------------------------------*
	* process login data
	*------------------------------------------------------------*/
	public function login()
	{
		$data[ 'nav' ] = Utilities::setNavigation();
			
		if ( isset( $_SESSION[ 'user' ] ) ) {
         	redirect( 'app/index/login' );
      	}
		
		$this->load->library( 'form_validation' );
		//$this->form_validation->set_rules( 'firstname', "Bitte gib deinen Namen an." ,'required' );	
		$this->form_validation->set_rules( 'email', "Sorry, die Email brauchen wir." ,'required' );	
		
		if( $this->form_validation->run() !== false ) {
			$this->load->model( 'userModel' );
         		$result = $this
                  ->userModel
                  ->verifyUser(
                     $this->input->post( 'email' ), 
                     $this->input->post( 'password' )
                  );
			if ( $result !== false ) {
            	$_SESSION[ 'user' ] = $this->input->post( 'email' );
				$this->state = "login";
            	redirect( 'app/index/login' );
         	}
		}

		$this->template->write_view( 'header', 'header', $data );
		$this->template->write_view( 'login', 'login' );
		$this->template->render();	
	}
	
	/*------------------------------------------------------------*
	* logout
	*------------------------------------------------------------*/
   	public function logout()
   	{
      	session_destroy();
		$data[ 'nav' ] = Utilities::setNavigation();
      	$this->template->write_view( 'header', 'header', $data );
		$this->template->write_view( 'login', 'login' );
		$this->template->render();
   	}
   
	/*------------------------------------------------------------*
	* save 
	*------------------------------------------------------------*/
	public function saveData( )
	{
		
	}


	/*------------------------------------------------------------*
	* register new user
	*------------------------------------------------------------*/
	public function register()
	{
		$this->load->model( 'userModel' );
	
		$dataUser = array(
			'firstname' => $this->input->post( 'firstname' ),
			'email' 	=> $this->input->post( 'email' ),
			'password' 	=> $this->input->post( 'password' ),
		);
		
		$dataLocation = array(
			'lat' 	=> $this->input->post( 'position-lat' ),
			'lng' 	=> $this->input->post( 'position-lng' ),
			'name' 	=> 'Somewhere',
		);
//TODO: if no error
		$this->userModel->createUser( $dataUser, $dataLocation );
		
		$_SESSION[ 'user' ] = $this->input->post( 'email' );
		$this->state = "login";
		redirect( 'app/index/login' );
	}
	
	
	/*------------------------------------------------------------*
	* register new user
	*------------------------------------------------------------*/
	public function getProfile()
	{
		$this->load->model( 'userModel' );
			
		if( $_SESSION[ 'user'] ) {
				
			$data[ 'nav' ] = Utilities::setNavigation( 'login' );
			
			$this->state = "login";
			$email = $_SESSION[ 'user'];
			$data[ 'profile' ] = $this->userModel->getUserProfile( $email );
			
			$this->template->write_view( 'header', 'header', $data );
			$this->template->write_view( 'login', 'profile', $data );
			$this->template->render();
		} else {
			$this->state = "logout";
			$data[ 'nav' ] = Utilities::setNavigation();
			$this->template->write_view( 'header', 'header', $data );
			$this->template->write_view( 'login', 'login' );
			$this->template->render();
		}
	}
	
	/*------------------------------------------------------------*
	* return user state login|logout
	*------------------------------------------------------------*/
	public static function getState()
	{
		$state = $this->state;
		return $state;
	}
}












