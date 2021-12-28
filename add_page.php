<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="add_page.css" />
	<title>ADD Page</title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<center>
		<h1>Preset Info</h1>
		<div>
			<h2>Le nom de ton preset</h2>
			<input type="text" name="name" id="name">
		</div>
		<div>
			<h2>Coche les jours Actif</h2>
			<input type=checkbox name=day class=day_check>
			Lundi<br>
			<input type=checkbox name=day class=day_check>
			Mardi<br>
			<input type=checkbox name=day class=day_check>
			Mercredi<br>
			<input type=checkbox name=day class=day_check>
			Jeudi<br>
			<input type=checkbox name=day class=day_check>
			Vendredi<br>
			<input type=checkbox name=day class=day_check>
			Samedi<br>
			<input type=checkbox name=day class=day_check>
			Dimanche<br>
		</div>
		<div id="timer_div">
			<h2>Choisis les horaires</h2>
			<input type="time" name="time" class="timer"><br>
		</div>
		<button id="button_add" onclick="add()">ADD Timer</button><br>
		<button id="button_submit" onclick="main()">Submit</button>
	</center>
	<script type="text/javascript" src="add_page.js"></script>
</body>
</html>