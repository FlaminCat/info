<?php 

require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) or die("Не могу подключиться к базе." . mysqli_error($link));
mysql_select_db($database) or die("Не могу подключиться к базе.");

//Создание таблиц:

$sql = "CREATE TABLE `Акция` (
  `id_акции` INTEGER NOT NULL DEFAULT 0, 
  `Скидка` DECIMAL(18,0) NOT NULL DEFAULT 0, 
  `id_товара` INTEGER NOT NULL DEFAULT 0, 
  UNIQUE (`id_товара`), 
  PRIMARY KEY (`id_акции`)
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "CREATE TABLE `Договор` (
  `id_договора` INTEGER NOT NULL DEFAULT 0, 
  `Дата_поставки` DATETIME NOT NULL, 
  `Оптовая_цена` DECIMAL(19,4) NOT NULL DEFAULT 0, 
  `id_товара` INTEGER NOT NULL DEFAULT 0, 
  `id_поставщика` INTEGER NOT NULL DEFAULT 0, 
  UNIQUE (`id_поставщика`), 
  UNIQUE (`id_товара`), 
  PRIMARY KEY (`id_договора`)
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "CREATE TABLE `Заказ` (
  `id_заказа` INTEGER NOT NULL DEFAULT 0, 
  `Дата_оформления` DATETIME NOT NULL, 
  `Стоимость` DECIMAL(19,4) NOT NULL DEFAULT 0, 
  `Способ_доставки` VARCHAR(255) NOT NULL, 
  `id_клиента` INTEGER NOT NULL DEFAULT 0, 
  `id_товара` INTEGER NOT NULL DEFAULT 0, 
  `id_сотрудника` INTEGER NOT NULL DEFAULT 0, 
  PRIMARY KEY (`id_заказа`)
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "CREATE TABLE `Клиент` (
  `id_клиента` INTEGER NOT NULL DEFAULT 0, 
  `ФИО` VARCHAR(255) NOT NULL, 
  `Контактный_номер` VARCHAR(255) NOT NULL, 
  `e-mail` VARCHAR(255) NOT NULL, 
  PRIMARY KEY (`id_клиента`), 
  INDEX (`Контактный_номер`)
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "CREATE TABLE `Платежное_поручение` (
  `id_поручения` INTEGER NOT NULL DEFAULT 0, 
  `Дата_оплаты` DATETIME NOT NULL, 
  `id_заказа` INTEGER NOT NULL DEFAULT 0, 
  UNIQUE (`id_заказа`), 
  PRIMARY KEY (`id_поручения`)
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "CREATE TABLE `Поставщик` (
  `id_поставщика` INTEGER NOT NULL DEFAULT 0, 
  `Реквизиты` VARCHAR(255) NOT NULL, 
  `Контактный_номер` VARCHAR(255) NOT NULL, 
  `e-mail` VARCHAR(255) NOT NULL, 
  PRIMARY KEY (`id_поставщика`), 
  INDEX (`Контактный_номер`)
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "CREATE TABLE `Прайс_лист` (
  `id_товара` INTEGER NOT NULL DEFAULT 0, 
  `Вид_товара` VARCHAR(255) NOT NULL, 
  `Название_товара` VARCHAR(255) NOT NULL, 
  `Цена_товара` DECIMAL(19,4) NOT NULL DEFAULT 0, 
  PRIMARY KEY (`id_товара`)
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "CREATE TABLE `Сотрудник` (
  `id_сотрудника` INTEGER NOT NULL DEFAULT 0, 
  `ФИО` VARCHAR(255) NOT NULL, 
  `Контактный_номер` VARCHAR(255) NOT NULL, 
  `e-mail` VARCHAR(255) NOT NULL, 
  PRIMARY KEY (`id_сотрудника`), 
  INDEX (`Контактный_номер`)
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

//Добавление данных в таблицы:

