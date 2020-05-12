function confdel(files) {

	var userselection = confirm("Attention le fichier va être supprimer !");
	
	if (userselection == true){
		
		var nameFiles = files;
		$.ajax
		({
			url: 'delfiles.php',
			type: 'GET',
			data: {'nameFiles': nameFiles},
			success: function(result){
				
				var el = document.getElementById(nameFiles);
				el.remove();
				
			}
		});
		
	}
	else {
	event.preventDefault();
	document.location.href = ".\?supprimer=supprimer";
	}

}