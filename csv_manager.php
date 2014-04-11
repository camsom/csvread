<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css"/>
<style>
	table {
		width:50%;
		margin:0 auto;
	}
	
	th {
		text-decoration: underline;
	}
</style>
</head>
<body>

<?php
function cleanarray($array){
	for ($i=0; $i<count($array); $i++){
		$array[$i] = trim($array[$i]);
	}
	return $array;
}

function printsqlrow($row){
	global $headers;
	echo "<tr>";
	for ($i=0;$i<count($headers);$i++){
		echo "<td>".$row[$headers[$i]]."</td>";
	}
	echo "</tr>";
}

function printcleanheaders(){
	global $headers;
	echo "<tr>";
	for ($i=0;$i<count($headers);$i++){
		$hold = ucfirst($headers[$i]);
		$header_ar = explode("_",$headers[$i]);
		for ($j=0;$j<count($header_ar);$j++){
			$header_ar[$j] = ucfirst(strtolower($header_ar[$j]));
		}
		$pheader = implode(" ", $header_ar);
		echo "<th>";
		echo $pheader;
		echo "</th	>";
	}
	echo "</tr>";
}


function addcsv($csv_name){
	global $headers;
	global $db;
	$fp = fopen($_FILES[$csv_name]['tmp_name'], 'rb');
	while ( ($line = fgetcsv($fp, ', ')) !== false){
		$cl = cleanarray($line);
		if ($cl == $headers or count($cl) < 4) {
		
		} else {
			$db->exec("INSERT INTO trains ('$headers[0]', '$headers[1]', '$headers[2]', '$headers[3]') VALUES ('$cl[0]', '$cl[1]', '$cl[2]', '$cl[3]');");	
		}
	}
	fclose($fp);
}


$db = new SQLite3( ':memory:' );
$db->exec('CREATE TABLE trains (train varchar(255));');

$fp = fopen($_FILES['csv1']['tmp_name'], 'rb');
$headers = cleanarray(fgetcsv($fp, ', '));
for ($i=0;$i<count($headers);$i++){
	$db->exec("ALTER TABLE trains ADD $headers[$i] varchar(255)");
}
fclose($fp);

for ($i=1; $i<=count($_FILES); $i++){
	$csv = "csv$i";
	addcsv($csv);
}

$results = $db->query("SELECT DISTINCT * FROM trains ORDER BY RUN_NUMBER ASC");
echo "<table>";
printcleanheaders();
while ($row = $results->fetchArray()){
	printsqlrow($row);
}
echo "</table>";



?>
</body>
</html>
