<ul class="nav">
    <?php if( !empty( $nav ) ): ?>
		<?php 
			function createList( $elem ) 
			{
				$class = '';
				if( isset( $_SERVER[ 'PATH_INFO' ] ) ) {
					$path = $_SERVER[ 'PATH_INFO' ];
					
					if( $path == '/'.$elem['url'] ) {
						$class = 'active';
					} 	
				} 
				echo '<li class="'.$class.'"><a href="'.site_url( $elem['url'] ).'" />'.$elem[ 'name' ].'</a></li>';
			}
			$return = array_map( 'createList', $nav );
		?>	
    <?php endif; ?> 

</ul>