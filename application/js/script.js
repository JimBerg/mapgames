(function( $ ){

	/* ------------------------------------------------------------*
	* create some objects
	* ------------------------------------------------------------*/
	var cg_game = {};
	var cg_geolocation = {};
	var cg_map = {};
	
	
	/* ------------------------------------------------------------*
	* fetch some dom elements || caching
	* ------------------------------------------------------------*/
	
	
	
	/* ------------------------------------------------------------*
	* and now let's add some functions
	* ------------------------------------------------------------*/
	cg_game.init = function() {
		
		// check if there's already a location in local storage
		// else check if geoloction is supported and set local storage
		if ( window.localStorage.getItem( 'cg-location' ) ) {
		
		} else {
		 	if ( navigator.geolocation ) {
		    	navigator.geolocation.getCurrentPosition( cg_geolocation.onsuccess, cg_geolocation.onerror, { enableHighAccuracy: true } );
		    } else {
		        //$(".map").text("Your browser is out of fashion, there\'s no geolocation!");
		    }	
		}
	}	
	
	cg_geolocation.onsuccess = function( position ) {
		var lat = position.coords.latitude;
    	var lng = position.coords.longitude;
    	
    	/* save to db */
    	$( 'input#position' ).attr( { 'data-lat': lat, 'data-lng': lng } );

	}
	
	cg_geolocation.onerror = function( error ) {
		
	}
		
	cg_geolocation.observer = function() {
		
	}
	
	$( '#getLocation' ).on( 'click', function( e ) {
		e.preventDefault();
		alert( 'wir brauchen deine location' );
		cg_game.init();
	});
	
 	var map = L.map( 'map' ).setView(  [ '46', '12'] , 12 );
 	L.tileLayer("http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png", { maxZoom: 22, detectRetina: true } ).addTo(map);
  
	
})( jQuery );