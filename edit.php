<?php
include "connection.php";
$doctor_id = $_GET['doctor_id'];
$_COOKIE

$query = "SELECT doctor.doctor_FIO, room.room_number
    FROM room 
    INNER JOIN
    doctor ON doctor.doctor_id = room.doctor_id
    WHERE doctor.doctor_FIO LIKE '%$input_1%'";

$result = mysqli_query($link, $query) or die('Ошибка запроса ('.mysqli_error($query).'): '.$query);

if(isset($_GET['button']))
{
	$input_1 = $_GET['input_1'];
	$input_2 = $_GET['input_2'];

    $query = "UPDATE doctor SET
    doctor_fio = '".$input_1."'
    WHERE doctor_id = '".$doctor_id."';";

    $result = mysqli_query($link, $query) or die('Ошибка запроса ('.mysqli_error($query).'): '.$query);

    $query = "UPDATE room SET
    room_number = '".$input_2."';";

$result = mysqli_query($link, $query) or die('Ошибка запроса ('.mysqli_error($query).'): '.$query);

header('location: ./list.php'); 
}
?>
<!DOCTYPE html>
<html>
<body>
	<div  align = center>
	<form method = 'get' action = 'edit.php'>
    <table border='1'>
	<tr><th><i>Редактировать:</i></th></tr>
	<tr><td>ФИО врача: <input name = 'input_1' type = 'text' value='<?=@$_GET['input_1']?>'></td></tr>
	<tr><td>Номер кабинета: <input name = 'input_2' type = 'text' value='<?=@$_GET['input_2']?>'></td></tr>
	</table>
	<br/>
	<input type = 'submit' name = 'button'>
	</form>
	</div> 
</body>
</html>