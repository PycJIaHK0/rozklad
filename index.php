<?php  
session_start();
require_once "blocks/attach_style.php";
$connect = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('admin');
	if (isset($_POST['enter'])){
	$e_login = $_POST['e_login'];
	$e_password = md5($_POST['e_password']);
	
	$query = mysql_query("SELECT * FROM users WHERE login='$e_login'");
	$user_data = mysql_fetch_array($query);
	
	if ($user_data['password']== $e_password){
	$_SESSION['usr'] = $e_login;
	
	}
		else{
		echo "<h3 align='center'>Помилка вводу логіна/пароля!</h3>";
		}
}

if(isset($_POST['logout'])){
unset($_SESSION['usr']);
session_destroy();
}
	if (isset($_SESSION['usr']))
		{
		 require_once"action/body.php";
		}
	else
		{
		
		 require_once"action/authorization.php";
		}
		
?>






