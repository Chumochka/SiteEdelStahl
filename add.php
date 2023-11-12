<?
include('db/dbcon.php');
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Добавление заказа</title>
		<link rel="stylesheet" href="css/data.css">
        <link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
    </head>
    <body>
		<header>
			<div class="container d-flex justify-content-between align-items-center py-2">
				<div class="header_title">Добавление/изменение заказа</div>
				<img class="img-fluid" src="images/logo-footer.png">
			</div>
		</header>
		<div class="container mt-5">
			<form id="form-question" action="#" method="post">
				<div class="row row-cols-1 gy-4 align-items-center">
					<div class="col">
						<label for="IDInput" class="form-label">ID заказа</label>
						<input id="IDInput" class="form-control" type="text" name="ID" readonly value="
<?$label = 'id';
$id = false;
$OrderID = $_GET[$label];
if (!empty($OrderID))	
	echo $OrderID;?>">
					</div>
					<div class="col">
						<label for="nameInput" class="form-label">Название заказчика</label>
						<input id="nameInput" class="form-control" placeholder="Имя или название организации" type="text" name="name" value="
<?if(!empty($OrderID))
{
	$sql="SELECT * FROM `orders` WHERE `ID_ORDER` = $OrderID";
	$result=$cms->query($sql);
	if($result->num_rows > 0)
	{
		$row_main=$result->fetch_assoc();
		echo $row_main['NAME'];
	}
}
?>">
					</div>
					<div class="col">
						<label for="phoneInput" class="form-label">Телефон заказчика</label>
						<input id="phoneInput" class="form-control" placeholder="Телефон" type="text" name="phone" value="
<?if(!empty($row_main))
{
	echo $row_main['PHONE'];
}
?>">
					</div>
					<div class="col">
						<label for="emailInput" class="form-label">Email заказчика</label>
						<input id="emailInput" class="form-control" placeholder="Email" type="text" name="email" value="
<?if(!empty($row_main))
{
	echo $row_main['EMAIL'];
}
?>">
					</div>
					<div class="col">
						<label for="serviceInput" class="form-label">Услуга</label>
						<select id="serviceInput" class="form-select" name="service">
<?if(!empty($row_main))
{
	$service_select = $row_main['ID_SERVICE'];
}
$sql="SELECT * FROM `servicetype`";
	$result=$cms->query($sql);
	if($result->num_rows > 0)
	{
		while ($row=$result->fetch_assoc())
		{
			echo "<optgroup label='{$row['TITLE']}'></option>";
			$service=$cms->query("SELECT * FROM `services` WHERE `ID_SERVICETYPE` = {$row['ID_SERVICETYPE']}");
			if($service->num_rows > 0)
			{
				while($row_service=$service->fetch_assoc())
				{
					if($service_select != $row_service['ID_SERVICE'])
						echo "<option value='{$row_service['ID_SERVICE']}'>{$row_service['TITLE']}</option>";
					else
						echo "<option value='{$row_service['ID_SERVICE']}' selected>{$row_service['TITLE']}</option>";
				}
			}
		}
	}
?>
						</select>
					</div>
					<div class="col">
						<label for="orderDateInput" class="form-label">Дата заказа</label>
						<input id="orderDateInput" class="form-control" type="date" name="date" value="<?if(!empty($row_main))
{
	echo $row_main['ORDERDATE'];
}
?>">
					</div>
					<div class="col">
						<label for="serviceInput" class="form-label">Статус заказа</label>
						<select id="serviceInput" class="form-select" name="status"  value="3">
<?if(!empty($row_main))
{
	$status_select = $row_main['ID_ORDERSTATUS'];
}
$sql="SELECT * FROM `orderstatus`";
	$result=$cms->query($sql);
	if($result->num_rows > 0)
	{	
		while ($row=$result->fetch_assoc())
		{
			if($status_select != $row['ID_ORDERSTATUS'])
				echo "<option value='{$row['ID_ORDERSTATUS']}'>{$row['NAME']}</option>";
			else
				echo "<option value='{$row['ID_ORDERSTATUS']}' selected>{$row['NAME']}</option>";
		}
	}
