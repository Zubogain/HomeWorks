<?php
require_once __DIR__ . '/bootstrap.php';
$bookSelect = new bookSelect($db);
$books = '';
if (isset($_GET['do_searh']) and !empty($_GET['ISBN']) OR !empty($_GET['NAME']) OR !empty($_GET['AUTHOR']))
{
	$books = $bookSelect->findKey($_GET);
}
else
{
	$books = $bookSelect->findAll();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Книги</title>
</head>
<body>
	<div class="main">
		<h1>Список книг</h1>
		<form method="GET">
			<label>ISBN: </label><input type="text" name="ISBN">
		    <label>name: </label><input type="text" name="NAME">
		    <label>author: </label><input type="text" name="AUTHOR">
			<input type="submit" value="Найти" name="do_searh">
		</form>
		<table border="1">
			<thead>
				<tr>
					<td>id</td>
					<td>name</td>
					<td>author</td>
					<td>year</td>
					<td>isbn</td>
					<td>genre</td>
				</tr>
			</thead>
			<tbody>
				<?php
				if ($books != '')
				{
					foreach ($books as $value)
					{
						echo '<tr><td>' . $value['id'] . '</td>';
						echo '<td>' . $value['name'] . '</td>';
						echo '<td>' . $value['author'] . '</td>';
						echo '<td>' . $value['year'] . '</td>';
						echo '<td>' . $value['isbn'] . '</td>';
						echo '<td>' . $value['genre'] . '</td></tr>';
					}
				}
				else
				{
					echo '<h2>Что-то пошло не так!</h2>';
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>