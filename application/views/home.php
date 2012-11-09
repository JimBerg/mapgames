<!DOCTYPE html>
<html>
	<head>
		<title>dis.cover</title>	
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url( 'application/css'); ?>/style.css">
		 <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4/leaflet.css" />
	</head>

	<body>
        <div id="main-container">
            <div id="header">
            	<div class="content">
                	<h1>dis.cover</h1>
               	</div>
                <div id="navigation">
                    <div class="content">
                     	<?php include 'header-login.php'; ?>  
                    </div>
                </div>
            </div>

            <div id="content-container">
                <div class="content">
                    <div class="section-head">
                        <h1>So let's get started!</h1>
                    </div>
                    
                    <div class="content-col col-overall-width">             
                        <div id="map">
                        	MAP is here
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="footer">
            <div class="content">
                Footer
            </div>
        </div>
        
  		<script src="<?php echo base_url( 'application/js' ); ?>/jquery-1.8.1.min.js" type="text/javascript"></script>
  		<script src="http://cdn.leafletjs.com/leaflet-0.4.4/leaflet.js"></script> 
  		<script src="<?php echo base_url( 'application/js' ); ?>/script.js" type="text/javascript"></script>
  		
	</body>

</html>
