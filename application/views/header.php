<ul class="nav level-1">
  
    <?php if( !empty( $nav ) ): ?>
		<?php 
			function createList( $elem ) 
			{
				echo '<li><a href="'.site_url( $elem['url'] ).'" />'.$elem[ 'name' ].'</a></li>';
			}
			$return = array_map( 'createList', $nav );
		?>	
    <?php endif; ?> 

</ul>