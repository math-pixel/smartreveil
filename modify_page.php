<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="add_page.css" />
	<title>ADD Page</title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<center>
		<?php
		$nb  = $_GET['name_nb'];
		$file = file_get_contents("./preset/data_preset_" . $nb . ".txt",FILE_USE_INCLUDE_PATH);
		$file = explode("|", $file);
		$name = $file[0];
		$day = explode("-", $file[1]);
		$houre = explode("-", $file[2]);

		$day_array = [];
		for($i = 0; $i <= count($day)-1; $i++){
			if($day[$i] == "true"){
				array_push($day_array, "checked");
			}else{
				array_push($day_array, " ");
			}
		}

		echo "<h1>Preset Info</h1>
		<div>
			<p id= \"original_name\" > ".$name."</p>
			<h2 >Le nom de ton preset</h2>
			<input type=\"text\" name=\"name\" id=\"name\" value= ". $name .">
		</div>
		<div>
			<h2>Coche les jours Actif</h2>
			<input type=\"checkbox\" name=\"day\" class=\"day_check\" $day_array[0]>
			Lundi<br>
			<input type=\"checkbox\" name=\"day\" class=\"day_check\" $day_array[1]>
			Mardi<br>
			<input type=\"checkbox\" name=\"day\" class=\"day_check\" $day_array[2]>
			Mercredi<br>
			<input type=\"checkbox\" name=\"day\" class=\"day_check\" $day_array[3]>
			Jeudi<br>
			<input type=\"checkbox\" name=\"day\" class=\"day_check\" $day_array[4]>
			Vendredi<br>
			<input type=\"checkbox\" name=\"day\" class=\"day_check\" $day_array[5]>
			Samedi<br>
			<input type=\"checkbox\" name=\"day\" class=\"day_check\" $day_array[6]>
			Dimanche<br>
		</div>
		<div id=\"timer_div\">
			<h2>Choisis les horaires</h2>";
		
		$type = "<input type=\"time\" name=\"time\" class=\"timer\" ";
		for($i = 0; $i <= count($houre)-1; $i++){
			echo $type . "value=". $houre[$i] . "><br>";
		}
		echo "</div>"

		?>
		

		<button id="button_add" onclick="add()">ADD Timer</button><br>
		<button id="button_submit" onclick="main()">Submit</button>
	</center>
	<script type="text/javascript" src="modify_page.js"></script>
</body>
</html>