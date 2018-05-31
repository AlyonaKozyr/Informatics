<?php
$host = 'localhost:8889'; // адрес сервера 
$user = 'root'; // имя пользователя
$password = "root"; // пароль
$database = 'k3143_koz'; // имя базы данных

$link = mysqli_connect($host, $user, $password, $database) 
or die ("Ошибка" . mysqli_error());

echo "Подключились!<br>";

$query = "SELECT doctor.doctor_FIO, room.room_number
FROM room 
INNER JOIN
doctor ON doctor.doctor_id = room.doctor_id;
while($row = mysqli_fetch_array($res)) { 
echo "<tr><td>" . $row['Doctor']."</td><td>" . $row['room_number'] . "</td></tr>"; 
}

$result = mysqli_query($link, $query);
 echo "<table border=1 align=center>
<tr>
<td>ФИО врача</td>
<td>Номер_кабинета</td>
</tr>";

while($row = mysqli_fetch_array($result)) {
	echo "<tr><td>" . $row['doctor_fio']. "</td>";
	echo "<td>" . $row['room_number'] . "</td>";
	echo "<td><a href = './edit.php?doctor_fio=" . $row['doctor_fio'] . "&input_1=" . $row['doctor_fio'] . "&input_2=" . $row['room_number'] . "'>Update</a></td>";
	echo "<td><a href = './delete.php?doctor_fio=". $row['doctor_fio'] . "'>Delete</a></td></tr>";
}
echo "</table>";

mysqli_close($link);
?>

