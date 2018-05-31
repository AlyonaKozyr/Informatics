<html>
<body>
	<form action = 'search.php' method = 'get'>
	<table>
	<tr><th><i>Значение:</i></th><br/>
	ФИО врача: <input name = 'input_1' type = 'text' value='<?=@$_GET['input_1']?>'><br/>
	Номер кабинета: <input name = 'input_2' type = 'text' value='<?=@$_GET['input_2']?>'><br/>
	</tr>
	</table>
	<br/>
	<input type = 'submit' name = 'button'>
	</form>
</body>
</html>

<?php
include 'connection.php';
if(isset($_GET['button']))
{
	$input_1 = strtr(trim($_GET['input_1']), '*', '%');
	$input_2 = strtr(trim($_GET['input_2']), '*', '%');

	$query = "SELECT doctor.doctor_FIO, room.room_number
    FROM room 
    INNER JOIN
    doctor ON doctor.doctor_id = room.doctor_id
    WHERE doctor.doctor_FIO LIKE '%$input_1%'";
	
	if (!empty($input_2)) {
			$query .= " AND room.room_number LIKE '%$input_2%'";
	}
	
	$result = mysqli_query($link, $query);
	echo "<table border = 1 align=center><tr><td>Имя</td><td>Номер кабинета</td></tr>";
	
	while($row = mysqli_fetch_array($result)) {
			echo "<tr><td>" . $row['doctor_FIO'] . "</td><td>" . $row['room_number'] . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($link);
}