<?php echo form_open( 'user/login' ); ?>
	<h2>Log dich ein!</h2>
	<label for="email">Deine Emailadresse: </label>
	<input type="text" id="email" name="email" />
	
	<label for="password">Passwort: </label>
	<input type="password" id="password" name="password" />
	
	<input type="hidden" id="position" />
	<input type="submit" value="Login" id="submitData" />
	
<?php echo form_close(); ?>

<?php echo validation_errors(); ?>
