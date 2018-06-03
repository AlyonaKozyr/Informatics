<?php

include "connection.php";

$link = mysqli_connect($host, $user, $password, $database) 
or die ("Ошибка" . mysqli_error());

echo "Подключились!<br>";

$query = "SELECT doctor.doctor_FIO, room.room_number, doctor.doctor_id
    FROM room 
    INNER JOIN
    doctor ON doctor.doctor_id = room.doctor_id";

$res = mysqli_query($link, $query);

echo "<table border=1 align=center>
<tr>
<td>ФИО врача</td><td>Номер кабинета</td><td colspan = 2>Change</td>
</tr>";


while($row = mysqli_fetch_array($res)) { 
	echo "<tr><td>" . $row['doctor_FIO'] . "</td>";
	echo "<td>" . $row['room_number'] . "</td>";
	echo "<td><a href = 'edit.php?doctor=" . $row['doctor_FIO'] . "&id=" . $row['doctor_id'] . "&room=" . $row['room_number'] . "'>Редактировать</a>";
	echo "<td><a href = './delete.php?id=" . $row['doctor_id'] . "'>Удалить</a></td></tr>"; 
}

echo "</table>";

mysqli_close($link);

?>
