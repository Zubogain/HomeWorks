<?php
/**
* Модель Task
*/
class TaskModel
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}


	public function findAll()
	{
		$sth = $this->db->prepare('SELECT * FROM `tasks`');
		if ($sth->execute())
		{
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			return $sth;
		}
		return false;
	}


	public function addTask($description)
	{
		$sth = $this->db->prepare('INSERT INTO `tasks` (`description`, `is_done`, `date_added`) VALUES ( ? , 0 , now() )');
		if ($sth->execute(array((string) $description)))
		{
			return true;
		}
		return false;
	}


	public function deleteTask($id)
	{
		$sth = $this->db->prepare('DELETE FROM `tasks` WHERE `id` = ? ');
		if ($sth->execute(array((int) $id)))
		{
			return true;
		}
		return false;
	}


	public function doneTask($id)
	{
		$sth = $this->db->prepare('UPDATE `tasks` SET `is_done` = 1 WHERE `id` = ? ');
		if ($sth->execute(array((int) $id)))
		{
			return true;
		}
		return false;
	}


	public function selectTask($id)
	{
		$sth = $this->db->prepare('SELECT `id`, `description` FROM `tasks` WHERE `id` = ? ');
		if ($sth->execute(array((int) $id)))
		{
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			return $sth;
		}
		return false;
	}


	public function editTask($description, $id)
	{
		$sth = $this->db->prepare('UPDATE `tasks` SET `description` = ?, `is_done` = 0 WHERE `id` = ? ');
		if ($sth->execute(array($description, $id)))
		{
			return true;
		}
		return false;
	}


	public function sortTaskDone()
	{
		$sth = $this->db->prepare('SELECT * FROM `tasks` ORDER BY `tasks`.`is_done` ASC');
		if ($sth->execute())
		{
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			return $sth;
		}
		return false;
	}


	public function sortTaskDescription()
	{
		$sth = $this->db->prepare('SELECT * FROM `tasks` ORDER BY `tasks`.`description` ASC');
		if ($sth->execute())
		{
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			return $sth;
		}
		return false;
	}
}