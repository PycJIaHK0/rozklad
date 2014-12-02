<?php

$host 		= "localhost"; 
$username	= "root"; 
$password	= ""; 
$db			= "timetable_tneu";

mysql_connect($host, $username, $password) or die("Oops! Coudn't connect to server"); 
mysql_select_db($db) or die("Oops! Coudn't select Database"); 
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$query = mysql_query("SELECT * FROM `st_group` ORDER BY id ASC");
$count = mysql_num_rows($query);
if($count > 0) {
while($fetch = mysql_fetch_array($query)) {
$record[] = $fetch;
}
}
echo '<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Розклад занять</title>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<h1>Розклад занять</h1>

<div class="out_table_m">';
echo '<form action="action/open_stud.php" method="post">
<select name="class">';
foreach($record as $records) {
echo '<option>'.$records['value'].'</option>';
}
echo '</select>
<br>
<input type="submit" value="СОРТУВАТИ!" />
</form>';
echo '
</div>
</body>
</html>';
?>
