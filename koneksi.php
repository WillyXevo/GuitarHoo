<?php


$db = new SQLite3('db_chord.db');

if(!$db) {
  	echo $db->lastErrorMsg();
}


/*echo "var chord_data = [";
$i=0;
while(!feof($file)){
	$csv = fgetcsv($file);
	if($i==0){
		echo "[\"$csv[0]\", \"$csv[1]\", \"$csv[2]\", \"$csv[3]\"]";
	}else{
		echo ", [\"$csv[0]\", \"$csv[1]\", \"$csv[2]\", \"$csv[3]\"]";
	}
	$i++;
}
echo "];";*/
/*
$s = SQLite3::escapeString($sql);
echo $s;*/

/*$sql = "SELECT DISTINCT nama_artist FROM tblsong WHERE substr(nama_artist, 1, 1) = 'A'";


$res = $db->query($sql);

while ($row = $res->fetchArray()) {
    echo "{$row['nama_artist']} <br><br>";
}*/
?>