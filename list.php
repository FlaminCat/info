<?php

require_once 'connection.php';


$link = mysqli_connect($host, $user, $pswd, $database);

header('Content-Type: text/html; charset= utf-8');

$result = mysqli_query($link, "SELECT Заказ.id_клиента, Клиент.ФИО, Заказ.Стоимость, Прайс_лист.Вид_товара FROM Заказ 
JOIN Клиент ON Клиент.id_клиента = Заказ.id_клиента
JOIN Прайс_лист ON Заказ.id_товара = Прайс_лист.id_товара
JOIN Платежное_поручение ON Платежное_поручение.id_заказа = Заказ.id_заказа");

echo "<table border='1'>
<tr>
<th>id_клиента</th>
<th>ФИО заказчика</th>
<th>Стоимость заказа</th>
<th>Вид_товара</th>
<th>Edit</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row["id_клиента"] . "</td>";
echo "<td>" . $row["ФИО"] . "</td>";
echo "<td>" . $row["Стоимость"] . "</td>";
echo "<td>" . $row["Вид_товара"] . "</td>";
echo "<td><a href='edit.php?id=" . $row['id_клиента'] . "'>update</a></td>";
echo "</tr>";
}

mysqli_close($link);
?>