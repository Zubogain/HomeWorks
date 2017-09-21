<?php
$form = '
	<div style="display: inline-block; margin-left: 20px;">
    <form method="POST">
        <label for="sort">Сортировать по:</label>
        <select name="sort_by">
            <option value="date_added">Дате добавления</option>
            <option value="is_done">Статусу</option>
            <option value="description">Описанию</option>
        </select>
        <input type="submit" name="sort" value="Отсортировать">
    </form>
</div>

<div class="table">
	<table border="1">
		<thead>
			<tr>
				<td>Описание задачи</td>
				<td>Дата добавления</td>
				<td>Статус</td>
				<td></td>
			</tr>
		</thead>
		<tbody>';
foreach ($todo as $value)
{
	$form .= '<tr><td>' . $value['description'] . '</td>';
	if ((int) $value['is_done'] == 1)
	{
		$form .= '<td style="color: green;">Выполнено</td>';
	}
	else
	{
		$form .= '<td style="color: orange;">В процессе</td>';
	}
	$form .= '<td>' . $value['date_added'] . '</td>';
	$form .= '<td>';
	$form .= "<a href=\"?id={$value['id']}&action=edit\">Изменить </a>";
	$form .= "<a href=\"?id={$value['id']}&action=done\">Выполнить </a>";
	$form .= "<a href=\"?id={$value['id']}&action=delete\">Удалить</a>";
	$form .= '</td></tr>';
}
$form .= '
		</tbody>
	</table>
</div>';
echo $form;