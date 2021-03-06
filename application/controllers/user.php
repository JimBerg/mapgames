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
	
	$user = self::getUser();
	var_dump($user);

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
		$data[ 'activeView' ] = 'login';
      	$this->template->write_view( 'header', 'header', $data );
		$this->template->write_view( 'login', 'login', $data );
		$this->template->render();
   	}
   
   
	/*------------------------------------------------------------*
	* save 
	*------------------------------------------------------------*/
	public function saveData( )
	{
			
		$this->load->model( 'userModel' );	
		$this->userModel->setRadius();
		
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
	* get Profile
	*------------------------------------------------------------*/
	public function getProfile()
	{
		$this->load->model( 'userModel' );
			
		if( $_SESSION[ 'user'] ) {
				
			$data[ 'nav' ] = Utilities::setNavigation( 'login' );
//TODO get User!!			
			$id = 1;
			$this->state = "login";
			$email = $_SESSION[ 'user'];
			$data[ 'profile' ] = $this->userModel->getUserProfile( $email );
			$data[ 'visits' ] = $this->userModel->getUserVisits( $id );
			
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
	* get timeline of visited locations
	*------------------------------------------------------------*/
	public function getCheckIns()
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
	
	
	/*------------------------------------------------------------*
	* return user state login|logout
	*------------------------------------------------------------*/
	public static function getUser()
	{
		$this->load->model( 'userModel' );
		
		if( $_SESSION[ 'user'] ) {	
			$email = $_SESSION[ 'user'];
			$user = $this->userModel->getUserProfile( $email );
		}
		return $user;
	}
}












