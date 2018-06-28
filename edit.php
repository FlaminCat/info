<html>

<head>
  <meta charset="utf-8">
</head>

<body>

<?php

require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database);

$id_record = $_GET["id"];

$sql = "SELECT Заказ.id_клиента, Клиент.ФИО, Заказ.Стоимость
	FROM Клиент, Заказ
	JOIN Прайс_лист ON Заказ.id_товара = Прайс_лист.id_товара
	WHERE Заказ.id_клиента = Клиент.id_клиента
	AND Заказ.id_клиента = " . $id_record . ";
";

$result = mysqli_query($link, $sql);
$record = mysqli_fetch_assoc($result);

$sql2 = "SELECT * FROM Прайс_лист";
$result2 = mysqli_query($link, $sql2);

?>

<form action="update.php" method="get">
    <input type="hidden" name="id_record" value=<?php echo $id_record; ?>><br>
    ФИО:
    <input type="text" name="fio" value=<?php echo $record['ФИО']; ?>><br>
    Стоимость:
    <input type="text" name="cost" value=<?php echo $record['Стоимость']; ?>><br>
    Способ доставки:
    <select name="type">
        <?php 
            while($row = mysqli_fetch_assoc($result2)) {
                echo $row;
                if ($row['id_товара'] == $record['id_товара'])
                    echo "<option selected value='" . $row['id_товара'] . "'>" . $row['Вид_товара'] . "</option>";
                else
                    echo "<option value='" . $row['id_товара'] . "'>" . $row['Вид_товара'] . "</option>";                    
            }
        ?>
    </select><br>

    <input type="submit">
</form>

</body>
</html>