$query = "INSERT INTO `Акция` (`id_акции`, `Скидка`, `id_товара`) VALUES (1, 20, 1)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Акция` (`id_акции`, `Скидка`, `id_товара`) VALUES (2, 30, 2)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Акция` (`id_акции`, `Скидка`, `id_товара`) VALUES (3, 5, 3)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Акция` (`id_акции`, `Скидка`, `id_товара`) VALUES (4, 10, 4)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Акция` (`id_акции`, `Скидка`, `id_товара`) VALUES (5, 15, 5)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Договор` (`id_договора`, `Дата_поставки`, `Оптовая_цена`, `id_товара`, `id_поставщика`) VALUES (1, '2018-02-03 00:00:00', 2345, 1, 1)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Договор` (`id_договора`, `Дата_поставки`, `Оптовая_цена`, `id_товара`, `id_поставщика`) VALUES (2, '2018-02-01 00:00:00', 3424, 2, 2)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Договор` (`id_договора`, `Дата_поставки`, `Оптовая_цена`, `id_товара`, `id_поставщика`) VALUES (3, '2018-02-12 00:00:00', 2312, 3, 3)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Договор` (`id_договора`, `Дата_поставки`, `Оптовая_цена`, `id_товара`, `id_поставщика`) VALUES (4, '2018-02-12 00:00:00', 1240, 4, 4)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Договор` (`id_договора`, `Дата_поставки`, `Оптовая_цена`, `id_товара`, `id_поставщика`) VALUES (5, '2018-02-12 00:00:00', 2140, 5, 5)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Заказ` (`id_заказа`, `Дата_оформления`, `Стоимость`, `Способ_доставки`, `id_клиента`, `id_товара`, `id_сотрудника`) VALUES (1, '2018-02-17 00:00:00', 1230, 'Почта', 1, 1, 1)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Заказ` (`id_заказа`, `Дата_оформления`, `Стоимость`, `Способ_доставки`, `id_клиента`, `id_товара`, `id_сотрудника`) VALUES (2, '2018-02-01 00:00:00', 3430, 'Курьер', 2, 2, 2)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Заказ` (`id_заказа`, `Дата_оформления`, `Стоимость`, `Способ_доставки`, `id_клиента`, `id_товара`, `id_сотрудника`) VALUES (3, '2017-11-01 00:00:00', 14110, 'Самовывоз', 3, 3, 3)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Заказ` (`id_заказа`, `Дата_оформления`, `Стоимость`, `Способ_доставки`, `id_клиента`, `id_товара`, `id_сотрудника`) VALUES (4, '2018-02-23 00:00:00', 5210, 'Почта', 4, 4, 4)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Заказ` (`id_заказа`, `Дата_оформления`, `Стоимость`, `Способ_доставки`, `id_клиента`, `id_товара`, `id_сотрудника`) VALUES (5, '2017-10-14 00:00:00', 12510, 'Курьер', 5, 5, 5)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Клиент` (`id_клиента`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (1, 'Петров Петр Петрович', '+79123456262', 'petrov@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Клиент` (`id_клиента`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (2, 'Иванов Иван Иванович', '+79234567856', 'ivanich@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Клиент` (`id_клиента`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (3, 'Овальный Эллипсей', '+79666666666', 'putinchmo@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Клиент` (`id_клиента`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (4, 'Грудинин Павкл', '+79567899066', 'kandidat.naroda@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Клиент` (`id_клиента`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (5, 'Путинников Валерий Владимирович', '+77777777777', 'ploti.nalogi@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Платежное_поручение` (`id_поручения`, `Дата_оплаты`, `id_заказа`) VALUES (1, '2018-02-03 00:00:00', 1)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Платежное_поручение` (`id_поручения`, `Дата_оплаты`, `id_заказа`) VALUES (2, '2018-02-04 00:00:00', 2)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Платежное_поручение` (`id_поручения`, `Дата_оплаты`, `id_заказа`) VALUES (3, '2018-02-06 00:00:00', 3)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Платежное_поручение` (`id_поручения`, `Дата_оплаты`, `id_заказа`) VALUES (4, '2018-02-18 00:00:00', 4)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Платежное_поручение` (`id_поручения`, `Дата_оплаты`, `id_заказа`) VALUES (5, '2018-02-19 00:00:00', 5)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Поставщик` (`id_поставщика`, `Реквизиты`, `Контактный_номер`, `e-mail`) VALUES (1, 'Сергеев Сергей', '+71922345656', 'sergeev@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Поставщик` (`id_поставщика`, `Реквизиты`, `Контактный_номер`, `e-mail`) VALUES (2, 'Алекссев Алексей', '+79562345691', 'alesha@doodle.com')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Поставщик` (`id_поставщика`, `Реквизиты`, `Контактный_номер`, `e-mail`) VALUES (3, 'Михаилов Михаил', '+7944523923', 'mishanya@doodle.com')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Поставщик` (`id_поставщика`, `Реквизиты`, `Контактный_номер`, `e-mail`) VALUES (4, 'Андреев Андрей', '+79452345687', 'andr@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Поставщик` (`id_поставщика`, `Реквизиты`, `Контактный_номер`, `e-mail`) VALUES (5, 'Кириллов Кирилл', '+79567897643', 'kirill@doodle.com')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Прайс_лист` (`id_товара`, `Вид_товара`, `Название_товара`, `Цена_товара`) VALUES (1, 'Спальня', 'Кровать', 12340)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Прайс_лист` (`id_товара`, `Вид_товара`, `Название_товара`, `Цена_товара`) VALUES (2, 'Кухня', 'Стол', 2340)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Прайс_лист` (`id_товара`, `Вид_товара`, `Название_товара`, `Цена_товара`) VALUES (3, 'Гостиная', 'Диван', 13460)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Прайс_лист` (`id_товара`, `Вид_товара`, `Название_товара`, `Цена_товара`) VALUES (4, 'Гостиная', 'Стол', 3670)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Прайс_лист` (`id_товара`, `Вид_товара`, `Название_товара`, `Цена_товара`) VALUES (5, 'Спальня', 'Кресло', 7980)";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Сотрудник` (`id_сотрудника`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (1, 'Дудинский Юрий', '+79123569823', 'budet.dud@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Сотрудник` (`id_сотрудника`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (2, 'Поперечный Данила', '+79124357887', 'love.milonov@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Сотрудник` (`id_сотрудника`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (3, 'Комедийный Бэд', '+73452345323', 'badcomedian@doodle.com')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Сотрудник` (`id_сотрудника`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (4, 'Котокрабов Котокраб', '+73212345465', 'cuthecrap@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

$query = "INSERT INTO `Сотрудник` (`id_сотрудника`, `ФИО`, `Контактный_номер`, `e-mail`) VALUES (5, 'Валентин Петухов', '+79999093567', 'tinkoff@doodle.lul')";
if (mysqli_query($link, $query)) {
	echo "Данные добавлены<br>";
} else {
	echo "Error insert data: " . mysqli_error($link) . "<br>";
}

mysqli_close($link);
?>