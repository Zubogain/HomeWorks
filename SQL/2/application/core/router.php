<?php
/**
* class Router по крайне мере должен быть :)
* Моя лень мне не дала адекватно написать class Router, понять простить :-)
*/
class Router
{
	static function start($db)
	{
		$controller = new TaskController($db);
		$controller->getTodoList();
	}
}