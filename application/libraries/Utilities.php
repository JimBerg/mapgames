<?php 
Class Utilities
{
	public static function setNavigation( $page = 'logout' ) 
	{
		if( $page == 'logout' ) {
			return $data[ 'nav' ] = array( 
				array( 'name' => 'Entdecke!', 'url' => 'user/index' ),
				array( 'name' => 'Was überhaupt', 'url' => 'infopage/about'),
				array( 'name' => '...und wie funktioniert\'s', 'url' => 'infopage/how' )
			);	
		} else {
			return $data[ 'nav' ] = array( 
				array( 'name' => 'Map', 'url' => 'app/index' ),
				array( 'name' => 'Profil', 'url' => 'user/getProfile' ),
				array( 'name' => 'Check Ins', 'url' => 'user/getProfil' ),
				//array( 'name' => 'Logout', 'url' => 'user/logout' )
			);
		}
	}
	
	public static function setMarkerContent( $poi ) 
	{

	}
}
