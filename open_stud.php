<?php


$table = isset($_POST['class'])?$_POST['class']:'';

$host 		= "localhost"; 
$username	= "root"; 
$password	= ""; 
$db			= "timetable_tneu";
mysql_connect($host, $username, $password) or die("Oops! Coudn't connect to server"); 
mysql_select_db($db) or die("Oops! Coudn't select Database"); 
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$query = mysql_query("SELECT * FROM `timetable` where st_group='$table'");
$count = mysql_num_rows($query);
if($count > 0) {
while($fetch = mysql_fetch_array($query)) {
$record[] = $fetch;
}
}
echo '
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Розклад занять для групи - '.$table.'</title>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<a href="javascript:history.back()" title="BACK!" class="back"><img src="back.png"></a>
<h1>Розклад занять для групи - '.$table.'</h1>
<div class="out_table">
';

$DAYS = array(
    1 => "Понеділок",
    2 => "Вівторок",
    3 => "Середа",
    4 => "четвер",
    5 => "пятниця"
);

echo '<table border="0" cellspacing="0" cellpadding="3" align="center" width="750px">';

if($count <= 0) {
    echo '<tr>
    <td colspan="9" align="center">Записів немає</td>
    </tr>';
 } 
 else {
    for ($j=1;$j<=5;$j++){
        echo '<tr><th colspan=5 class="green">';
        echo $DAYS[$j];
        echo '</th></tr>
            <tr class="l_green">
            <th>Тиждень</th>
            <th>Викладач</th>
            <th>Початок</th>
            <th>Предмет</th>
            <th>Аудиторія</th>
            </tr>';
        $i=0;
        foreach($record as $records) {
            $i++;
            if ($records['day']==$j){
                echo '<tr class="';if($i%2 == 0) { echo 'gray'; }
                echo '">
                <td>';
        if ($records['week']==1) {echo'Н';} else {echo 'П';}
            echo "</td>
            <td>".$records['teacher']."</td>
            <td>".$records['lesson_time']."</td>
            <td>".$records['subject']."</td>
            <td>".$records['room']."</td>
            </tr>";
        }
    }
    }
}

echo '</table></div>
</body>
</html>';

?>
