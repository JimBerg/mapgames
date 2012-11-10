<?php

class UserModel extends CI_Model {
		
	/*------------------------------------------------------------*
	* insert records for new user
	*------------------------------------------------------------*/
	public function createUser( $dataUser, $dataLocation )
	{
		$this->db->insert( 'location', $dataLocation );
		$dataUser[ 'location_id' ] = $this->db->insert_id();
		
		$this->db->insert( 'user', $dataUser );
		return;
	}
	
	/*------------------------------------------------------------*
	* verify user on login
	*------------------------------------------------------------*/ 
	public function verifyUser( $email, $password )
    {
      $query = $this
            ->db
            ->where( 'email', $email )
            ->where( 'password', $password )
            ->limit( 1 )
            ->get( 'user' );

      if ( $query->num_rows > 0 ) {
         return $query->row();
      }
      return false;
   	}
	
		
	/*------------------------------------------------------------*
	* verify user on login
	*------------------------------------------------------------*/ 
	public function getUserProfile( $email ) 
	{
		$query = $this
            ->db
            ->select( array( 'firstname', 'lastname', 'userPic', 'location_id', 'email' ) )
            ->where( 'email', $email )
			->limit( 1 )
            ->get( 'user' );
		if ( $query->num_rows > 0 ) {
        	 return $query->row();
      	}
      	return false;
	}
}