(function( $ ){
	
	var user = {};
	user.location = {}
		user.location2 = {}
	if ( window.localStorage.getItem( 'location-lat' ) ) {
			user.location = { 
				'lat': window.localStorage.getItem( 'location-lat' ),
				'lng': window.localStorage.getItem( 'location-lng' )
			}
			//console.log( this.location );
			user.location2 = { 
				'lat': window.localStorage.getItem( 'location-lat-3' ),
				'lng': window.localStorage.getItem( 'location-lng-3' )
			}
			console.log( user.location2  );
		}
	
	user.reinit = function() {
		
		if ( window.localStorage.getItem( 'location-lat' ) ) {
			this.location = { 
				'lat': window.localStorage.getItem( 'location-lat' ),
				'lng': window.localStorage.getItem( 'location-lng' )
			}
			
			
			//console.log( this.location );
		} else {		
		    if ( navigator.geolocation ) {
		    	navigator.geolocation.getCurrentPosition( geoSuccess, geoError, { enableHighAccuracy: true } );
		    } else {
		        //$(".map").text("Your browser is out of fashion, there\'s no geolocation!");
		    }
		}
	}
	
		    
    function geoSuccess( position ) {
    	var lat = position.coords.latitude;
    	var lng = position.coords.longitude;
    	var latlong = { 'data-lat': lat, 'data-lng': lng };
    	
    	localStorage.setItem( 'location-lat-3', lat );
    	localStorage.setItem( 'location-lng-3', lng );
    	console.log(lng);
    	//$( 'input#position' ).attr( { 'data-lat': lat, 'data-lng': lng } );
    }
 
	function geoError(err) {
	    if (err.code == 1) {
	        error('The user denied the request for location information.')
	    } else if (err.code == 2) {
	        error('Your location information is unavailable.')
	    } else if (err.code == 3) {
	        error('The request to get your location timed out.')
	    } else {
	        error('An unknown error occurred while requesting your location.')
	    }
	}
	
	
	$( '#set-data' ).on( 'click', function() {
		navigator.geolocation.watchPosition( geoSuccess, geoError, { enableHighAccuracy: true } );
		//user.reinit();
	});
		
	

  
 
  
    var map = L.map('map').setView(  [ user.location.lat, user.location.lng] , 16);
   /* var center = new L.LatLng( 38.9, -77.1 );
	var zoom = 11;
​	map.​setView( center, zoom, true );​*/
 
        // leaflet API key tiler
    L.tileLayer("http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png", { maxZoom: 22, detectRetina: true }).addTo(map);
      // set map bounds
    //map.fitWorld();
    
    
      // mark user's position
    var userMarker = L.marker( [ user.location.lat, user.location.lng] );
 	var userMarker2 = L.marker( [ user.location2.lat, user.location2.lng] );
    
    userMarker.addTo(map);
    userMarker2.addTo(map);
    userMarker.bindPopup("<p>Startposition!</p>").openPopup();
		
		
		
		
		$( userMarker2 ).on( 'click', function() {
			//addTask();
			// solveTask();
		});
		
		
		
		
		
		
		
		
		
})( jQuery );















	
	
	
	$( '#getLocation' ).on( 'click', function( e ) {
		e.preventDefault();
		alert( 'wir brauchen deine location' );
		var test = cg_game.init();
		console.log(test);
	});
	
	
	if( mapcontainer != null ||  mapcontainer != undefined ) {
		
 		cg_map.map = L.map( 'map' ).setView(  [ cg_user.home.lat, cg_user.home.lng ] , 12 );
 		L.tileLayer("http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png", { maxZoom: 22, detectRetina: true } ).addTo( cg_map.map );	
	}
  