<div id="profile-page">
	<img src="<?php echo $profile->avatar; ?>" />

	<div class="right-col">
		<h2>Dein Profil</h2>
		<ul>
			<li><span>Name: </span><?php echo $profile->firstname; ?></li>
			<li><span>Ort: </span><?php echo $profile->name; ?></li>
			<li><span>E-Mail: </span><?php echo $profile->email; ?></li>
		</ul>
		
		<hr />
		
		<h2>Deine Tasks & Besuche</h2>
		<ul>
			<li><span>Ort: </span><?php echo $visits->name; ?></li>		
			<li><span>Datum: </span><?php echo date( "d.M.Y H:m", $visits->date ); ?></li>
			<li><span>Aufgabe: </span><?php echo $visits->task; ?></li>
			<li><span>Gelöst: </span><?php echo $visits->taskcomplete ? "abgeschlossen" : "offen" ?></li>
		</ul>
		
	</div>

</div>
