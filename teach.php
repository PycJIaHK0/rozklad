<?php

$host 		= "localhost"; 
$username	= "root"; 
$password	= ""; 
$db			= "timetable_tneu";
mysql_connect($host, $username, $password) or die("Oops! Coudn't connect to server"); 
mysql_select_db($db) or die("Oops! Coudn't select Database"); 
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$query = mysql_query("SELECT * FROM `teacher` ORDER BY id ASC");
$count = mysql_num_rows($query);
if($count > 0) {
while($fetch = mysql_fetch_array($query)) {
$database[] = $fetch;
}
}
echo '<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Rozklad</title>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<header>Виберіть викладача зі списку:</header>
<div class="content_box">
<form action="action/open_teach.php" method="post">
<select name="teacher">';
foreach($database as $value) {
echo '<option>'.$value['value'].'</option>';
}
echo '</select><br>
<input class="button" type="submit">
</form>
</div>
</body>
</html>
';
?>
