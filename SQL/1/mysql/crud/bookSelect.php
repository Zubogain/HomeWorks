<?php
/**
* Модель Book
*/
class BookSelect
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}
	
	public function findKey($data) // метод поиска книги по ключу в базе
	{
	    $isbn = $data['ISBN'];
	    $name = (string) $data['NAME'];
	    $author = (string) $data['AUTHOR'];
	    $sth = $this->db->prepare('SELECT * FROM `books` WHERE ( `isbn` LIKE ? ) AND ( `name` LIKE ? ) AND ( `author` LIKE ? )');

	    if ($sth->execute(array('%'.$isbn.'%',$name.'%','%'.$author.'%')))
		{
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			return $sth;
		}
		return false;
	}


	public function findAll()
	{
		$sth = $this->db->prepare('SELECT * FROM `books`');
		if ($sth->execute())
		{
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			return $sth;
		}
		return false;
	}
}