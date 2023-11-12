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
        <title>Записи</title>
		<link rel="stylesheet" href="css/data.css">
        <link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
    </head>
    <body>
		<header>
			<div class="container d-flex justify-content-between align-items-center py-2">
				<div class="header_title">Список заказов</div>
				<img class="img-fluid" src="images/logo-footer.png">
			</div>
		</header>
		<div class="container mt-5">
<?#проверка полученного ID на корректность
$sql="SELECT * FROM `orders` WHERE `ID_ORDER` =  {$_GET['ID']}";
$result=$cms->query($sql);
$message = "";
if($result->num_rows > 0)
{#Если заказ с таки id существует
	$id= $_GET['ID'];
	$message = "Вы можете изменить или удалить заказ по номеру {$id}";
}elseif(!empty($_GET['ID']))#если такого заказа не существует
	$message = "Некорректный ID для изменения/удаления";
else#Если ID не был задан
	$message = "Для изменения/удаления заказа введите в поле ID заказа и нажмите Enter";
#если кнопка «Удалить» была нажата
if(isset($_POST['delete'])){
	if(!empty($id)){
		#удаление заказа
		$sql="DELETE FROM `orders` WHERE `ID_ORDER`={$id}";
		$rezult=$cms->query($sql);
		$message = "Заказ {$id} удалена из базы";
		#обнуление переменной
		$id =null;
	}
}	
echo $message;
?>
			<div class="row">
				<div class="col">
					<a class="btn" href="add.php" role="button">
						<span>Добавить</span>
					</a>
				</div>
				<div class="col">
					<a class="btn" href="add.php?id=
<?if(!empty($id))
echo $id;
else
	echo '0" style="pointer-events: none" disabled';?>
					" role="button">
						<span>Изменить</span>
					</a>
				</div>
				<div class="col">
					<form action="#" method="POST">
						<button class="btn" type="submit" name="delete" <?if(empty($id)) echo 'style="pointer-events: none"'?>>
							<span>Удалить</span>
						</button>
					</form>
				</div>
				<div class="col">
					<form method="get">
						<input class="form-control" placeholder="ID заказа" type="number" step="1" name="ID">
						<button> выбрать</button>
					</form>
				</div>
			</div>
			<table class="text-center mt-3">
				<thead>
					<th>ID</th>
					<th>Название заказчика</th>
					<th>Телефон</th>
					<th>Email</th>
					<th>Услуга</th>
					<th>Дата заказа</th>
					<th>Статус заказа</th>
				</thead>
				<tbody>
				<?$sql="SELECT * FROM `orders`";
					$result=$cms->query($sql);
					if($result->num_rows > 0)
					{
						while ($row=$result->fetch_assoc())
						{
							$service=$cms->query("SELECT `TITLE` FROM `services` WHERE `ID_SERVICE` = {$row['ID_SERVICE']}");
							$row_service=$service->fetch_assoc();
							$orderstatus=$cms->query("SELECT `NAME` FROM `orderstatus` WHERE `ID_ORDERSTATUS` = {$row['ID_ORDERSTATUS']}");
							$row_status=$orderstatus->fetch_assoc();
							echo "<tr>
						<td>
							{$row['ID_ORDER']}
						</td>
						<td>
							{$row['NAME']}
						</td>
						<td>
							{$row['PHONE']}
						</td>
						<td>
							{$row['EMAIL']}
						</td>
						<td>
							{$row_service['TITLE']}
						</td>
						<td>
							{$row['ORDERDATE']}
						</td>
						<td>
							{$row_status['NAME']}
						</td>
					</tr>";
						}
					}
				?>
				</tbody>
			</table>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
    