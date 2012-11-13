/* ------------------------------------------------------------*
* 
* extend custom layer styles for leaflet
* 
* ------------------------------------------------------------*/

console.log(cg_map.map);
/* ------------------------------------------------------------*
* toggle infobar containing (...)
* ------------------------------------------------------------*/
function markerControlPanelToggle() {
	var that = this;
	
	if( $( that ).hasClass( 'open' ) ) {
		$( that ).removeClass( 'open' );
		$( that ).addClass( 'close' );
		//$( that ).html( "<span id='icon-plus'>+</span>" );
	} else {
		$( that ).removeClass( 'close' );
		$( that ).addClass( 'open' );
		//$( that ).html( "<span id='icon-plus'>-</span>" );
	}
};


/* ------------------------------------------------------------*
* get marker and set marker layer 
* ------------------------------------------------------------*/
function getMarker( /*markerType*/ ) {
	var marker = [];
 	var marker_1 = $.ajax({ 
 		url: 'http://lokal.horst/websites/mapgames/index.php/app/getPOIs/1', 
 		async: false
 	}); 
 	
 	var data =  $.parseJSON( marker_1.responseText );
	var markerSet = '<ul>';
	console.log(data);
	for( var i = 0; i < data.length; i++ ) {
		//marker[i] = L.marker( [ data[i].lat, data[i].lng ] );
		//marker[i].bindPopup( "<p>"+data[i].name+"</p>" );
		markerSet += '<li>'+data[i].name+'</li>';	
	}
	markerSet += '</ul>';
 	
 	return markerSet;
	//var markerLayer_1 = L.layerGroup( marker );
	
	
	
	
	
	
		var marker_2 = $.ajax({ 
 		url: 'http://lokal.horst/websites/mapgames/index.php/app/getPOIs/3', 
 		async: false
 	}); 
 	
 	var data2 =  $.parseJSON( marker_2.responseText );
	
	for( var i = 0; i < data2.length; i++ ) {
		marker[i] = L.marker( [ data2[i].lat, data[i].lng ] );
		marker[i].bindPopup( "<p>"+data2[i].name+"</p>" );
	}
 	
	var markerLayer_2 = L.layerGroup( marker );
	
	
	
 //var markerLayer_2 = L.layerGroup( marker );
 //var markerLayer_3 = L.layerGroup( marker );

	var overlay = { 
		'Home': markerLayer_home,
		'POIs': markerLayer_1,
		'Parks': markerLayer_2
	};
	L.control.layers( overlay ).addTo( cg_map.map );
	
	
	
	
}


/* ------------------------------------------------------------*
* get all markers of a certain type
* bundle them and them to one layer
* @param (int) markerType 
* @return (L.layerGroup) layer 
* ------------------------------------------------------------*/
function getMarkerCollection( markerType ) {
	var data;
	var layer;
	var marker = [];
	
 	var request = $.ajax({ 
 		url: 'http://lokal.horst/websites/mapgames/index.php/app/getPOIs/'+markerType, 
 		async: false
 	}); 
 	
 	data =  $.parseJSON( request.responseText );
 	
 	for( var i = 0; i < data.length; i++ ) {
		marker[i] = L.marker( [ data[i].lat, data[i].lng ] );
		//marker[i].bindPopup( "<p>"+data2[i].name+"</p>" );
		//marker[i].addTo( customlayer );
	}
	//return marker[1];
	return layer = L.layerGroup( marker );
}

function createMarkerLayer() {
	
}


/* ------------------------------------------------------------*
* create custom control = panel with different options
* @return DOM Element -> container
* ------------------------------------------------------------*/
var cg_markerControl = L.Control.extend({
    options: {
        position: 'bottomleft'
    },

    onAdd: function (map) {
        // create the control container
        var container = L.DomUtil.create( 'div', 'marker-control-layer' );
        var domElem = container;
        
        
     	var lay = getMarkerCollection( 1 );
     
     	$( container ).html("<div id='test'>SHOW</div><div id='test2'>HIDE</div><span id='icon-plus'>+</span>");
		
        $( container ).on(  'click', function() { markerControlPanelToggle.apply( domElem ); } );
     
    //console.log( getMarkerCollection( 1 ) );
     
		$( '#test' ).on( 'click', function() {
		cg_map.map.addLayer( lay );
	});
	$( '#test2' ).on( 'click', function() {
		cg_map.map.removeLayer( lay );
	});
	
     
        // $( container ).html( );
		//container.addEventListener( 'click', function() { markerControlPanelToggle.apply( domElem ); }, false );
        // ... initialize other DOM elements, add listeners, etc.
	return container;
    }
});



/* ------------------------------------------------------------*
* create layer == overlay in das schlussendlich die marker
* plaziert werden
* ------------------------------------------------------------*/
var MyCustomLayer = L.Class.extend({

    initialize: function (latlng) {
        // save position of the layer or any options from the constructor
        this._latlng = latlng;
    },

    onAdd: function (map) {
        this._map = map;

        // create a DOM element and put it into one of the map panes
        this._el = L.DomUtil.create( 'div', 'cg-marker-layer leaflet-zoom-hide' );
        map.getPanes().overlayPane.appendChild(this._el);

        // add a viewreset event listener for updating layer's position, do the latter
        map.on('viewreset', this._reset, this);
        this._reset();
    },

    onRemove: function (map) {
        // remove layer's DOM elements and listeners
        map.getPanes().overlayPane.removeChild(this._el);
        map.off('viewreset', this._reset, this);
    },

    _reset: function () {
        // update layer's position
        var pos = this._map.latLngToLayerPoint(this._latlng);
        L.DomUtil.setPosition(this._el, pos);
    }
});

//map.addLayer(new MyCustomLayer(latlng));






	
	
	
	
	
	var cg_markerLayer = new cg_markerControl();
	cg_map.map.addControl( cg_markerLayer );
	

	//var cg_markerLayer = new cg_markerControl();
	//var test = new L.LatLng( cg_user.home.lat, cg_user.home.lng );  
	//cg_map.map.addLayer(new MyCustomLayer( test ));
	
	//var test = new L.LatLng( cg_user.home.lat, cg_user.home.lng );  
	//var lay = new MyCustomLayer( test );
	//console.log(getMarkerCollection( 1 ) );
	//getMarkerCollection(1).addTo(lay);







	
//map.addControl( new MyControl() );