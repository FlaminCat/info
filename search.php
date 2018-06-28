<?php

require_once 'connection.php';

$link = mysqli_connect($host, $user, $password);
mysqli_select_db($link, $database);

echo "<meta content='text/html; charset=utf8' http-equiv='Content-Type'>";

echo "Контактный номер клиента: </br>
<form method='get' action='search.php'>
	<input type='text' name='tel'> </br>
	Название товара: </br>
 	<input type='text' name='goods'> </br>
 	<input type='submit', name='send' value='send'>
</form>
";

$tel = $_GET['tel'];
$goods = $_GET['goods'];

if (isset($_GET['send'])){

	if($tel[0]=='+' && $tel[1]=='7'){
		 $tel = substr($tel, 2);
	}
	else {
		if($tel[0]=='8'){
		$tel = substr($tel, 1);
		}
	}

	if (isset($tel) && isset($goods)){
	$sql = "
	SELECT Клиент.Контактный_номер, Прайс_лист.Название_товара
	FROM Заказ
	JOIN Клиент ON Клиент.id_клиента = Заказ.id_клиента
	JOIN Прайс_лист ON Прайс_лист.id_товара = Заказ.id_товара
	WHERE Клиент.Контактный_номер LIKE '%$tel' AND Прайс_лист.Название_товара LIKE '%$goods%'
	";
	}

	if (isset($tel) && !isset($goods)){
	$sql = "
	SELECT Клиент.Контактный_номер, Прайс_лист.Название_товара
	FROM Заказ
	JOIN Клиент ON Клиент.id_клиента = Заказ.id_клиента
	JOIN Прайс_лист ON Прайс_лист.id_товара = Заказ.id_товара
	WHERE Клиент.Контактный_номер LIKE '%$tel'
	";
	}

	if (!isset($tel) && isset($goods)){
	$sql = "
	SELECT Клиент.Контактный_номер, Прайс_лист.Название_товара
	FROM Заказ
	JOIN Клиент ON Клиент.id_клиента = Заказ.id_клиента
	JOIN Прайс_лист ON Прайс_лист.id_товара = Заказ.id_товара
	WHERE Прайс_лист.Название_товара LIKE '%$goods%'
	";
	}

	$result = mysqli_query($link, $sql);
	echo "<table border='1'> 
	<tr> 
	<th>Контактный_номер</th> 
	<th>Название_товара</th> 
	</tr>";

	while($row = mysqli_fetch_array($result)) 
	{ 
	echo "<tr>"; 
	echo "<td>" . $row['Контактный_номер'] . "</td>"; 
	echo "<td>" . $row['Название_товара'] . "</td>"; 
	echo "</tr>"; 
	}
	echo "</table>"; 

}
mysqli_close($link);


?>