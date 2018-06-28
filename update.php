<?php

require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database);

header("Location: list.php");

$id_record = $_GET['id_record'];
$cost = (int)$_GET['cost'];
$fio = $_GET['fio'];
$type = $_GET['type'];

$sql = "UPDATE Заказ
        SET Стоимость = '" . $cost . "', id_товара = '" . $type . "'
        WHERE id_клиента=" . $id_record . ";";
mysqli_query($link, $sql);

$sql = "UPDATE Клиент
        SET ФИО = '" . $fio . "' 
        WHERE id_клиента=" . $id_record . ";";
mysqli_query($link, $sql);

mysqli_close($link);
?>