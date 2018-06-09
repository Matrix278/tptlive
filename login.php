<?php
$uName=$_POST['userLog'];
$uPass=$_POST['userPSWD'];
// нельзя подставлять введенную пользователем информацию напрямую в запрос к базе данных
// в замен получаем полный список пользователей и в цикле сравниваем с каждым
$host = "localhost";
$user = "root";
$pass = "";
$link = mysqli_connect($host, $user, $pass);
if($link===FALSE){
	echo 'Ошибка подключения к серверу';
}else{
	$dbOk=mysqli_select_db($link, "test");
	if($dbOk===FALSE){
		echo "Ошибка подключения к базе данных";
	}else{
		mysqli_query($link, "SET NAMES utf8");

		$uTable=mysqli_query($link, "SELECT * FROM userTable");
		$userDefined=false;
		while($oneUser=mysqli_fetch_assoc($uTable)){
			if($oneUser['userName']==$uName && $oneUser['userPass']==$uPass){
				$userDefined=$oneUser['userName'];
				$userStatus=$oneUser['status'];
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<script>
function testIt(){
	formID=document.logForm;
	userLogname=formID.userLog.value;
	userPassword=formID.userPSWD.value;
	if(userLogname==""){
		alert("Введите логин");
		formID.userLog.focus();
		document.getElementById("userLog").style.border="5px solid red";
	}else if(userPassword==""){
		alert("Введите пароль");
		formID.userPSWD.focus();
		document.getElementById("userPSWD").style.border="5px solid red";
	}else{
		formID.submit();
	}
}

</script>
<style>
	form{
		text-align:center;
		width:400px;
		height:auto;
		margin:200px auto;
		background-color:grey;
		border-radius:30px;
		box-shadow:8px 6px 12px rgba(0,0,0,0.6);
	}
</style>
</head>
<body>
<form method="POST" action="#" name="logForm">
<table>
	<tr>
		<td align="right"> Имя пользователя: </td>
		<td><input type="text" name="userLog"></td>
	</tr>
	<tr>
		<td align="right"> Пароль: </td>
		<td><input type="password" name="userPSWD"></td>
	</tr>
	<tr>
		<td>
			<input type="button" value="OK" onclick="testIt()">
		</td> 
	</tr>
</table>

</form>
</body>
</html>