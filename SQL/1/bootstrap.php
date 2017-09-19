<?php
require_once __DIR__ . '/mysql/db.php';
require_once __DIR__ . '/mysql/crud/bookSelect.php';

$config = include 'config.php';
$db = DataBase::connect(
	$config['mysql']['host'],
	$config['mysql']['dbname'],
	$config['mysql']['user'],
	$config['mysql']['pass']
);
