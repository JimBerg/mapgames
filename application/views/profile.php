<div id="profile-page">
	<img src="<?php echo $profile->avatar; ?>" />

	<div class="right-col">
		<h2>Dein Profil</h2>
		<ul>
			<li><span>Name: </span><?php echo $profile->firstname; ?></li>
			<li><span>Ort: </span><?php echo $profile->name; ?></li>
			<li><span>E-Mail: </span><?php echo $profile->email; ?></li>
		</ul>
	</div>

</div>
