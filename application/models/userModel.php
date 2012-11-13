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
	* get user profile
	*------------------------------------------------------------*/ 
	public function getUserProfile( $email ) 
	{
		$this->db->select( array( 'firstname', 'lastname', 'avatar', 'location_id', 'email', 'location.*' ) );
		$this->db->from( 'user' );
		$this->db->join( 'location', 'location.id = user.location_id' );

		$query = $this->db->get();

		if ( $query->num_rows > 0 ) {
        	 return $query->row();
      	}
      	return false;		
	}
	
	
	/*------------------------------------------------------------*
	* get all special markers => pois 
	* @param (int) $type, what kind of marker should be selected
	* 1 - Sehenswürdigkeiten
	* 2 - Parks, Gärten
	* 3 - Museen und Ausstellungen 
	*------------------------------------------------------------*/ 
	public function getPOIs( $type = null )
	{
		if( $type )	{
			$query = $this
	            ->db
	            ->where( 'type', $type )
	            ->where( 'poi', 1 )
	            ->get( 'location' );
	
			if ( $query->num_rows > 0 ) {
		         return $query->result();
		    }
	    } else {
	    	$query = $this
	            ->db
	            ->where( 'poi', 1 )
	            ->get( 'location' );
	
			if ( $query->num_rows > 0 ) {
		         return $query->result();
		    }
	    }
      	return false;
	}
	
	
	/*------------------------------------------------------------*
	*  helper function to set radius to each location
	*------------------------------------------------------------*/
	public function setRadius()
	{
		$pois =  $this->getPOIs();
		foreach( $pois as $poi ) {
			$data = Utilities::calcRadius( array( $poi->lat, $poi->lng ));
			
			$this->db->update( 'location', $data, array( 'id' => $poi->id ) );
		}
	}
	
}