?>
						</select>
					</div>
					<div class="col">
						<input type="submit" name="send" class="btn btn-feedback" value="Сохранить"></input>
					</div>
				</div>
			</form>
<?if(isset($_POST['send'])){
	#если нажата кнопка сохранить
	$id_order = $_POST['ID'];
	$name = str_replace('  ',' ',trim($_POST['name']));
	$phone = $_POST['phone'];
	$email = str_replace(' ','',$_POST['email']);
	$service = (int)$_POST['service'];
	$date = $_POST['date'];
	$status = (int)$_POST['status'];
	$error = "";
	#проверка наименования заказчика
	if(!preg_match('/^[\p{L&} -]+$/u', $name))
		$error = $error . "<p>Некорректный имя или название организации</p>";
	#проверка и переформатирование телефона
	if(preg_match("/^(8|\+7)?(-| )?\(?[0-9]{3}\)?(-| )?[0-9]{3}(-| )?[0-9]{2}(-| )?[0-9]{2}$/", $phone)){
		if(preg_match('/^8/', $phone))
			$phone = substr_replace($phone, "+7",0,1);
		elseif(!preg_match('/^\+7/', $phone))
			$phone = "+7" . $phone;
		if($phone[2] == "-")
			$phone = substr_replace($phone, " ",2,1);
		elseif($phone[2] != " ")
			$phone = substr_replace($phone, " ",2,0);
		if($phone[3] != "(")
			$phone = substr_replace($phone, "(",3,0);
		if($phone[7] != ")")
			$phone = substr_replace($phone, ")",7,0);
		if($phone[8] == "-")
			$phone = substr_replace($phone, " ",8,1);
		elseif($phone[8] != " ")
			$phone = substr_replace($phone, " ",8,0);
		if($phone[12] == " ")
			$phone = substr_replace($phone, "-",12,1);
		elseif($phone[12] != "-")
			$phone = substr_replace($phone, "-",12,0);
		if($phone[15] == " ")
			$phone = substr_replace($phone, "-",15,1);
		elseif($phone[15] != "-")
			$phone = substr_replace($phone, "-",15,0);
	}
	else $error = $error . "<p>Некорректный номер</p>";
	#проверка email
	if(!preg_match("/^\w+@(yandex.ru|mail.ru|inbox.ru|bk.ru)$/",$email))
		$error = $error . "<p>Некорректный email</p>";
	#проверка даты заказа
	if($date==0){
		$error = $error . "<p>Некорректная дата</p>";
	}
	#если имеются ошибки
	if(!empty($error)){
		echo $error;
	}else{
		#проверка наличия элемента с даннным id
		$sql="SELECT * FROM `orders` WHERE `ID_ORDER` = $id_order";
		$result=$cms->query($sql);
		#если имеется строка с данным id, тоесть изменение
		if($result->num_rows > 0){
			$sql = "UPDATE `orders` SET `NAME` = '{$name}',
			`PHONE` = '{$phone}',
			`EMAIL` = '{$email}',
			`ID_SERVICE` = '{$service}',
			`ORDERDATE` = '{$date}',
			`ID_ORDERSTATUS` = '{$status}' WHERE `ID_ORDER` = $id_order";
			$cms->query($sql);
		}else{
			#если имеется строка с данным id, тоесть добавление
			$sql = "INSERT INTO `orders`(`NAME`, `PHONE`, `EMAIL`, `ID_SERVICE`, `ORDERDATE`, `ID_ORDERSTATUS`)
			VALUES ('$name','$phone','$email','$service', '$date', '$status')";
			$cms->query($sql);
		}
		#перевод на страницу «Список заказов»
		echo "<script>window.location.href = '/data.php';</script>";
		exit;
	}
}
?>
		</div>
    </body>
</html>