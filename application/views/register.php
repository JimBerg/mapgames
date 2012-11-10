<?php echo form_open( 'user/register' ); ?>
	<h2>Registriere dich!</h2>
	<label for="firstname">Dein Name: </label>
	<input type="text" id="firstname" name="firstname" />
	
	<label for="email">Deine Emailadresse: </label>
	<input type="text" id="email" name="email" />
	
	<label for="password">Passwort: </label>
	<input type="password" id="password" name="password" />
	
	<button id="getLocation">Deine Position</button>
	
	<input type="hidden" id="position-lat" name="position-lat" />
	<input type="hidden" id="position-lng" name="position-lng" />
	<input type="submit" value="Registrieren" id="submitData" />
	
<?php echo form_close(); ?>

<?php echo validation_errors(); ?>
