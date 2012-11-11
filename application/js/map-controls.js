/* ------------------------------------------------------------*
* 
* extend custom layer styles for leaflet
* 
* ------------------------------------------------------------*/


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
}


/* ------------------------------------------------------------*
* create custom control
* ------------------------------------------------------------*/
var cg_markerControl = L.Control.extend({
    options: {
        position: 'bottomleft'
    },

    onAdd: function (map) {
        // create the control container with a particular class name
        var container = L.DomUtil.create( 'div', 'marker-control-layer' );
        var domElem = container;
        
        $( container ).html( "<span id='icon-plus'>+</span>" );
        $( container ).on(  'click', function() { markerControlPanelToggle.apply( domElem ); } );
     
         $( container ).html( );
		//container.addEventListener( 'click', function() { markerControlPanelToggle.apply( domElem ); }, false );
        // ... initialize other DOM elements, add listeners, etc.

        return container;
    }
});
	
//map.addControl( new MyControl() );