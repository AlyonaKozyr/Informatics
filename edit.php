<?php

include "connection.php";

$link = mysqli_connect($host, $user, $password, $database) 
or die ("Ошибка" . mysqli_error());

$doctor_id = $_GET['id'];
$name = $_GET['doctor'];
$room = $_GET['room'];

$query = "SELECT doctor.doctor_FIO, room.room_number
    FROM room 
    INNER JOIN
    doctor ON doctor.doctor_id = room.doctor_id
    WHERE doctor.doctor_FIO LIKE '%$name%'";

$result = mysqli_query($link, $query);

if(isset($_GET['button']))
{
	$name = $_GET['doctor'];
	$room = $_GET['room'];

    $query = "UPDATE doctor SET
    doctor_fio = '" . $name . "'
    WHERE doctor_id = '" . $doctor_id . "';";

    $result = mysqli_query($link, $query);

    $query = "UPDATE room 
    JOIN doctor ON room.doctor_id = doctor.doctor_id 
	SET room.room_number = '$room'
	WHERE doctor.doctor_id = '$doctor_id';";

	$result = mysqli_query($link, $query);

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
	<input hidden name = 'id' type = 'text' value='<?php echo $doctor_id; ?>'>
	<tr><td>ФИО врача: <input name = 'doctor' type = 'text' value='<?=@$_GET['doctor']?>'></td></tr>
	<tr><td>Номер кабинета: <input name = 'room' type = 'text' value='<?=@$_GET['room']?>'></td></tr>
	</table>
	<br/>
	<input type = 'submit' name = 'button'>
	</form>
	</div> 
</body>
</html>