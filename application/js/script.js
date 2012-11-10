(function( $ ){

	/* ------------------------------------------------------------*
	* create some objects
	* ------------------------------------------------------------*/
	var cg_game = {};
	var cg_geolocation = {};
	var cg_map = {};
	var cg_user = {};
	
	
	/* ------------------------------------------------------------*
	* fetch some dom elements || caching
	* ------------------------------------------------------------*/
	var mapcontainer = document.getElementById( 'map' );
		
	
	/* ------------------------------------------------------------*
	* and now let's add some functions
	* 
	* 1. check if there's already a location in local storage
	* 2. else check if geoloction is supported and set local storage
	* ------------------------------------------------------------*/
	cg_game.init = function() {
		
		if ( window.localStorage.getItem( 'location-home-lat' ) ) {
			cg_user.home = { 
				'lat': window.localStorage.getItem( 'location-home-lat' ),
				'lng': window.localStorage.getItem( 'location-home-lng' )
			}
		} else {
		 	if ( navigator.geolocation ) {
		    	navigator.geolocation.getCurrentPosition( cg_geolocation.onsuccess, cg_geolocation.onerror, { enableHighAccuracy: true } );
		    } else {
		        $( '#map' ).text( "Your browser is out of fashion, there\'s no geolocation!" );
		    }	
		}
	}	
	
	
	/* ------------------------------------------------------------*
	* try to get position, set local storage items for starting p.
	* set hidden values to save location tob db
	* ------------------------------------------------------------*/
	cg_geolocation.onsuccess = function( position ) {
		var lat = position.coords.latitude;
    	var lng = position.coords.longitude;
    	
    	localStorage.setItem( 'location-home-lat', lat );
    	localStorage.setItem( 'location-home-lng', lng );
    	    	
    	$( 'input#position-lat' ).val( lat );
    	$( 'input#position-lng' ).val( lng );
	}
	
	cg_geolocation.onerror = function( error ) {
		
	}
		
	cg_geolocation.observer = function() {
		
	}
	
	
	/* ------------------------------------------------------------*
	* initialize map
	* ------------------------------------------------------------*/
	cg_map.init = function() {
		//var markerLayer = L.layerGroup([ L.marker( [ cg_user.home.lat, cg_user.home.lng ] )]);
	
		cg_map.map = L.map('map', {
		    center: new L.LatLng( cg_user.home.lat, cg_user.home.lng ),
		    zoom: 14,
		    layers: []
		});
 		L.tileLayer("http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png", { minZoom: 12, maxZoom: 18, detectRetina: true } ).addTo( cg_map.map );	
 		cg_map.setMarker();
	}
	
	cg_map.setMarker = function() {
		cg_map.homeMarker = L.marker( [ cg_user.home.lat, cg_user.home.lng ] );
		cg_map.homeMarker.addTo( cg_map.map );
    	cg_map.homeMarker.bindPopup( "<p>Startposition!</p>" ); //.openPopup();
	}
	
	
	$( '#getLocation' ).on( 'click', function( e ) {
		e.preventDefault();
		alert( 'wir brauchen deine location' );
		var test = cg_game.init();
		console.log(test);
	});
	cg_game.init();
	
	
	
	
	
	
	
	
	
	if( mapcontainer != null && mapcontainer != undefined ) { 
		cg_map.init();
	}
	
	
	/*$( 'a.poi' ).each( function( index, element ) {
		$( this ).on( 'click', function( e ) {
			var marker = new Array();
			var url = $( this ).attr( 'href' );
			
			$.ajax({
			  	url: url,
			  	success: function ( response ) {
			  		var data =  $.parseJSON( response );
			  		for( var i = 0; i < data.length; i++ ) {
			  			marker[i] = L.marker( [ data[i].lat, data[i].lng ] );
			  			//marker[i].addTo( cg_map.map );
			  			marker[i].bindPopup( "<p>"+data[i].name+"</p>" );
			  		}
			  		var markerLayer = L.layerGroup( marker );
			  		var overlay = { 'POIs': markerLayer };
					L.control.layers( overlay ).addTo( cg_map.map );
			  	},
			});
			e.preventDefault();
		});
	});*/
	
})( jQuery );




















