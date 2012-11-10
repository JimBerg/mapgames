<div id="map">Map</div>

<div id="map-interaction">
	<!--<img src="" alt="" />
	<span>Name</span>
	<span>Visits</span>-->
	<?php //Utilities::setMarkerContent( $poi ); //var_dump( $poi ); ?>
	<ul>
		<li><a href="<?php echo site_url( 'app/index/login' ); ?>" >Home</a></li>
		<li><a href="<?php echo site_url( 'app/getPOIs/1' ); ?>" class="poi" data-type="1" >Sehenswürdigkeiten 1</a></li>
		<li><a href="<?php echo site_url( 'app/getPOIs/2' ); ?>" class="poi" data-type="2" >Parks & Gärten 2</a></li>
		<li><a href="<?php echo site_url( 'app/getPOIs/3' ); ?>" class="poi" data-type="3" >Museen & Ausstellungen 3</a></li>
	</ul>
</div>
