<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<script type="text/javascript" src='js/jquery-1.10.2.min.js'></script>
	<script>
		$(document).ready(function(){
			i = 2;
			$("#add").click(function(){
				var csvname = "csv" + i;
				$('#csv_fields').append('<div class="form-group"><label for="' + csvname + '" style="control-label">File' + i + ':</label><input type="file" name="' + csvname + '" id="' + csvname + '" value="choose csv" style="form-control"/></div>');
				i++;
			});



			$("form").submit(function(e){
				$("input[type=file]").each(function() {
					var filename = $('#'+this.id).val().split('\\').pop()
					var extension = filename.split('.').pop();
					if (filename==''){
						alert("Please choose a file.")
						e.preventDefault();
					}
					if(extension!="csv"){
						alert(filename + " is not a '.csv' file. Please choose a file with the '.csv' extension.");
						e.preventDefault();
					}
				});
			});
		});	
	</script>




</head>
<body>
<?php echo "<h1>CSV Reader</h1>"; ?>
<div class="fluid-container">
	<form id="csv_form" action="csv_manager.php" method="post" enctype="multipart/form-data">
		<div id="csv_fields">
		<div class="form-group">
			<label for="csv1" style="control-label">File:</label>
			<input type="file" name="csv1" id="csv1" value="choose csv" style="form-control"/>
		</div>
		</div>
		<div class="form-group">
			<a href="#" id="add">add csv</a>
			<input type="submit" name="upload" value="Upload" id="csv_submit"/>
		</div>
	</form>
</div>


</body>
</html>