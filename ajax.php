<?php
	const http_ok = 200;
	const http_bad = 400; 
	const http_method = 405;

	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST'){
		$response_code = 200;
		$message = "parametre action";

		if($_POST['mathieu'] == "start"){
			$message= file_get_contents("./variable.txt",FILE_USE_INCLUDE_PATH);			
		}else if($_POST['mathieu'] == "genie"){
			$message = $_POST['content'];
			$data_var = $_POST['variable'];

			file_put_contents("./yey.txt", $message);
			file_put_contents("./variable.txt", $data_var);
		
		}else if($_POST['mathieu'] == 'save_data'){
			
			// partie pour save les donnee de chaque 	
			$name = $_POST['name'];
			$day = $_POST['day'];
			$time = $_POST['timing'];
			$num_file= file_get_contents("./variable.txt",FILE_USE_INCLUDE_PATH);
			$num_file = explode(" ", $num_file)[0];
			$num_file = explode("=", $num_file)[1];
			$name_file = "data_preset_" . $num_file . ".txt";
			$message =  $name . "|" . implode("-", $day) . "|" . implode("-", $time);
			file_put_contents("./preset/" . $name_file, $message);

			//actualiser le nom du preset
			$htmll = file_get_contents("./yey.txt",FILE_USE_INCLUDE_PATH);
			$htmll = str_replace("replace", $name, $htmll);
			file_put_contents("./yey.txt", $htmll);

		}
		else if($_POST['mathieu'] == "modify_data"){
				// partie pour save les donnee de chaque 	
				$name = $_POST['name'];
				$day = $_POST['day'];
				$time = $_POST['timing'];
				$num_file= file_get_contents("./variable.txt",FILE_USE_INCLUDE_PATH);
				$num_file = explode(" ", $num_file)[0];
				$num_file = explode("=", $num_file)[1];
				$name_file = "data_preset_" . $num_file . ".txt";
				$message =  $name . "|" . implode("-", $day) . "|" . implode("-", $time);
				file_put_contents("./preset/" . $name_file, $message);
				

				$original_name = $_POST['original_name'];
				$html = file_get_contents("./yey.txt",FILE_USE_INCLUDE_PATH);
				$original_name = preg_replace( '/\s+/', '', $original_name);
				$htmla = str_replace( "<h1>". $original_name . "</h1>", "<h1>" . $name . "</h1>", $html);
				$message = $htmla;
				file_put_contents("./yey.txt", $htmla);
		}	
		
		response($response_code, $message);
	}else{
		$response_code = http_method;
		$message = "not allowed";

		response($response_code, $message);
	}

	function response($response_code, $message){
		header('Content-Type: application/json');
		http_response_code(200);

		$response = [
			"response_code" => $response_code,
			"message" => $message
		];

		echo json_encode($response);
	}
?>