var name_div = 0;
var nb = 1;
var nameLine = 0;

function duplicate() {
	var original_ADD = document.getElementById('ADD');
    var original_preset = document.getElementById('Preset');
    var original_line = document.getElementById("Line" + nameLine);


    var width = document.getElementById('Preset').clientWidth;
    original_ADD.style.width = width;

	if (nb + 1 != 3) {
		
		nb++;
		//alert(nb);
		var clone_preset = original_preset.cloneNode(true); // "deep" clone
   		clone_preset.id = "Preset" + ++name_div; // there can only be one element with an ID
    	//clone_preset.onclick = duplicate; // event handlers are not cloned
    	
    	
    	//original_line.replaceChild(clone_preset, original_ADD);
    	original_line.removeChild(original_ADD)
    	original_line.appendChild(clone_preset)
    	original_line.appendChild(original_ADD)
	}else{
		nameLine++;
		nb = 0;
		
		var clone_preset = original_preset.cloneNode(true); // "deep" clone
   		clone_preset.id = "Preset" + ++name_div; // there can only be one element with an ID
    	//clone_preset.onclick = duplicate; // event handlers are not cloned
		
		original_line.removeChild(original_ADD);
		original_line.appendChild(clone_preset)
		
		
		var new_line = original_line.cloneNode(false);
		new_line.id = "Line" + nameLine;
		original_line.parentNode.appendChild(new_line)
		
		
		new_line.appendChild(original_ADD);
	}
}