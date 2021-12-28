function main(){
	var day_array = [];
	var time_array = [];
	var name_preset = "";

	var original_name = document.getElementById('original_name').innerHTML;
	var day = document.getElementsByClassName('day_check');
	var time = document.getElementsByClassName('timer');
	var name_preset = document.getElementById('name').value;

	for (var i = 0; i < day.length; i++) {
		day_array.push(day[i].checked);	
	}

	for (var i = 0; i < time.length; i++) {
		time_array.push(time[i].value);
	}

	console.log(name_preset, day_array, time_array);
	if(name_preset == ""){
		alert("tu n'a pas donnee de nom ");
	}else{
		send_data_to_server(name_preset, day_array, time_array,original_name);
	}
	
}

function add(){
	var input = document.createElement('input');
	document.getElementById("timer_div").appendChild(input);
	input.type = "time";
	input.className = "timer";
	var br = document.createElement('br');
	document.getElementById("timer_div").appendChild(br);

}

function send_data_to_server(name_preset, day_array, time_array, original_name){
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data:{
			mathieu: "modify_data",
			original_name: original_name,
			name: name_preset,
			day: day_array,
			timing: time_array
		},
		dataType: "json",
		success: function (response){
			console.log("YEY !");
			console.log(response);
			location.replace("http://localhost/smartreveil/index.php");
		}
	});
}
