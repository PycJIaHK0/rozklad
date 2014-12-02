<td id="menu">
<ul id="nav">

<li><a href="#">Користувачі</a>
<ul>
<li><a href="#" onclick="showContent('forms/reg_users_form.php')">Додати</a></li>
<li><a href="#" onclick="showContent('action/open_users.php')">Перегляд</a></li>
<li><a href="#" onclick="showContent('action/update_users.php')">Редагувати</a></li>
</ul>
</li>
<li><a href="#">Розклад</a>
<ul>
<li><a href="#" onclick="showContent('action/teach.php')">Для викладача</a></li>
<li><a href="#" onclick="showContent('action/stud.php')">Дата студента</a></li>

</ul>
</li>
<li><a href="#">Інше</a>
<ul>
<li><a href="http://localhost/tools/phpmyadmin" target="_blank">phpMyAdmin</a></li>

</ul>
</li>
</ul>
	<form id="a_log" method="post" action="index.php">
		Ви залоговані у системі! |
		<input id="exit_btn"  type="submit" name="logout" value="Вийти"/>
	</form>	
</td>
