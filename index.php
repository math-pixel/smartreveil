<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css.css" />
	<title>SmartReveil</title>
	<meta charset="UTF-8" />
	<script type="text/javascript" src="js/FileSaver.js"></script>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<?php  
		$content= file_get_contents("./yey.txt",FILE_USE_INCLUDE_PATH);
		echo $content;
	?>
	<script src="./js.js"></script>
</body>
</html>