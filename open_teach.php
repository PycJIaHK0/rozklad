<?php


$teacher = isset($_POST['teacher'])?$_POST['teacher']:'';

$host 		= "localhost"; 
$username	= "root"; 
$password	= ""; 
$db			= "timetable_tneu";
mysql_connect($host, $username, $password) or die ("Неможливо під'єднатись до сервера БД!"); 
mysql_select_db($db) or die ("Неможливо вибрати БД!"); 
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$query = mysql_query("SELECT * FROM `timetable` where teacher='$teacher'");
$rows = mysql_num_rows($query);
if($rows > 0) {
while($fetch = mysql_fetch_array($query)) {
$record[] = $fetch;
}
}
echo '
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Розклад занять '.$teacher.'</title>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<header>Розклад занять '.$teacher.':</header>
';
if($rows <= 0) {
echo 'Записів немає';
} else {

    $mas= array(1=>0,2=>0,3=>0,4=>0,5=>0);
	$dayArr = array(
	 1=>'Понеділок:',
	 2=>'Вівторок:',
	 3=>'Середа:',
	 4=>'Четвер',
	 5=>'Пятниця' );
	
    print_r($array);
    foreach ($record as $value) {
		 $day = $value['day'];
		 $mas[$day]=1;
   
	   }
        foreach ($mas as $key=>$value){
    if ($value==1){
		$day = $dayArr[$key];
		echo "<h1>".$day."</h1>";

    echo '<table border="0" align="center" cellspacing="0" cellpadding="3">
	
	
<tr class="head">
<th>Тиждень</th>
<th>Час початку</th>
<th>Предмет</th>
<th>Аудиторія</th>
<th>Група</th>
<th>Факультет</th>
</tr>
';


        
        foreach ($record as $val) {
            if ($val['day']==$key){
                
echo '<tr>
<td>';
if ($val['week']==1) {echo'Непарний';} else {echo 'Парний';}
echo '</td>
<td>'.$val['lesson_time'].'</td>
<td>'.$val['subject'].'</td>
<td>'.$val['room'].'</td>
<td>'.$val['st_group'].'</td>
<td>'.$val['faculty'].'</td>
</tr>';
   
} 
}
echo '</table>';
}
}
}
echo '
<a href="../index.php" class="button_back">НАЗАД</a>
</body>
</html>';
?>
