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
				array( 'name' => 'Check Ins', 'url' => 'user/getCheckIns' ),
				//array( 'name' => 'Logout', 'url' => 'user/logout' )
			);
		}
	}
	
	public static function setMarkerContent( $poi ) 
	{

	}
	
	public static function calcRadius( $point = array( 0, 0 ), $r = 0.15 )
	{
		$lat1 = $point[0];
		$lon1 = $point[1];
		
		$d = 0.00015;
        $r = 6.371;
		
		$latN = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(0))));
        $latS = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(180))));
        $lonE = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(90)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
        $lonW = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(270)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
	
		return array( 'lat_north' => $latN, 'lat_south' => $latS, 'lng_east' => $lonE, 'lng_west' => $lonW );
	}
}
