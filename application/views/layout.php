<!DOCTYPE html>
<html>
	<head>
		<title>dis.cover</title>	
		<meta charset="utf-8">
		<link href='http://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url( 'application/css'); ?>/style.css">
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.css" />
	</head>
	
    <body>
    	<?php //echo $this->state; ?> 
    	<?php //var_dump($_SESSION); ?> 
        <div id="main-container">
            <div id="header">
            	<div class="content">
                <!--	<h1>dis.cover</h1> -->
               	</div>
               
                    <div class="content">
                    	<div id="navigation">
	                     	<?php echo $header; ?>  
	                     	<?php if( $this->state != 'logout' ): ?>
	                     		<a href="<?php echo site_url( 'user/logout' ); ?>"  id="logout">logout</a>
	                     	<?php endif; ?>
                     	</div>		
                    </div>
                
            </div>

            <div id="content-container">
                <div class="content">
                	            	
            		<?php if( $this->state == 'logout' ): ?>
	                    <div class="section-head">
	                        <!--<h1>Entdecke!</h1>-->
	                    </div>
	                    
	                    <div class="content-col col-overall-width"> 
	                    	<div id="login-container">
	      						 <div id="login-box">
		                        	<?php if( !empty( $activeView ) ): ?>
		                        	<!--<ul id="navigation-login-view" class="nav">
										<li id="loginbox-login" <?php if ( $activeView == 'login' ) { echo "class='active'"; } ?>>
											<a href="<?php echo site_url( 'user/index/login' ); ?>">einloggen</a>
										</li>
								 		<li id="loginbox-register" <?php if ( $activeView == 'register' ) { echo "class='active'"; } ?>>
											<a href="<?php echo site_url( 'user/index/register' ); ?>">registrieren</a>
								 		</li>
									</ul>-->
									<?php endif; ?>
		      						<?php echo $login; ?>
		      					</div>
	                    	</div> 
	                    </div>
					<?php else: ?>
						<div class="section-head">
	                    <!--   <h1>Bereit!</h1> -->
	                    </div>
	                     <div class="content-col col-overall-width"> 
	                     	<?php echo $login; ?>
	                     </div>
	                     
					<?php endif; ?>	
                </div>
            </div>
        </div>

        <div id="footer">
            <div class="content"></div>
        </div>

  		<script src="<?php echo base_url( 'application/js' ); ?>/jquery-1.8.1.min.js" type="text/javascript"></script>
  		<script src="http://cdn.leafletjs.com/leaflet-0.4.4/leaflet.js"></script>
  		<script src="<?php echo base_url( 'application/js' ); ?>/script.js" type="text/javascript"></script>
  		
  		<!--<script src="<?php echo base_url( 'application/js' ); ?>/map-controls.js" type="text/javascript"></script>-->
  		
    </body>
</html>

