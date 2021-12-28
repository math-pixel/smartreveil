function Setup(){
	//met a jour les presets 
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data:{
			mathieu: "start",
			aaa: "data"
		},
		dataType: "json",
		success: function (response){
			console.log(response);
			var dataa = JSON.parse(JSON.stringify(response.message));
			console.log(dataa);
			name_div = dataa.split(' ')[0].split('=')[1];
			nb = dataa.split(' ')[1].split('=')[1];
			nameLine = dataa.split(' ')[2].split('=')[1];
			console.log("OK !");
		}

	});
	console.log("ntm");
}


function duplicate() {

	var original_ADD = document.getElementById('ADD');
    var original_preset = document.getElementById('Preset0');
    var original_line = document.getElementById("Line" + nameLine);


    var width = document.getElementById('Preset0').clientWidth;
    original_ADD.style.width = width;

	if (nb < 2) {
		
		nb++;
		//alert(nb);
		var clone_preset = original_preset.cloneNode(false); // "deep" clone
   		clone_preset.id = "Preset" + ++name_div; // there can only be one element with an ID
    	var h = document.createElement("h1")
    	var t = document.createTextNode("replace");
    	clone_preset.appendChild(h);
    	h.appendChild(t);

    	//clone_preset.onclick = duplicate; // event handlers are not cloned
    	
    	
    	//original_line.replaceChild(clone_preset, original_ADD);
    	original_line.removeChild(original_ADD)
    	original_line.appendChild(clone_preset)
    	original_line.appendChild(original_ADD)
	}else{
		nameLine++;
		nb = 0;
		
		var clone_preset = original_preset.cloneNode(false); // "deep" clone
   		clone_preset.id = "Preset" + ++name_div; // there can only be one element with an ID
    	var h = document.createElement("h1")
    	var t = document.createTextNode("replace");
    	clone_preset.appendChild(h);
    	h.appendChild(t);
    	//clone_preset.onclick = duplicate; // event handlers are not cloned
		
		original_line.removeChild(original_ADD);
		original_line.appendChild(clone_preset)
		
		
		var new_line = original_line.cloneNode(false);
		new_line.id = "Line" + nameLine;
		original_line.parentNode.appendChild(new_line);
		
		
		new_line.appendChild(original_ADD);
	}
	Serveur_post();

}

function Serveur_post(){
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data:{
			mathieu: "genie",
			variable: "name_div="+name_div+" nb="+nb+" nameLine="+nameLine,
			content: $("#all_preset").prop('outerHTML')
		},
		dataType: "json",
		success: function (response){
			//console.log(response)
			console.log("YEY !");
			location.replace("http://localhost/smartreveil/add_page.php");
		}

	});
}

function modify(clicked_id){
	a = clicked_id;
	a = a.split('Preset');
	alert(a[1]);
	location.replace("http://localhost/smartreveil/modify_page.php?name_nb=" + a[1]);
}


Setup();



