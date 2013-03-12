<div id="content">
  <div id="clients">
	<?php echo $text[0]->content; ?>
  </div>
</div>

<script>

	var numClients = document.getElementById("clients").getElementsByTagName("li").length;
	var numRows = 28;
	var numColumns = Math.ceil(numClients/28);
	
	document.getElementById("clients").appendChild(document.createElement("table"));
	var table = document.getElementById("content").getElementsByTagName("table")[0];
	table.setAttribute("id", "clientsTable");
	table.appendChild(document.createElement("tr"));
	
	for(x = 0; x < numColumns; x++){
		var span = document.getElementById("content").getElementsByTagName("tr")[0];
		span.appendChild(document.createElement("td"));
		
		for(y = 0; y < numRows; y++){
			var column = document.getElementById("content").getElementsByTagName("td")[x];
			var current = y + numRows * x;
			
			if (current >= numClients){
				break;
			}
			else {
				var insert = document.getElementById("clients").getElementsByTagName("li")[current].innerHTML;
				column.innerHTML += insert;
			}//end if..else
			
		}//end inner for loop
	} //end outer for loop
	
	var parent = document.getElementById("clients");
	var child = document.getElementById("clients").getElementsByTagName('ul')[0];
	parent.removeChild(child);
	
</script>