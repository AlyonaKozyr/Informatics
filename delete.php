<?php

include "connection.php";

$link = mysqli_connect($host, $user, $password, $database) 
or die ("Ошибка" . mysqli_error());

$query = "SET foreign_key_checks = 0";

$result = mysqli_query($link, $query);

$doctor_id = $_GET['id'];

$query = "DELETE FROM doctor WHERE doctor_id = '" . $doctor_id . "'";

$result = mysqli_query($link, $query);

header('location: ./list.php');
