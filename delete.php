<?php
include "connection.php";
$doctor_id = $_GET['doctor_fio'];
$query = 'DELETE from Doctor WHERE doctor_id = "'.$doctor_id.'";';
$result = mysqli_query($link, $query) or die('Ошибка запроса ('.mysqli_error($query).'): '.$query);

header('location: ./list.php');